<?php

namespace App\Http\Controllers\sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\CrmProjectList;
use App\Models\LeadFollowUpList;
use App\Models\LeadSourceList;
use App\Models\User;
use App\Models\LeadCategoryList;
use App\Models\LeadList;
use App\Models\LeadAttachment;
use App\Models\LeadSpocPerson;
use App\Models\LeadAssignUser;
use App\Models\CrmActionLog;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DB;
use Throwable;
use File;

class LeadController extends Controller
{
     
       /**
     * Lead listing.
     */
    public function index(Request $request)
    {
        $leads = LeadList::with('leadAssignUser','projectDetails','getCategory','getSource')
        ->orderByDesc('id');

        $search = $request->search;
        if($search){
            $leads->where(function($query) use ($search){
                $query->where('lead_title','like', '%'.$search.'%')
                ->orWhereHas('projectDetails', function ($query) use ($search) {
                    $query->where('project_name', 'like', "%$search%");
                })
                ->orWhereHas('getCategory', function ($query) use ($search) {
                    $query->where('category_name', 'like', "%$search%");
                })
                ->orWhereHas('leadAssignUser.user', function ($query) use ($search) {
                    $query->where('first_name', 'like', "%$search%");
                });
            });
        }

        // get user type
        
        $userRoleName = get_role_name(auth()->user()->role_id);

        if($userRoleName == 'IIDT-HEAD' || $userRoleName == 'IIDT-Manager'){
            $leads->whereHas('leadAssignUser',function($query){
                $query->where('lead_assign_users.follow_up_status', 'enabled');
            })->whereHas('user',function($query){
                $query->where('users.company_id', '2');
            });
        }
        elseif($userRoleName == 'IIDT-Coordinator'){
            $leads->whereHas('leadAssignUser',function($query){
                $query->where('lead_assign_users.follow_up_status', 'enabled');
                $query->where('lead_assign_users.assigned_user_id', auth()->user()->id);
            })->whereHas('user',function($query){
                $query->where('users.company_id', '2');
            });
        }elseif($userRoleName == 'sales_manager'){
            $leads->whereHas('leadAssignUser',function($query){
                $query->where('lead_assign_users.follow_up_status', 'enabled');
                $query->where('lead_assign_users.assigned_user_id', auth()->user()->id);
            });
        }
        elseif($userRoleName == 'sales_head'){
            $leads->whereHas('leadAssignUser',function($query){
                $query->where('lead_assign_users.follow_up_status', 'enabled');
            });
        }else{
            $leads->whereHas('leadAssignUser',function($query){
                $query->where('lead_assign_users.follow_up_status', 'enabled');
            })->where('created_by',auth()->user()->id);  
        }
        
        $leads = $leads->paginate(25)->withQueryString();

        return view("sales.leads.lead-list", compact('leads','search'));
    }

    
    /**
     * Add Client Form.
     */

    public function create(){
        
        $projects = CrmProjectList::with('client')
                    ->where('status','1')
                    ->get();

        $leadSources = LeadSourceList::select('id','source_name','status')
                        ->where('status','1')
                        ->get();


        $company_id = auth()->user()->company_id;
        // check company
        if($company_id == 2){
            $leadAssigns = User::whereHas('role', function($query){
                    $query->where('id', 26);
            })
            ->where('status','1')
            ->get();
        }elseif(auth()->user()->role->role_name == "sales_manager"){
                $leadAssigns = User::whereHas('role', function($query){
                    $query->where('id', auth()->user()->role->id);
                    })
                    ->where('status','1')
                    ->get();
            }else{
                    $leadAssigns = User::with('role')
                    ->where('status','1')
                    ->get();
        }

        $categories = LeadCategoryList::select('id','category_name','status')
                        ->where('status','1')
                        ->get();
        return view('sales.leads.add-lead', compact('projects','leadSources','leadAssigns','categories'));
    }

    public function store(Request $request){

        $validation = $request->validate([
            'lead_title' => 'required | string',
            'project_id' => 'required',
            'deadline' => 'required',
            'description' => 'required',
            'remarks' => 'required',
            // 'category_id' => 'required',
            'source_id' => 'required',
            'assign_user_id' => 'required',
            'attach_typ' => 'required',
            'attach_file' => 'required',
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'sp_remarks' => 'required',
            // 'set_as_def' => 'required',
        ]);

        try {
            DB::beginTransaction();

            $total = LeadList::select('id')->count();
            $lead_title = $request->lead_title;

            if ($total > 0) {
                $slug = ($total + 1) . '/' . strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '_', $lead_title)));
                $last = $total + 1;
            } else {
                $slug = '1/' . strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '_', $lead_title)));
                $last = 1;
            }

          
            $words = explode(" ", $lead_title);
            $acronym = "";
            foreach ($words as $w) {
                $acronym .= ucwords($w[0]);
            }
            $uni_id = str_pad($last, 4, '0', STR_PAD_LEFT);
            $lead_uni_id = $acronym . '/' . $uni_id;


            $leadList = new LeadList();
            $leadList->lead_uni_id = $lead_uni_id;
            $leadList->lead_slug = $slug;
            $leadList->fill($request->only('lead_title','project_id','deadline','description','remarks','category_id','source_id'));
            $leadList->save();

            // attachment type

            if ($request->attach_typ && count($request->attach_typ) > 0) {
                for ($i = 0; $i < count($request->attach_typ); $i++) {
                    if ($request->hasFile('attach_file.' . $i)) {
                        $file = $request->file('attach_file.' . $i);
                        $lead_attach_file = $i . '_' . time() . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path('upload/crm/lead/'), $lead_attach_file);
            
                        LeadAttachment::create([
                            'lead_id' => $leadList->id,
                            'file_name' => $lead_attach_file,
                            'file_type' => $request->attach_typ[$i],
                        ]);
                    }
                }
            }
            
         
            // spoc persion add
    
                if ($request->name && count($request->name) > 0) {
                    for ($i = 0; $i < count($request->name); $i++) {
                        // Store lead spock persion
                        LeadSpocPerson::create([
                            'lead_id' => $leadList->id,
                            'name' => $request->name[$i],
                            'email' => $request->email[$i],
                            'contact' => $request->contact[$i],
                            'remarks' => $request->sp_remarks[$i],
                            'default_spoc' => $request->set_as_def[$i],
                            'status' => 1,
                        ]);
                    }
                }
       

            // lead assign user save data

            $leadAssignUser = new LeadAssignUser();
            $leadAssignUser->lead_id = $leadList->id;
            $leadAssignUser->assigned_user_id  = $request->assign_user_id;
            $leadAssignUser->follow_up_status  = 'enabled';
            $leadAssignUser->save();


            // save record in crm_action_log

            $crmActionLog = new CrmActionLog();
            $crmActionLog->lead_id =  $leadList->id;
            $crmActionLog->action_type = 'open';
            $crmActionLog->assigned_user_id = $request->assign_user_id;
            $crmActionLog->save();

            DB::commit();

            return redirect()->route('leads.list')->with(['success' => true, 'message' => 'Lead added successfully']);
        } catch (Throwable $th) {
            DB::rollBack();
            return redirect()->route('leads.list')->with(['error' => true, 'message' => $th->getLine() . "-" .$th->getMessage()]);
        }

    }

    public function crmLeadFollowUp($id){

        $leads = LeadList::with('leadAssignUser','projectDetails','getCategory','getSource')
                ->whereHas('leadAssignUser', function($query){
                        $query->where('lead_assign_users.follow_up_status', 'enabled');
                })
                ->where('id', $id)
                ->first();

                $leadFollowups = CrmActionLog::select('crm_action_logs.created_at','lead_follow_up_lists.next_follow_up','created_by_user.first_name','created_by_user.last_name','created_by_user.last_name','lead_follow_up_lists.comment','lead_follow_up_lists.comment_file')
                ->join('lead_follow_up_lists', 'lead_follow_up_lists.id', '=', 'crm_action_logs.follow_up_id')
                ->leftJoin('users as created_by_user', 'created_by_user.id', '=', 'lead_follow_up_lists.created_by')
                ->leftJoin('users as updated_by_user', 'updated_by_user.id', '=', 'crm_action_logs.updated_by')
                ->orderBy('crm_action_logs.created_at', 'desc')
                ->where('crm_action_logs.lead_id', $id)
                ->get();

               $changed_lead_status = CrmActionLog::select("crm_action_logs.*")->with('assignedUser','createdBy')
                    ->orderByDesc('crm_action_logs.id')
                    ->limit(1)
                    ->first();
            // dd($changed_lead_status);

        return view('sales.leads.crm-lead-follow-up',compact('leads','leadFollowups','changed_lead_status'));
    }


    public function show($id){
        $lead = LeadList::with('leadAssignUser','projectDetails','getCategory','getSource')
        ->whereHas('leadAssignUser', function($query){
                $query->where('lead_assign_users.follow_up_status', 'enabled');
        })
        ->where('id', $id)
        ->first();

        $leadAttachments = LeadAttachment::select('id','lead_id','file_type','file_name')
                        ->where('lead_id', $id)
                        ->get();

        $leadFollowups = CrmActionLog::select('crm_action_logs.created_at','lead_follow_up_lists.next_follow_up','created_by_user.first_name','created_by_user.last_name','created_by_user.last_name','lead_follow_up_lists.comment','lead_follow_up_lists.comment_file')
        ->join('lead_follow_up_lists', 'lead_follow_up_lists.id', '=', 'crm_action_logs.follow_up_id')
        ->leftJoin('users as created_by_user', 'created_by_user.id', '=', 'lead_follow_up_lists.created_by')
        ->leftJoin('users as updated_by_user', 'updated_by_user.id', '=', 'crm_action_logs.updated_by')
        ->orderBy('crm_action_logs.created_at', 'desc')
        ->where('crm_action_logs.lead_id', $id)
        ->get();        
        
        return view('sales.leads.view-crm-details',compact('lead','leadAttachments','leadFollowups'));
    } 

    public function storeLeadFollowUp(Request $request){

        $validate = $request->validate([
                'comment' => 'required',
                'next_follow_up' => [
                    'required',
                    'date',
                    'after:today'
                    ]
        ]);

        // move file 

        try {
            
        DB::beginTransaction();

        $comment_attach_file = [];
        if ($request->comment_file && count($request->comment_file) > 0) {
            for ($i = 0; $i < count($request->comment_file); $i++) {
                if ($request->hasFile('comment_file.' . $i)) {
                    $file = $request->file('comment_file.' . $i);
                    $lead_followup_attach_file =   time() . '_' . $file->getClientOriginalName();
                    $comment_attach_file[] =  $lead_followup_attach_file;
                    $file->move(public_path('upload/crm/follow_up/'), $lead_followup_attach_file);
                }
            }
        }

        // dd('ok');

        $comment_file = implode(",",$comment_attach_file);
   
        $leadFollowup = new LeadFollowUpList();
        $leadFollowup->lead_id = $request->lead_id;
        $leadFollowup->assigned_user_id = $request->lead_assign_user_id;
        $leadFollowup->comment = $request->comment;
        $leadFollowup->comment_file =  $comment_file;
        $leadFollowup->next_follow_up =  $request->next_follow_up;
        $leadFollowup->save();

        // add crm Action log

        if($leadFollowup){
            $actionLog = new CrmActionLog();
            $actionLog->lead_id = $request->lead_id;
            $actionLog->action_type = 'follow_up';
            $actionLog->follow_up_id = $leadFollowup->id;
            $actionLog->assigned_user_id = $request->lead_assign_user_id;
            $actionLog->save();
        }

        DB::commit();

        return redirect()->back()->with(['success' => true, 'message' => 'Follow Up added successfully']);
    } catch (Throwable $th) {
        DB::rollBack();
        return redirect()->back()->with(['error' => true, 'message' => $th->getMessage()]);
    }
    }

    public function edit($id){

        $projects = CrmProjectList::with('client')
        ->where('status','1')
        ->get();

        $leadSources = LeadSourceList::select('id','source_name','status')
                    ->where('status','1')
                    ->get();


        $company_id = auth()->user()->company_id;
        // check company
        if($company_id == 2){
        $leadAssigns = User::whereHas('role', function($query){
                $query->where('id', 26);
        })
        ->where('status','1')
        ->get();
        }elseif(auth()->user()->role->role_name == "sales_manager"){
            $leadAssigns = User::whereHas('role', function($query){
                $query->where('id', auth()->user()->role->id);
                })
                ->where('status','1')
                ->get();
        }else{
                $leadAssigns = User::with('role')
                ->where('status','1')
                ->get();
        }

        $categories = LeadCategoryList::select('id','category_name','status')
                    ->where('status','1')
                    ->get();

        $leadList = LeadList::with('leadAssignUser')->find($id);
        $leadAttachments = LeadAttachment::select('id','lead_id','file_type','file_name')
                        ->where('lead_id', $id)
                        ->get();

        $spocPersons = LeadSpocPerson::select('id','lead_id','name','email','contact','remarks','default_spoc')
                        ->where('lead_id', $id)
                        ->get();      

        return view('sales.leads.edit-lead', compact('projects','leadSources','leadAssigns','categories','leadList','leadAttachments','spocPersons'));

    }

    public function update(Request $request, $id){

        // dd('fdsfdsf');

        $validation = $request->validate([
            'lead_title' => 'required | string',
            'project_id' => 'required',
            'deadline' => 'required',
            'description' => 'required',
            'remarks' => 'required',
            // 'category_id' => 'required',
            'source_id' => 'required',
            'assign_user_id' => 'required',
            'attach_typ' => 'required',
            'attach_file' => 'nullable',
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'sp_remarks' => 'required',
            // 'set_as_def' => 'required',
        ]);

        try {
            DB::beginTransaction();

            $total = LeadList::select('id')->count();
            $lead_title = $request->lead_title;

            if ($total > 0) {
                $slug = ($total + 1) . '/' . strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '_', $lead_title)));
                $last = $total + 1;
            } else {
                $slug = '1/' . strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '_', $lead_title)));
                $last = 1;
            }

          
            $words = explode(" ", $lead_title);
            $acronym = "";
            foreach ($words as $w) {
                $acronym .= ucwords($w[0]);
            }
            $uni_id = str_pad($last, 4, '0', STR_PAD_LEFT);
            $lead_uni_id = $acronym . '/' . $uni_id;


            $leadList = LeadList::find($id);
            $leadList->lead_uni_id = $lead_uni_id;
            $leadList->lead_slug = $slug;
            $leadList->fill($request->only('lead_title','project_id','deadline','description','remarks','category_id','source_id'));
            $leadList->save();

            // attachment type

            if ($request->attach_typ && count($request->attach_typ) > 0) {
                for ($i = 0; $i < count($request->attach_typ); $i++) {
                    if ($request->hasFile('attach_file.' . $i)) {
                        $file = $request->file('attach_file.' . $i);
                        $lead_attach_file = $i . '_' . time() . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path('upload/crm/lead/'), $lead_attach_file);
                                // Create new attachment record
                            LeadAttachment::create([
                                'lead_id' => $leadList->id,
                                'file_name' =>  $lead_attach_file,
                                'file_type' => $request->attach_typ[$i],
                            ]);
                        }
                    }
                }
            
            
         
            // spoc persion add
    
                if ($request->name && count($request->name) > 0) {
                    for ($i = 0; $i < count($request->name); $i++) {
                        // Store lead spock persion
                        $leadspocPersion = LeadSpocPerson::where('lead_id', $id)->first();
                        $leadspocPersion->lead_id =  $leadList->id;
                        $leadspocPersion->name = $request->name[$i];
                        $leadspocPersion->email =  $request->email[$i];
                        $leadspocPersion->contact = $request->contact[$i];
                        $leadspocPersion->remarks =  $request->sp_remarks[$i];
                        $leadspocPersion->default_spoc =  $request->set_as_def[$i];
                        $leadspocPersion->save();
                    }
                }
       

            // lead assign user save data

            LeadAssignUser::updateOrCreate(
                ['lead_id' => $id],
                [
                    'assigned_user_id' => $request->assign_user_id,
                    'follow_up_status' => 'enabled',
                ]
            );


            DB::commit();

            return redirect()->route('leads.list')->with(['success' => true, 'message' => 'Lead Updated successfully']);
        } catch (Throwable $th) {
            DB::rollBack();
            return redirect()->route('leads.list')->with(['error' => true, 'message' => $th->getLine() . "-" .$th->getMessage()]);
        }


    }

    public function removeLeadAttachment($id){
        $existingAttachment = LeadAttachment::where('id', $id)
                ->first();

            if ($existingAttachment) {
                $oldFilePath = public_path('upload/crm/lead/' . $existingAttachment->file_name);
                if (File::exists($oldFilePath)) {
                    File::delete($oldFilePath);
                }
                $existingAttachment->delete(); // Remove old record
            }

            return redirect()->back()->with(['success' => true, 'message' => 'Lead Attachment Deleted successfully']);
    }


    public function deleteLeadSpoc($id){
        $leadSpocPersion = LeadSpocPerson::find($id);
        $leadSpocPersion->delete();
        return redirect()->back()->with(['success' => true, 'message' => 'Lead Spoc Persion Deleted successfully']);
    }





}

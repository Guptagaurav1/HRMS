<?php

namespace App\Http\Controllers\sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClientList;
use App\Models\LeadCategoryList;
use App\Models\ClientAttachType;
use App\Models\CrmProjectList;
use App\Models\CrmProjectAttachment;
use Illuminate\Support\Facades\DB;
use Throwable;

class ProjectController extends Controller
{
    /**
     * List of sales project.
     */
    public function index(Request $request)
    {
        $search = '';
        $projects = CrmProjectList::select('id', 'project_name', 'client_id', 'per_inv_no', 'no_of_requirement', 'p_contact_name', 'p_contact_email', 'p_contact_phone', 'amount', 'created_by', 'created_at', 'status');
        if($request->search){
            $search = $request->search;
            $projects = $projects->where('project_name', "LIKE", "%$search%")
                        ->orWhere('id', "LIKE", "%$search%")
                        ->orWhere('per_inv_no', "LIKE", "%$search%")
                        ->orWhere('p_contact_name', "LIKE", "%$search%")
                        ->orWhere('p_contact_email', "LIKE", "%$search%")
                        ->orWhere('p_contact_phone', "LIKE", "%$search%")
                        ->orWhereHas('client',  function ($query) use ($search) {
                            $query->where('client_name', "LIKE", "%$search%");
                        })
                        ->orWhereHas('user',  function ($query) use ($search) {
                            $query->whereRaw("CONCAT(first_name, ' ',last_name) LIKE ?", ["%$search%"]);
                        });
        }
        $projects = $projects->orderByDesc('id')->paginate(25)->withQueryString();
        return view("sales.projects.sales-project-list", compact('projects', 'search'));
    }
    
    /**
     * Add Project.
     */
    public function edit($id)
    {
        try{
            $clients = ClientList::select('id', 'client_name')->get();
            $category_lists = LeadCategoryList::select('id', 'category_name')->get();
            $attachment_type = ClientAttachType::select('attach_type')->get();
            $project = CrmProjectList::findOrFail($id);
            return view("sales.projects.edit-sales-project", compact('project', 'clients', 'category_lists', 'attachment_type'));
        }
        catch(Throwable $th)
        {
            return redirect()->route('sales-projects.list')->with(['error' => true, 'message' => 'Invalid Project']);
        }
    }

    /**
     * Add Project.
     */
    public function read($id)
    {
        try 
        {
            $project = CrmProjectList::findOrFail($id);
            return view("sales.projects.view-sales-project", compact('project'));
        }
        catch (Throwable $th)
        {

        }
    }

    /**
     * Add Project.
     */
    public function add($client_id = null)
    {
        $clients = ClientList::select('id', 'client_name')->get();
        $category_lists = LeadCategoryList::select('id', 'category_name')->get();
        $attachment_type = ClientAttachType::select('attach_type')->get();

        return view("sales.projects.add-sales-project", compact('clients', 'client_id', 'category_lists', 'attachment_type'));
    }

    /**
     * Store Project Details.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'project_name' => ['required', 'string'],
            'client_id' => ['required'],
            'category_id' => ['required']
        ]);

        try {
            DB::beginTransaction();
            
            $data = $request->all();

            unset($data['_token']);
            unset($data['file_name']);
            unset($data['file_type']);

            $project_id = CrmProjectList::create($data)->id;

            if ($request->file_type && count($request->file_type) > 0) {
                for ($i = 0; $i < count($request->file_type); $i++) {

                    if ($request->hasFile('file_name.' . $i)) {
                        $file = $request->file('file_name.' . $i);
                        $project_file = 'project_' . $i . '_' . time() . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path('upload/crm/project'), $project_file);

                        // Store Project Attachement
                        CrmProjectAttachment::create([
                            'project_id' => $project_id,
                            'file_name' => $project_file,
                            'file_type' => $request->file_type[$i],
                        ]);
                    }
                }
            }
            DB::commit();
            return redirect()->route('sales-projects.list')->with(['success' => true, 'message' => 'Project added successfully']);
        } catch (Throwable $th) {
            DB::rollBack();
            return redirect()->route('sales-projects.list')->with(['error' => true, 'message' => $th->getMessage()]);
        }
    }

    /**
     * Update Project Details.
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'project_name' => ['required', 'string'],
            'client_id' => ['required'],
            'category_id' => ['required'],
            'id' => ['required', 'integer']
        ]);

        try {
            DB::beginTransaction();
            
            $data = $request->all();

            unset($data['_token']);
            unset($data['file_name']);
            unset($data['file_type']);
            unset($data['remove_attachment']);

            CrmProjectList::where('id', $request->id)->update($data);

            if ($request->file_type && count($request->file_type) > 0) {
                for ($i = 0; $i < count($request->file_type); $i++) {

                    if ($request->hasFile('file_name.' . $i)) {
                        $file = $request->file('file_name.' . $i);
                        $project_file = 'project_' . $i . '_' . time() . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path('upload/crm/project'), $project_file);

                        // Store Project Attachement
                        CrmProjectAttachment::create([
                            'project_id' => $request->id,
                            'file_name' => $project_file,
                            'file_type' => $request->file_type[$i],
                        ]);
                    }
                }
            }

            // Delete attachments if removed.
            if ($request->remove_attachment && count($request->remove_attachment) > 0) {
                CrmProjectAttachment::destroy($request->remove_attachment);
            }
            DB::commit();
            return redirect()->route('sales-projects.list')->with(['success' => true, 'message' => 'Project updated successfully']);
        } catch (Throwable $th) {
            DB::rollBack();
            return redirect()->route('sales-projects.list')->with(['error' => true, 'message' => $th->getMessage()]);
        }
    }
}

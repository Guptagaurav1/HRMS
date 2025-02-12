<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkOrder;
use App\Models\WoContactDetail;
use App\Models\Organization;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(Request $request){
        return view("hr.workOrder.project-list");
    }
    public function projectlist(Request $request){
        $arrData = [];
        $draw              =     $request->get('draw')??1; // Internal use
        $start             =     $request->get("start")??0; // where to start next records for pagination
        $rowPerPage        =     $request->get("length")??10; // How many recods needed per page for pagination
        $orderArray        =     $request->get('order');
        $columnNameArray   =     $request->get('columns'); // It will give us columns array
        $searchArray       =     $request->get('search');
        $columnIndex       =     $orderArray[0]['column']??NULL;  
        $columnName        =     'id'; 
        $columnSortOrder   =     $orderArray[0]['dir']??'desc'; // This will get us order direction(ASC/DESC)
        $searchValue       =     $searchArray['value']??NULL; // This is search value
        
        $totalProjects = Project::with(['organizations']);
       
        if (!empty($searchValue)) {
            $totalProjects = $totalProjects->where(function ($query) use ($searchValue) {
            $query->where("project_number","like","%".$searchValue."%")
                    ->orWhere("project_name","like","%".$searchValue."%")
                    ->orWhere("empanelment_reference","like","%".$searchValue."%")
                    ->orWhereHas('organizations', function ($q) use ($searchValue) {
                        $q->where('name', 'like', "%$searchValue%");
                    });
            });
        }
        $for_arrData = $totalProjects;
        $total_filtered_data = $totalProjects->count();
        
        $arrData = $for_arrData->skip($start)->take($rowPerPage);
        $arrData= $for_arrData->orderBy($columnName,$columnSortOrder)->get()->toArray();
        $total = count($arrData);
        
        $org_name =[];
        foreach($arrData as $key => $value){
            $action='<a href="'. route("edit-project",$value["id"]) .'"><button type="submit" class="btn btn-primary mb-3"> Edit</button></a>';
            $org_name= $value['organizations']['name'];
            $arrData[$key] +=['s_no' => $key+1,
                            'organization' => $org_name,
                            'action' => $action];
        }
        
        return Response()->json(['draw'=>$draw,'recordsTotal'=>$total,'recordsFiltered'=>$total_filtered_data,'data'=>$arrData]);
    
    }

    public function project_report(){
        $workOrder='';
        $woProjects = WorkOrder::selectRaw('project_id, COUNT(wo_number) as total_wo,SUM(wo_amount) as amount')
        ->groupBy('project_id')
        ->with(['project.organizations']) 
        ->orderBy('project_id', 'desc')
        ->paginate(10);
        return view("hr.workOrder.project-report",compact('woProjects'));
    }

    public function woReport(Request $request){
        $project_id =$request->project_no;
        $project_details =  Project::with(['organizations'])->where('id',$project_id)->orderBy('id', 'desc')->first();
        $workOrder='';
        $woReport = WorkOrder::selectRaw('project_id,wo_number,wo_project_coordinator,wo_no_of_resources,wo_location, wo_start_date,wo_end_date,wo_amount')
        ->with(['project.organizations'])
        ->where('project_id','=',$project_id) 
        ->orderBy('id', 'desc')
        ->get();
        $totalAmount = $woReport->sum('wo_amount');
       
        return view("hr.workOrder.work-order-report",compact('woReport','project_details','totalAmount'));
    }

    public function create(){
        $organization = Organization::orderBy('id','desc')->get();
        return view("hr.workOrder.add-project",compact('organization'));
    }
    public function store(Request $request){
        // dd($request);
        $request->validate([
            'organisation_id' => 'required',
            'project_number' => 'required|unique:projects',
            'project_name' => 'required',
            'empanelment_reference' => 'required'

        ]);
        $project = new Project();
        // $project->fill($request->all());
        // $project->status = '1';
        $project->organisation_id = $request->organisation_id;
        $project->project_number = $request->project_number;
        $project->project_name = $request->project_name;
        $project->empanelment_reference = $request->empanelment_reference;
        $project->save();
        if($project){
            return redirect()->route('project-list')->with('success','Added Successfully !');
        }

    }
    public function edit(Request $request, string $id){
        $project = Project::with('organizations')->findOrFail($id);
        $organization = Organization::orderBy('id','desc')->get();
        // dd($project);
        return view('hr.workOrder.edit-project',compact('organization','project'));
    }

    public function update(Request $request, string $id){
        $request->validate([
            'organisation_id' => 'required',
            'project_number' => 'required',
            'project_name' => 'required',
            'empanelment_reference' => 'required'

        ]);
        $project =  Project::Find($id);
        $project->organisation_id = $request->organisation_id;
        $project->project_number = $request->project_number;
        $project->project_name = $request->project_name;
        $project->empanelment_reference = $request->empanelment_reference;
        $project->update();
        if($project){
            return redirect()->route('project-list')->with('success','Added Successfully !');
        }
    }

    public function organisation_project(Request $request){
       
        $or_id = $request->or_id;
        $projects =  Project::where('organisation_id',$or_id)->orderBy('id', 'desc')->get();
       
        if($projects){
            $organization = Organization::orderBy('id','desc')->get();
            // return response()->json($project);
            return response()->json([
                'message' => 'Projects retrieved successfully',
                'data' => $projects
            ], 200);
        }
    }
    public function project_details(Request $request){
       
        $project_id = $request->project_id;
        $project_details =  Project::where('id',$project_id)->orderBy('id', 'desc')->first();

        if($project_details){
            return response()->json([
                'message' => 'Project Details retrieved successfully',
                'data' => $project_details
            ], 200);
        }
    }
}

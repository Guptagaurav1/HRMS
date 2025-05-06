<?php

namespace App\Http\Controllers\sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClientList;
use App\Models\LeadCategoryList;
use App\Models\ClientAttachType;

class ProjectController extends Controller
{
    /**
     * List of sales project.
     */
    public function index()
    {
        return view("sales.projects.sales-project-list");
    }
    
    /**
     * Add Project.
     */
    public function edit()
    {
        return view("sales.projects.edit-sales-project");
    }

    /**
     * Add Project.
     */
    public function read()
    {
        return view("sales.projects.view-sales-project");
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
}

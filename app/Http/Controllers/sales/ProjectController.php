<?php

namespace App\Http\Controllers\sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
    public function add()
    {
        return view("sales.projects.add-sales-project");
    }
}

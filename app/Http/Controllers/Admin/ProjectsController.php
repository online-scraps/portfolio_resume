<?php

namespace App\Http\Controllers\Admin;

use App\Models\Projects;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProjectsRequest;
use App\Http\Requests\UpdateProjectsRequest;

class ProjectsController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = Auth::user();
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Projects::all();
        return view('ar.project', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectsRequest $request)
    {
        $project = new Projects();
        $project->name = $request->name;
        $project->description = $request->description;
        $project->category_id = $request->category_id;
        $project->link = $request->link;
        // $project->created_by = $this->user->id;
        $project->created_by = 1;
        $project->save();
        return redirect()->back()->with('success', 'Project Created Successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectsRequest $request, $id)
    {
        $project = Projects::find($id);
        $project->name = $request->name;
        $project->description = $request->description;
        $project->category_id = $request->category_id;
        $project->link = $request->link;
        $project->save();
        return redirect()->back()->with('success', 'Project Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Projects::find($id);
        $project->delete();
        return redirect()->back()->with('success', 'Project Deleted Successfully.');
    }
}

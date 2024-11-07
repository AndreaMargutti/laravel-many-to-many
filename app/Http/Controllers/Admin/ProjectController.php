<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProjectRequest;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    public function index () {
        $projects = Project::all();

        return view ('admin.projects.index', compact('projects'));
    }

    public function show (Project $project) {

        return view('admin.projects.show', compact('project'));
    }

    public function create () {
        $types = Type::all();
        return view('admin.projects.create', compact('types'));
    }

    public function store (StoreUpdateProjectRequest $request) {
        //dd($request);

        $data = $request->validated();
        //dd($data);

        $newProject = new Project();
        $newProject->type_id = $data["type_id"];
        $newProject->name = $data['name'];
        $newProject->members = $data['members'];
        $newProject->description = $data['description'];
        $newProject->save();

        return redirect()->route('admin.projects.show', $newProject->id);
    }

    public function edit (Project $project) {

        $types = Type::all();

        return view('admin.projects.edit', compact('project', 'types'));
    }

    public function update (StoreUpdateProjectRequest $request, Project $project) {
        $formData = $request->validated();

        $project->type_id = $formData["type_id"];
        $project->name = $formData['name'];
        $project->members = $formData['members'];
        $project->description = $formData['description'];
        $project->update();

        return redirect()->route('admin.projects.show', $project);
    }

    public function destroy (Project $project) {

        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
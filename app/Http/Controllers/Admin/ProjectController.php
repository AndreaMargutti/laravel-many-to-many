<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProjectRequest;
use App\Models\Project;
use App\Models\Technology;
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
        $project = new Project();
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('project', 'types', 'technologies'));
    }

    public function store (StoreUpdateProjectRequest $request) {
        // dd($request);

        $data = $request->validated();
        // dd($data);

        $newProject = new Project();
        $newProject->type_id = $data["type_id"];
        $newProject->name = $data['name'];
        $newProject->members = $data['members'];
        $newProject->description = $data['description'];
        $newProject->save();
        $newProject->technologies()->sync($data['technologies']);


        return redirect()->route('admin.projects.index', $newProject->id);
    }

    public function edit (Project $project) {

        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    public function update (StoreUpdateProjectRequest $request, Project $project) {
        $formData = $request->validated();

        $project->type_id = $formData["type_id"];
        $project->name = $formData['name'];
        $project->members = $formData['members'];
        $project->description = $formData['description'];
        $project->update();

        $project->technologies()->sync($formData['technologies']);
        return redirect()->route('admin.projects.show', $project);
    }

    public function destroy (Project $project) {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }

    public function trash () {
        $projects = Project::onlyTrashed()->get();
        return view ('admin.projects.trash', compact('projects'));
    }

    public function forceDelete (string $id) {
        $project = Project::onlyTrashed()->findOrFail($id); // TODO: chiedere come funziona la soft delete con le relazioni
        $project->forceDelete();

        return redirect()->route('admin.projects.index',);
    }
}
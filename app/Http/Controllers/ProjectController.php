<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // passo tutti i risultati in pagina in ordine decrescente

        $projects = Project::orderByDesc('id')->paginate(10);

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validated = $request->validate([
            'title' => 'required|max:50|min:2',
            'description' => 'nullable|max:1000|min:2',
            'authors' => 'nullable|max:50|min:2',
            'thumb' => 'nullable|mimes:jpg,bmp,png|max:300',
        ]);

        $project = new Project();

     

        if ($request->has('thumb')) {
            $file_path =  Storage::put('projects_images', $request->thumb);
            $project ->thumb = $file_path;
        }

     
        $project->description = $request->description;
        $project->title = $request->title;
        $project->authors = $request->authors;
        $project->save();
        return to_route('project.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     * RICORDARSI DI AGGIUNGERE $FILLABLE NEL MODEL
     */
    public function update(Request $request, Project $project)
    {

        $validated = $request->validate([
            'title' => 'required|max:50|min:2',
            'description' => 'nullable|max:1000|min:2',
            'authors' => 'nullable|max:50|min:2',
        ]);

        $data = $request->all();
        $project->update($data);
        return redirect()->route('project.show', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('project.index')->with('messaggio', 'hai cancellato il progetto con successo!');    }
}

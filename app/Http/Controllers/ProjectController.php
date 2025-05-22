<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function show()
    {
        $projects = Project::all();

        return view('owner.home.project', compact('projects'));
    }

    public function showCreate()
    {
        return view('owner.input.project');
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png',
            'description' => 'required',
            'link' => 'required',
        ]);

        $data = $request->only(['title', 'description', 'link']);

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('projects', 'public');
            $data['image'] = $image;
        }

        Project::create($data);

        return redirect('project')->with('success', 'Project berhasil ditambahkan');
    }

    public function showUpdate($id)
    {
        $project = Project::findOrFail($id);

        return view('owner.update.project', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png',
            'description' => 'required',
            'link' => 'required',
        ]);

        $project = Project::findOrFail($id);
        $project->title = $request->title;
        $project->description = $request->description;
        $project->link = $request->link;

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('projects', 'public');
            $project->image = $image;
        }

        $project->save();

        return redirect()->route('projectShow')->with('success', 'Project berhasil diupdate');
    }

    public function delete($id)
    {
        $project = Project::findOrFail($id);

        // Hapus gambar dari storage kalau perlu
        if ($project->image && \Storage::exists('public/' . $project->image)) {
            \Storage::delete('public/' . $project->image);
        }

        $project->delete();

        return redirect()->route('projectShow')->with('success', 'Project berhasil dihapus.');
    }

}

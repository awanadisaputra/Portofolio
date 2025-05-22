<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function show()
    {
        $skills = Skill::all();

        return view('owner.home.skill', compact('skills'));
    }

    public function showCreate()
    {
        return view('owner.input.skill');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png',
        ]);

        $data = $request->only(['name']);

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('skills', 'public');
            $data['image'] = $image;
        }

        Skill::create($data);

        return redirect('skill')->with('success', 'Skill berhasil ditambahkan');
    }

    public function showUpdate($id)
    {
        $skill = Skill::findOrFail($id);

        return view('owner.update.skill', compact('skill'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png',
        ]);

        $skill = Skill::findOrFail($id);
        $skill->name = $request->name;

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('skills', 'public');
            $skill->image = $image;
        }

        $skill->save();

        return redirect()->route('skillShow')->with('success', 'Skill berhasil diupdate');
    }

    public function delete($id)
    {
        $skill = Skill::findOrFail($id);

        // Hapus gambar dari storage kalau perlu
        if ($skill->image && \Storage::exists('public/' . $skill->image)) {
            \Storage::delete('public/' . $skill->image);
        }

        $skill->delete();

        return redirect()->route('skillShow')->with('success', 'Skill berhasil dihapus.');
    }
}

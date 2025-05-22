<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Skill;
use App\Models\Contact;
use App\Models\Project;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show()
    {
        $about = About::first(); // Ambil konten tentang Abstrak
        $projects = Project::all();  // Ambil semua proyek
        $skills = Skill::all();  // Ambil semua pengalaman
        $contacts = Contact::all();

        return view('visitor.dashboard', compact('about', 'projects', 'skills', 'contacts'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function show()
    {
        $about = About::first();//pakai ini untuk memanggil about. karena about hanya berisi 1 data jadi pakai ini

        return view('owner.home.about', ['about' => $about]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'description' => 'required|string'
        ]);

        $about = About::first();
        if ($about) {
            $about->update(['description' => $request->description]);
        } else {
            About::create(['description' => $request->description]);
        }
        return redirect('about')->with('success', 'About berhasil diperbarui');
    }
}

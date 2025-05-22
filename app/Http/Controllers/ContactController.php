<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        $contacts = Contact::all();

        return view('owner.home.contact', compact('contacts'));
    }

    public function showCreate()
    {
        return view('owner.input.contact');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png',
            'link' => 'required',
        ]);

        $data = $request->only(['name', 'link']);

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('contacts', 'public');
            $data['image'] = $image;
        }

        Contact::create($data);

        return redirect('contact')->with('success', 'Contact berhasil ditambahkan');
    }

    public function showUpdate($id)
    {
        $contact = Contact::findOrFail($id);

        return view('owner.update.contact', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png',
            'link' => 'required',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->name = $request->name;
        $contact->link = $request->link;

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('contacts', 'public');
            $contact->image = $image;
        }

        $contact->save();

        return redirect()->route('contactShow')->with('success', 'Contact berhasil diupdate');
    }

    public function delete($id)
    {
        $contact = Contact::findOrFail($id);

        // Hapus gambar dari storage kalau perlu
        if ($contact->image && \Storage::exists('public/' . $contact->image)) {
            \Storage::delete('public/' . $contact->image);
        }

        $contact->delete();

        return redirect()->route('contactShow')->with('success', 'Contact berhasil dihapus.');
    }
}

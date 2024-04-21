<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->input('name', '');
        $email = $request->input('email', '');
        $phone = $request->input('phone', '');

        $contactUs = ContactUs::query()
            ->when($name, function ($query, $name) {
                return $query->where('name', 'like', "%{$name}%");
            })
            ->when($email, function ($query, $email) {
                return $query->where('email', 'like', "%{$email}%");
            })
            ->when($phone, function ($query, $phone) {
                return $query->where('phone', 'like', "%{$phone}%");
            })
            ->paginate(10);

        return view('dashboard.ContactUs.index', compact('contactUs', 'name', 'email', 'phone'));
    }

    public function show($id)
    {
        $contactUs = ContactUs::findOrFail($id);
        return view('dashboard.ContactUs.show', compact('contactUs'));
    }

    public function adminIndex()
    {
        $contactMessages = ContactUs::latest()->paginate(10); // Récupère tous les messages de contact

        return view('dashboard.contact-us.index', compact('contactMessages'));
    }
    public function showContactForm()
    {
        return view('contact'); // Assurez-vous d'avoir une vue nommée 'contact'
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'email',
            'phone' => 'required',
            'message' => 'required',
            'subject' => 'required',
        ]);


        ContactUs::create($validated);

        return redirect()->route('contact-us.index')->with('success', 'Your message has been submitted successfully!');
    }
}

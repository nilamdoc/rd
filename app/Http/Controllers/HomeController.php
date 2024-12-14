<?php

// app/Http/Controllers/PostController.php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function registration()
    {
        $phoneCodes = getCountryCodeWithPhoneCodes();
        $countries = getCountryNames();
        return view('home.registration', compact('phoneCodes', 'countries'));
    }
    public function submitForm(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone_code' => 'required',
            'contact' => 'required|numeric',
            'country' => 'required|string',
        ]);

        try {
            // Save the contact information to the database
            \App\Models\Contact::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone_code' => $request->input('phone_code'),
                'contact' => $request->input('contact'),
                'country' => $request->input('country'),
                'created_at' => Carbon::now(), // Manually set created_at
                'updated_at' => Carbon::now(), // Manually set updated_at
            ]);

            // Redirect with success message
            return redirect()->route('questions.show')->with('success', 'Form submitted successfully!');
        } catch (\Exception $e) {
            // Handle exception, e.g., DB errors, and redirect with error message
            return redirect()->back()->withErrors(['error' => 'An error occurred while submitting the form. Please try again.']);
        }
    }
    public function showQuestions()
    {
        $questions = getQuestionsLists();
        $questions = $questions;
        return view('questions.index', compact('questions'));
    }
}

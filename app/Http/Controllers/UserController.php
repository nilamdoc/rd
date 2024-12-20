<?php

// app/Http/Controllers/PostController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * User Registration Form.
    */
    public function index()
    {
        $phoneCodes = getCountryCodeWithPhoneCodes();
        $countries = DB::table('country')->get()->toArray();
        return view('home.registration', compact('phoneCodes', 'countries'));
    }
    /**
     * Insert the User Registration in db.
    */
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
            $uniqueId = Hash::make($request->input('name') . $request->input('email'));
            $userId = DB::table('users')->insert([
                'user_id' => $uniqueId,
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone_code' => $request->input('phone_code'),
                'contact' => $request->input('contact'),
                'country' => $request->input('country'),
                'created_at' => Carbon::now(),  // Manually set created_at
                'updated_at' => Carbon::now(),  // Manually set updated_at
            ]);
            // Store the inserted user ID in the session
            Session::put('user_id', $uniqueId);
            // Redirect with success message
            return redirect()->route('questions.show')->with('success', 'Form submitted successfully!');
        } catch (\Exception $e) {
            // Handle exception, e.g., DB errors, and redirect with error message
            return redirect()->back()->withErrors(['error' => 'An error occurred while submitting the form. Please try again.']);
        }
    }
}

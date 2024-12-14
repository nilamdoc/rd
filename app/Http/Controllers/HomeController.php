<?php

// app/Http/Controllers/PostController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;
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
            DB::table('contacts')->insert([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone_code' => $request->input('phone_code'),
                'contact' => $request->input('contact'),
                'country' => $request->input('country'),
                'created_at' => Carbon::now(),  // Manually set created_at
                'updated_at' => Carbon::now(),  // Manually set updated_at
            ]);
            // Redirect with success message
            return redirect()->route('questions.show')->with('success', 'Form submitted successfully!');
        } catch (\Exception $e) {
            pre($e->getMessage());
            // Handle exception, e.g., DB errors, and redirect with error message
            return redirect()->back()->withErrors(['error' => 'An error occurred while submitting the form. Please try again.']);
        }
    }
    public function showQuestions()
    {
        $questions = DB::table('personality_test')
            ->take(34);
        $exists = $questions->count() > 0;  // Use count to check if any records exist
        if ($exists) {
            $questionsData = $questions->get()->toArray();
            
            $convertedData = array_map(function($item) {
                $itemArray = get_object_vars($item);  // Convert the object to an associative array
                // Convert ObjectId to string
                if (isset($itemArray['_id']) && $itemArray['_id'] instanceof MongoDB\BSON\ObjectId) {
                    $itemArray['_id'] = (string) $itemArray['_id'];  // Convert ObjectId to string
                }
                return $itemArray;
            }, $questionsData);
            usort($convertedData, function($a, $b) {
                return $a['id'] <=> $b['id'];  // PHP 7+ spaceship operator
            });
            $questions = $convertedData;
            return view('questions.index', compact('questions'));
        } else {
            return view('home.index');
        }
    }
}

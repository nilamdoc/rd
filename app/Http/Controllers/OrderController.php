<?php

// app/Http/Controllers/PostController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Mail\OrderPlaced;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index()
    {
        $userId = '$2y$12$oxm5pZHKO3asdDUE1p.HmukwB00eRofYMd3kQQzqHyLmN8GsS4V9m';
        if($userId){
            $phoneCodes = getCountryCodeWithPhoneCodes();
            $countries = DB::table('country')->get()->toArray();
            $testimonialsData = DB::table('testimonials')->where('testimonial_type','personality_test')->get()->toArray();
            return view('order.booking_form', compact('phoneCodes', 'countries','testimonialsData'));
        }else {
            return redirect('/');
        }        
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
            $orderNumber = 'ORD-' . rand(100000000, 999999999); 
            // Get the current date for the order
            $orderDate = Carbon::now()->format('F d, Y');            
            $uniqueId = Hash::make($request->input('name') . $request->input('email'));
            $userId = DB::table('orders_test_booking')->insert([
                'order_number' => $orderNumber, // Store generated order number
                'order_date' => Carbon::now(),  // Store order date in datetime format
                'user_id' => $uniqueId,
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone_code' => $request->input('phone_code'),
                'contact' => $request->input('contact'),
                'country' => $request->input('country'),
                'created_at' => Carbon::now(),  // Manually set created_at
                'updated_at' => Carbon::now(),  // Manually set updated_at
            ]);
            $order = [
                'name' => $request->input('name'),
                'order_number' => 'ORD-' . rand(100000, 999999),
                'order_date' => now()->format('F d, Y'),
            ];
        
            // Send email
            Mail::to($request->input('email'))->send(new OrderPlaced($order));
            return view('order.success', compact('orderNumber', 'orderDate'));
        } catch (\Exception $e) {
            // Handle exception, e.g., DB errors, and redirect with error message
            return redirect()->back()->withErrors(['error' => 'An error occurred while submitting the form. Please try again.']);
        }
    }
}

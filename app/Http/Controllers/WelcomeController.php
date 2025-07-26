<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Display the welcome page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('welcome');
    }
    
    /**
     * Process the customer name and redirect to menu
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processCustomerName(Request $request)
    {
        // Validate the request
        $request->validate([
            'customer_name' => 'required|string|max:100',
        ]);
        
        // Store customer name in session
        $request->session()->put('customer_name', $request->customer_name);
        
        // Redirect to menu page
        return redirect()->route('pelanggan.menu');
    }
}

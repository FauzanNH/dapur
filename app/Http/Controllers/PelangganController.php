<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display the menu page
     *
     * @return \Illuminate\View\View
     */
    public function menu()
    {
        // In a real application, you would fetch menu items from the database
        // For now, we'll just return the view
        return view('pelanggan.hidangan');
    }
    
    /**
     * Display the cart page
     *
     * @return \Illuminate\View\View
     */
    public function cart()
    {
        return view('pelanggan.cart.index');
    }
    
    /**
     * Display the checkout page
     *
     * @return \Illuminate\View\View
     */
    public function checkout()
    {
        return view('pelanggan.checkout.index');
    }
    
    /**
     * Display the payment page
     *
     * @return \Illuminate\View\View
     */
    public function payment()
    {
        return view('pelanggan.payment.index');
    }
}

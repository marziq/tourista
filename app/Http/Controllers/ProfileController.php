<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        // Logic to get user data (optional, if needed)
        // Example: $user = auth()->user();

        return view('profile');  // Return the profile view
    }
}

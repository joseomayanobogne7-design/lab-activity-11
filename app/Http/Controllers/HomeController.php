<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Pass clean English copy to the home view
        $data = [
            'title' => 'Welcome to Library App',
            'name' => 'Mj Obogne',
            'course' => 'BSIT (Bachelor of Science in Information Technology)',
            'description' => 'A clean and modern web application for managing books, genres, and activities in our system.',
        ];

        return view('home', $data);
    }
}
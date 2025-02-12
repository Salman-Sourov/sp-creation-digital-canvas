<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    // public function __construct(){
    //     $this->middleware(['logged']);
    // }

    public function getHome(){
        $commons = [
            'page_title' => 'Dashboard',
            'content_title' => 'Dashboard',
            'main_menu' => 'dashboard',
            'current_menu' => 'dashboard'
        ];

        return view('backend', compact('commons'));
    }
}

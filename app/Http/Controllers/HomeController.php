<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('home.index');
    }

    public function contact(): View
    {
        $title = 'Contact us- Online Store';
        $subtitle = 'We are a message away';
        $email = 'silco@si.co';
        $address = 'Silicon Valley, USA';
        $phoneNumber = '+01 3005621';

        return view('home.contact')->with('title', $title)
            ->with('subtitle', $subtitle)
            ->with('email', $email)
            ->with('address', $address)
            ->with('phoneNumber', $phoneNumber);
    }

    public function about(): View
    {
        $data1 = 'About us - Online Store';
        $data2 = 'About us';
        $description = 'This is an about page ...';
        $author = 'Developed by: Jose Tordecilla';

        return view('home.about')->with('title', $data1)
            ->with('subtitle', $data2)
            ->with('description', $description)
            ->with('author', $author);
    }
}

<?php
namespace App\Http\Controllers;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
 public function index(): View
 {
 return view('home.index');
 }
}
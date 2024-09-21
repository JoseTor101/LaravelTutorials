<?php

namespace App\Http\Controllers;

use App\Models\Fish;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class FishController extends Controller
{
    public function register(Request $request): View
    {   
        $viewData['title'] = "Register fish";

        return view('fishes.register')->with('viewData', $viewData);

    }

    public function create(Request $request): RedirectResponse
    {
        $fish = new Fish();
        $fish->validate($request->only(['name','species', 'weight']));
        $fish = Fish::create($request->only(['name','species', 'weight']));
    
        $viewData['message'] = 'Fish registered successfully!';
        return redirect()->route('fishes.show')->with('message', $viewData['message']);        
    }

    public function show(Request $request): View
    {   
        $viewData['title'] = "Fish list";
        $viewData['subtitle'] = "List of fishes";
        $viewData['message'] = $request->session()->get('message');
        $request->session()->forget('message');

        $viewData['fishes'] = Fish::orderBy('weight', 'asc')->get();

        return view('fishes.show')->with('viewData', $viewData);
    }

    public function statistics(): VIew
    {   
        $viewData['title'] = "Statistics";
        $viewData['subtitle'] = "Fish statistics";

        $speciesFrogDog = Fish::where('species', 'Sapo Perro')->count();
        $speciesBigHead = Fish::where('species', 'Cabezón')->count();
        $heavierFish = Fish::orderBy('weight', 'desc')->first();

        $viewData['speciesFrogDog'] = $speciesFrogDog;
        $viewData['speciesBigHead'] = $speciesBigHead;
        $viewData['heavierFish'] = $heavierFish ? $heavierFish->getName() . ' (' . $heavierFish->getWeight() . ' kg)' : 'No data available';

        return view('fishes.statistics')->with('viewData', $viewData);
    }
}

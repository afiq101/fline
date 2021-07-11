<?php

namespace App\Http\Controllers;

use App\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $images = Media::get();

        return view('index', compact('images'));
    }

    public function store(Request $request)
    {
        $search = null;
        $images = Media::select();

        if ($request->has('search') && $request->input('search') != ''){
            $images = $images->where('title','LIKE','%' . $request->input('search') . '%');
            $search = $request->input('search');
        }

        $images = $images->get();

        return view('index', compact('images','search'));
    }
}

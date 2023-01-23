<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use Illuminate\Http\Request;
use Inertia\Inertia;

class IndexController extends Controller
{
    public function index()
    {
        return Inertia::render('Home', [
                'title' => 'Home to-do list',
                'to_dos' => ToDo::all()
        ]);
    }

    public function remove(Request $request)
    {
        ToDo::whereId($request->id)->delete();
    }

    public function add(Request $request)
    {
        ToDo::create($request->todo);
    }

    public function changeStatus()
    {
//        return Inertia::render('Home', [
//            'title' => 'Home to-do list',
//            'to_dos' => ToDo::all()
//        ]);
    }
}

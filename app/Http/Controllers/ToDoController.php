<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ToDoController extends Controller
{
    public function index()
    {
        return Inertia::render('ToDoList/List', [
            'title' => 'To-do list',
            'to_dos' => ToDo::all()
        ]);
    }

    public function edit(Request $request)
    {
        return Inertia::render('ToDoList/Edit', [
            'title' => 'To-do edit',
            'to_do' => ToDo::whereId($request->id)->first()
        ]);
    }

    public function save(Request $request)
    {
        $data = $request->todo;
        $toDo = ToDo::whereId($data['id'])->first();

        $toDo->name = $data['name'] ?? ' ';
        $toDo->text = $data['text'] ?? ' ';
        $toDo->status = $data['status'] ?? ' ';
        $toDo->save();

        return redirect()->route('to-do-list');
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
    }
}

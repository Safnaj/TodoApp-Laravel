<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Todo;

class TodosController extends Controller
{
    public function index()
    {
        $todos = Todo::all();   //All for Fetching all the Datas fro DB

        return view('todos')->with('todos', $todos);    //Passing the Variable to View
    }

    public function store(Request $request)
    {
        $todo = new Todo;       //New Instance
        $todo->todo = $request->todo;   //New Columnt In DB
        $todo-> save();

        Session::flash('success','Your Todo was Created..!');
        return redirect()->back();      //Redirect Back
    }

    public function delete($id)
    {
        $todo = Todo::find($id);
        $todo->delete();             //delete Method

        Session::flash('success','Your Todo was Deleted..!');
        return redirect()->back();
    }

    public function update($id)
    {
        $todo = Todo::find($id);

        return view('update')->with('todo', $todo);
    }

    public function save(Request $request, $id)
    {
        $todo = Todo::find($id);
        $todo->todo = $request->todo;
        $todo->save();

        Session::flash('success','Your Todo was Updated..!');
        return redirect()->route('todos');

    }

    public function completed($id)
    {
        $todo = Todo::find($id);
        $todo->completed = 1;
        $todo->save();

        Session::flash('success','Your Todo was Marked as Completed..!');
        return redirect()->back();
    }
}

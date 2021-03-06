<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Todo;

class TodosController extends Controller
{
    //
    public function index(){
        $todos = Todo::all();
        return view('todos')->with('todos',$todos);
    }

    public function store(Request $request){
        // dd($request->all());
        $data = new Todo();
        $data-> todo = $request->todo;
        $data->save();

        Session::flash('success','Your Todo was created!');
        return redirect()->back();
    }

    public function delete($id){
        // dd($id);
        $data = Todo::find($id);
        $data->delete();
        Session::flash('success','Your Todo was deleted!');
        return redirect()->back();
    }

    public function update($id){
        // dd($id);
        $data = Todo::find($id);
        // $data-> todo = $request->todo;
        // $data->save();

        return view('update')->with('todo',$data);
    }

    public function save(Request $request, $id){
        // dd($request->all());
        $data = Todo::find($id);
        $data-> todo = $request->todo;
        $data->save();

        Session::flash('success','Your Todo was updated!');
        return redirect()->route('todos');
    }

    public function completed($id){
        // dd($request->all());
        $data = Todo::find($id);
        $data->completed = 1;
        $data->save();
        Session::flash('success','Your Todo was completed!');
        return redirect()->route('todos');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function todos(){
        return Todo::all();
    }

    public function getTodos($id){
        return Todo::where("id", $id)->first();
    }

    public function postTodos(Request $req){
        $todoDate = json_decode($req->getContent());
        $todos = new Todo();

        $todos->task = $todoDate->task;
        return $todos->save();
    }

    public function tick($id){
        $todos = Todo::where("id", $id)->first();

        if($todos == null){
            return response()->json("eroore", 404);
        }

        $todos->tick = true;
        $todos->save();
        return $todos;
    }

    public function modifi(Request $req, $id){
        $todoDate = json_decode($req->getContent());
        $todos = Todo::where("id", $id)->first();

        if($todos == null){
            return response()->json("eroore", 404);
        }
        $todos->task = $todoDate->task;
        $todos->save();
        return $todos;

    }

    public function delete($id){
        //Todo::destroy($id);
         Todo::softDeleted($id);
         return "eliminato";

    }
}

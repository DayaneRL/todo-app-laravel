<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use  App\Models\{Tasks,User};

class TaskController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::user()->id ?? null);
        $tasks = isset($user) ? $user->tasks()->get() : null;

        return view('tasks.index', compact('user'));
    }

    public function store(Request $request)
    {
        try {
            if(Auth::user()){

                DB::beginTransaction();
                $task = new Tasks;
                $task->task = $request['tarefa'];
                $task->user_id = Auth::user()->id;
                $task->status = 0;
                $task->save();

                DB::commit();
            }
            return response()->json([
                'status'=>200,
                'msg'=> 'Cadastrado com sucesso'
            ]);
        }  catch (\Exception $e) {
            return response()->json([
                'status'=> 500,
                'msg'   => $e->getMessage()
            ]);
        }
    }
}

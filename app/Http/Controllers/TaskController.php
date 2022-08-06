<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use  App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        return view('tasks.index');
    }

    public function store(Request $request)
    {
        try {
            
            DB::beginTransaction();
            
            $task->task = $request['tarefa'];
            $task->user_id = Auth::user()->id;
            $task->save();
            DB::commit();
            // return redirect()->route('dashboard.index')->with('success', "cadastrado com sucesso" );
            
            return response()->json([
                'status'=>200,
                'msg'=> 'Cadastrado com sucesso'
            ]);
        }  catch (Exception $e) {
            // return back()->withError($exception->getMessage())->withInput();
            return response()->json([
                'status'=> 500,
                'msg'   => $e->getMessage()
            ]);
        }
    }
}

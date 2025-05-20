<?php

namespace App\Http\Controllers;

use App\Models\task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ToDoListController extends Controller
{
    public function todolist() {
        $tasks = task::all();
        return view('template-home', [
            'tasks' => $tasks
        ]);
    }

    public function create(){
        return view('tambah');
    }
    public function edit($id)
{
    $task = Task::findOrFail($id); // pastikan variabel $task terisi
    return view('edit', compact('task')); // kirim $task ke view
}

    public function store(Request $request)
    {
        $validation = $request->validate([
            'task' => 'required|min:5|max:255',
        ]);

        Task::create([
            'task' => $validation['task'],
            'tanggal' => now()
        ]);
        

        return redirect('/');
    }


public function show(Request $request){
    $task = task ::find($request->id);

    return view('edit',['task' => $task
    ]);
}

public function update(Request $request, $id)
{
    $validated = $request->validate([
        'task' => 'required|min:5|max:255',
    ]);

    Task::where('id', $id)->update([
        'task' => $validated['task'],
        'tanggal' => now()
    ]);

    return redirect('/');
}


// <--- Pisahkan dan letakkan DI SINI, di luar method update
public function destroy($id)
{
    Task::destroy($id);
    return redirect('/');
}


}
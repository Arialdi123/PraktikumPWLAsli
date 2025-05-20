@extends('layouts.layout')

@section('nday')
<div class="container mt-4">
    <!-- Search Bar -->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Type here" aria-label="Task input">
                <a href="{{route('todolist.create')}}"><button class="btn btn-success" type="button">Add</button></a>
            </div>
        </div>
    </div>
    
    <!-- Task List -->
    @foreach($tasks as $task)
    <div class="mt-4">
        <div class="container">
            <div class="row">
                <!-- Task -->
                <div class="alert alert-light d-flex justify-content-between align-items-center w-100">
                    <div>
                        <h5 class="mb-1">{{ $task->task }}</h5>
                        <p class="mb-1">{{ $task->tanggal }}</p>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-secondary" title="Detail">View</button>
                        <a class="btn btn-sm btn-warning" href="{{ route('todolist.edit', $task->id) }}" title="Edit">Edit</a>
                        <form action="{{ route('todolist.destroy', $task->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-success" title="Done">Done</button>
</form>
                        <!-- Form Delete -->
                       
                    </div>
                </div>  
            </div>
        </div>
    </div>
    @endforeach
@endsection

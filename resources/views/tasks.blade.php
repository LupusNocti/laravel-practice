    <!--Boostrap-->
<link rel="stylesheet" href="{{ asset('css/styles.css') }}" >
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-success" id="opener">Add Task</button>
            </div>
        </div>
</div>

<div class="container">
    <!-- Bootstrap Boilerplate... -->
    <div class="panel-body">

    <!-- Display Validation Errors -->
        @include('common.errors')

    <!-- HTML --> 
    <div id = "dialog-1" >
         <form action="{{ url('task') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

    <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label" style="width: 1000px;">Task Name:</label>
 
                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control" style="width: 250px;">
                </div>
            </div>
            <br>

            <form action="{{ url('task') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

    <!-- To Do -->
            <div class="form-group">
                <label for="todo" class="col-sm-3 control-label" style="width: 1000px;">To Do:</label>
 
                <div class="col-sm-6">
                    <input type="text" name="name" id="todo" class="form-control" style="width: 250px;">
                </div>
            </div>
            <br>

    <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i> Submit
                    </button>
                </div>
            </div>
        </form>
        </div>
    </div>

    <!-- Current Tasks -->
    @if (count($tasks) > 0)
        <div class="panel panel-default">
            <div class="panel-heading" style="color: white; text-align: center;">
                Current Tasks
            </div>
                <br>
            <div class="panel-body">
                <table class="table table-striped table-hover table-light">
 
                    <!-- Table Headings -->
                    <thead class="table-dark">
                        <th class="col-9" style="text-align: center;">Task</th>
                        <th style="text-align: center;">Action</th>
                    </thead>
 
                    <!-- Table Body -->
                    <tbody class="tbody">
                        @foreach ($tasks as $task)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $task->name }}</div>
                                </td>
                                <!-- Delete Button -->
                                <td class="delete-button" style="text-align: center;">
                                    <form action="{{ url('task/'.$task->id) }}" method="POST" id="delete-task-{{ $task->id }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-outline-danger delete-task" data-task-id="{{ $task->id }}">
                                        <i class="fa fa-trash"></i> Delete
                                        </button>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="fa fa-eye"></i> View
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Todo List</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <p>Your to do.</p>
                                        </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
            </div>
        </div>
    @endif
@endsection
       

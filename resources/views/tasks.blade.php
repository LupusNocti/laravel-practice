<head>
    <!--Boostrap-->
<link rel="stylesheet" href="{{ asset('css/styles.css') }}" >
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <!-- CSS -->
      <style>
         .ui-widget-header,.ui-state-default, ui-button {
            background:#b9cd6d;
            border: 1px solid #b9cd6d;
            color: #FFFFFF;
            font-weight: bold;
         }
      </style>
      
          <!-- Javascript -->
          <script>
         $(function() {
            $( "#dialog-1" ).dialog({
               autoOpen: false,  
            });
            $( "#opener" ).click(function() {
               $( "#dialog-1" ).dialog( "open" );
            });
         });
      </script>
</head>
<body>
@extends('layouts.app')

@section('content')

<div class="container">
 
    <!-- Bootstrap Boilerplate... -->
 
    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')
    
    <!-- Current Tasks -->
    @if (count($tasks) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Tasks
            </div>
 
            <div class="panel-body">
                <table class="table table-striped task-table">
 
                    <!-- Table Headings -->
                    <thead>
                        <th>Task</th>
                        <th>&nbsp;</th>
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
                                <td class="delete-button">
                                    <form action="{{ url('task/'.$task->id) }}" method="POST" id="delete-task-{{ $task->id }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-outline-danger delete-task" data-task-id="{{ $task->id }}">
                                        <i class="fa fa-trash"></i> Remove Task
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    <script src="{{ asset('js/delete-task.js') }}"></script>

@endsection
</body>

<!doctype html>
<html lang = "en">
   <head>
      <meta charset = "utf-8">
      <title>jQuery UI Dialog functionality</title>
      <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      
      <!-- CSS -->
      <style>
         .ui-widget-header,.ui-state-default, ui-button {
            background:#b9cd6d;
            border: 1px solid #b9cd6d;
            color: #FFFFFF;
            font-weight: bold;
         }
      </style>
      
      <!-- Javascript -->
      <script>
         $(function() {
            $( "#dialog-1" ).dialog({
               autoOpen: false,  
            });
            $( "#opener" ).click(function() {
               $( "#dialog-1" ).dialog( "open" );
            });
         });
      </script>
   </head>
   
   <body>
      <!-- HTML --> 
      <div id = "dialog-1" >
         <form action="{{ url('task') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Task Name:</label>
 
                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
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
      <button id = "opener">Add A Task</button>
   </body>
</html>

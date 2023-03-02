
<head>
    <title>Tasks</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">

</head>
 @extends('layouts.app')
 
@section('content')
 
    <!-- Bootstrap Boilerplate... -->
<section>
    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')
 
        <!-- New Task Form -->
        <div class="t_container">
            <br>
        <form action="{{ url('task') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
 
            <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="header-1">Enter your Name</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>
            <!-- Add Task Button -->
            <br>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-t">
                        <i class="fa fa-plus" ></i> Add Task
                    </button>
                </div>
            </div>
        </form>
    </div>

    @if (count($tasks) > 0)
        <div class="panel panel-default">
            <br>
            <div class="header-2">
                Current Tasks
            </div>
 
            <div class="panel-body">
                <table class="table table-striped task-table">
 
                    <!-- Table Headings -->
                    <thead>
                        <th>Task</th>
                        <th> Date and Time Created</th>
                        <th>Action</th>
                    </thead>
 
                    <!-- Table Body -->
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                    <!-- TODO: Delete Button -->
                                    <tr>
                                        <!-- Task Name -->
                                        <td class="table-text">
                                            <div>{{ $task->name }}</div>
                                        </td>

                                        <td class="table-text">
                                        <div class="small text-muted">{{ $task->created_at->format('Y-m-d H:i:s') }}</div>
                                        </td>

                                        <!-- Delete Button -->
                                        <td>
                                            <form action="{{ url('task/'.$task->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-d">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    <script src="{{ asset('js/script.js') }}"></script>
    
@endsection
@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>tasks</h1>

        <div class="lead ">
            Manage your tasks here.
        </div>

        <br />
        <div class="container">
            <a href="{{ route('tasks.create') }}" class="btn btn-primary btn-sm float-right">Add new task</a>

            <a href="{{ route('statistics') }}" class="btn btn-info btn-sm float-left">Statistics</a>
        </div>

        <br />
        <br />
        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col" width="1%">#</th>
                <th scope="col" width="15%">title</th>
                <th scope="col" width="15%">description</th>
                <th scope="col" width="10%">Admin Name</th>
                <th scope="col" width="10%">Assigned User</th>

            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                <tr>
                    <th scope="row">{{ $task->id }}</th>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ @$task->admin->name }}</td>
                    <td>{{ @$task->user->name }}</td>

                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="d-flex">
            {!! $tasks->links() !!}
        </div>

    </div>
@endsection

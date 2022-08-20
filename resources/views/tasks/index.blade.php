@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>tasks</h1>
        <div class="lead">
            Manage your tasks here.
            <a href="{{ route('tasks.create') }}" class="btn btn-primary btn-sm float-right">Add new task</a>
        </div>

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
                <th scope="col" width="1%" colspan="3"></th>
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
                    <td>
                        {!! Form::open(['method' => 'DELETE','route' => ['tasks.destroy', $task->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="d-flex">
            {!! $tasks->links() !!}
        </div>

    </div>
@endsection

 @extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Statistics</h1>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col" width="1%">#</th>
                <th scope="col" width="15%">User</th>
                <th scope="col" width="15%">Task Count</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->tasks_count }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

    <a href="{{ route('tasks.index') }}" class="btn btn-default">Back</a>
@endsection

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
            @foreach($statistics as $record)
                <tr>
                    <th scope="row">{{ $record->id }}</th>
                    <td>{{ $record->user_name }}</td>
                    <td>{{ $record->tasks_count }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

    <a href="{{ route('tasks.index') }}" class="btn btn-default">Back</a>
@endsection

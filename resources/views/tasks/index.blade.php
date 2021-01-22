@extends('layouts.app')

@section('content')
@auth
    <div class="container main">
        <div class="add_task">
            <h1>タスクを追加</h1>
            <form action="{{ url('/tasks')}}" method="post">
                {{ csrf_field() }}
                <input type="text" name="body">
                <input type="submit" value="追加">
            </form><br>
        </div>

        <div class="all_task">
            <h1>すべてのタスク</h1>
            <ul>
                @forelse ($allTask as $task)
                <li>
                    <p>
                        {{ $task->body }}
                        <a href="{{ action('TaskController@edit', $task) }}">[編集]</a>
                    </p>
                </li>
                @empty
                <li>
                    <p>No task yet</p>
                </li>
                @endforelse
            </ul>
        </div>
    </div>
@else
    <div class="container main">
        ログインしてください
    </div>
@endauth
@endsection

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
            </form>
            @if ($errors->has('body'))
                <span class="error">
                    {{ $errors->first('body') }}
                </span>

            @endif
            <br>
        </div>

        <div class="all_task">
            <h1>すべてのタスク</h1>
            <ul>
                @forelse ($allTask as $task)
                <li>
                    <p>
                        <form action="{{ url('/tasks', $task->id)}}" method="post">
                            {{ $task->body }}
                            <button type="button" class="btn btn-primary btn-sm" onclick="location.href='{{ action('TaskController@edit', $task) }}'">編集</button>
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button type="submit" class="btn btn-primary btn-sm" value="{{ $task->id }}">削除</button>
                        </form>
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

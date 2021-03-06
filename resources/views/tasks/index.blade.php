@extends('layouts.app')

@section('content')
@auth
    <div class="container main">
        <div class="add_task">
            <h1>タスクを追加</h1>
            <form action="{{ url('/tasks')}}" method="post">
                {{ csrf_field() }}
                <input type="text" name="body">
                <button type="submit" class="btn btn-primary btn-sm">追加</button>
            </form>
            @if ($errors->has('body'))
                <span class="error">
                    {{ $errors->first('body') }}
                </span>

            @endif
            <br>
        </div>

        <div class="all_task">
            <h1>
                <form action="{{ url('/tasks/search') }}" method="post">
                    @csrf
                    すべてのタスク
                    <input class="search" type="text" name="search">
                    <button type="submit" class="btn btn-primary btn-sm">検索</button>
                </form>
            </h1>
            <ul>
                @forelse ($allTask as $task)
                <li>
                    <p>
                        <form action="{{ url('/tasks', $task->id)}}" method="post">
                            {{ $task->body }}
                            <button type="button" class="btn btn-primary btn-sm" onclick="location.href='{{ action('TaskController@show', $task) }}'">詳細</button>
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button type="submit" class="btn btn-primary btn-sm" value="{{ $task->id }}">削除</button>
                        </form>
                    </p>
                </li>
                @empty
                <li>
                    <p>まだタスクはありません</p>
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

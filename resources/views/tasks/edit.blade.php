@extends('layouts.app')

@section('content')
@auth
    <div class="container main">
       <h1>タスク編集</h1>
       <form action="{{ action('TaskController@update', $task->id) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('patch')}}
            <input type="text" name="body" placehplder="タスク" value="{{ old('body', $task->body) }}">
            <input type="submit" value="変更"><br>
            
       </form>
    </div>
@else
    <div class="container main">
        ログインしてください
    </div>
@endauth
@endsection

@extends('layouts.app')

@section('content')
<div class="container main">
    <h1>タスク</h1>
    <form action="{{ action('TaskController@update', $task)}}" method="post">
        {{ csrf_field() }}
        {{ method_field('patch')}}
        <input type="text" name="body" placeholder="タスクを入力してください" value="{{ old('body', $task->body) }}"><br>
        @if ($errors->has('body'))
            <span class="error">
            {{ $errors->first('body')}}
            </span>
        @endif
        <br><br>
        <h1>メモ</h1>
        <textarea name="memo" id="" cols="30" rows="10">{{old('memo', $task->memo)}}</textarea><br>
        <button type="submit" class="btn btn-primary btn-sm">編集</button>
    </form><br>
    <h1>コメント</h1>
    <ul>
        @forelse ($task->comments as $comment)
        <li>
            <form action="{{ action('CommentController@destroy', [$task,$comment])}}" method="post">
                {{ $comment->body }}
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <input type="hidden">
                <button type="submit" class="btn btn-primary btn-sm">削除</button>
            </form>
        </li>
        @empty
        <li>まだコメントはありません</li>
        @endforelse
    </ul>
    <form action="{{ action('CommentController@store', $task)}}" method="post">
        {{ csrf_field() }}
        <input type="text" name="comment" placeholder="コメント">
        <button type="submit" class="btn btn-primary btn-sm">コメント</button>
        @if ($errors->has('comment'))
        <br>
            <span class="error">
            {{ $errors->first('comment')}}
            </span>
        @endif
    </form>
</div>

@endsection

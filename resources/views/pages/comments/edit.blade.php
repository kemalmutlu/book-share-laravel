@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <h5 class="card-title font-weight-bold">{{ $comment->book->title }}</h5>
                <p class="card-text">Comment Title: <strong>{{ $comment->title }}</strong> </p>
                <p class="card-text">Comment Content: <strong>{{ $comment->content }}</strong> </p>
                <p class="card-text">User: <strong>{{ $comment->user->name }}</strong> </p>

                <div class="d-flex">
                    @if($comment->book->user->id == Auth::user()->id)
                    {{ Form::open(array('route' => ['comments.update', $comment->id], 'method' => 'put')) }}
                        {{ Form::token() }}
                        <button tpye="submit" class="btn btn-primary">Approve</button>
                    {{ Form::close() }}
                    @endif
                    {{ Form::open(array('route' => ['comments.destroy', $comment->id], 'method' => 'delete', 'class' => 'ml-1')) }}
                        {{ Form::token() }}
                        <button tpye="submit" class="btn btn-danger">Delete</button>
                    {{ Form::close() }}
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

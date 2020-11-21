@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row jumbotron">
            <div class="col-12">
                {{ Form::open(array('route' => ['books.update', $book->id], 'method' => 'put')) }}
                    {{ Form::token() }}
                    <div class="form-group">
                        {{ Form::label('title', 'Book Title') }}
                        {{ Form::text('title', $book->title, array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('author', 'Author') }}
                        {{ Form::text('author', $book->author, array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group form-check">
                        {{ Form::hidden('status', 0) }}
                        {{ Form::checkbox('status', 1, $book->status, array('class' => 'form-check-input')) }}
                        {{ Form::label('status', 'Status', array('class' => 'form-check-label')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('page_count', 'Page Count') }}
                        {{ Form::number('page_count', $book->page_count, array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection

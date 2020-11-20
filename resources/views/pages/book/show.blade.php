@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card text-center mb-3">
                    <div class="card-header">
                      <strong><h3 class="d-inline">{{ $book->title }}</h3></strong>
                      <a href="/users/6">
                        <span class="badge badge-pill badge-success float-right">
                          {{ $book->user->name}}
                        </span>
                      </a>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">Author: {{ $book->author }}</h5>
                      <p class="card-text h5">Page Count: {{ $book->page_count }}</p>
                    @if(Auth::user()->id == $book->user->id)
                        <a class="btn btn-info" href="{{ route('books.edit', $book->id) }}">Edit</a>
                    @endif
                    </div>
                    <div class="card-footer text-muted">
                      Created At {{ $book->created_at}}
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Comments -->
    @include('pages.comments.list')
    @include('pages.comments.form')
@endsection

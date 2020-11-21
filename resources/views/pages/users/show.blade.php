@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">{{ $user->name }}'s Profile</h5>
                      <p class="card-text">This user have {{ $user->books->count() }} books.</p>
                      <p class="card-text">Mail: {{ $user->email }} books.</p>
                    </div>
                  </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <h2>User's Books</h2>
            </div>
            @if($books->count() > 0)
                @foreach($books as $book)
                    <div class="col-6 col-sm-6 col-md-3 mb-3 mt-3">
                        <div class="card" style="width: 100%;">
                            <div class="card-header">
                                {{ $book->title }}
                            </div>
                            <div class="card-body">
                            <footer class="blockquote-footer">Written by <cite title="Source Title">{{ $book->author }}</cite></footer>
                            <footer class="blockquote-footer">
                                {{ $book->created_at }}
                            </footer>
                                <a class="btn btn-primary btn-sm float-right mt-1" href="{{ route('books.show', $book->id) }}">Show</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12">
                    <div class="alert alert-primary" role="alert">
                        There is no book.
                    </div>
                </div>
            @endif

        </div>
    </div>

@endsection

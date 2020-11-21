<div class="container">
    <div class="row">
        @foreach($books as $book)
            <div class="col-6 col-sm-6 col-md-3 mb-3">
                <div class="card" style="width: 100%;">
                    <div class="card-header">
                    <a class="badge badge-pill badge-success" href="{{ route('users.show', $book->user->id) }}">{{ $book->user->name }}</a>
                    <span class="badge badge-pill badge-info text-white">Page Count: {{ $book->page_count }}</span>
                    </div>
                    <div class="card-body">
                    <h5 class="card-title">{{ $book->title }}</h5>
                    <footer class="blockquote-footer">Written by <cite title="Source Title">{{ $book->author }}</cite></footer>
                    <footer class="blockquote-footer">
                        Created At {{ Helper::verboseDate($book->created_at) }}
                    </footer>
                        <a class="btn btn-primary btn-sm float-right mt-1" href="{{ route('books.show', $book->id) }}">Show</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

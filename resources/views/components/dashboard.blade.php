<div class="container mt-3 p-2">
    <div class="row">
        @foreach($books as $book)
            <div class="col-6 col-sm-6 col-md-4 mb-3">
                <div class="card" style="width: 100%;">
                    <div class="card-header h5 d-flex justify-content-between">
                        {{ $book->title }}
                        <span class="badge badge-success h6">{{ $book->status == 1 ? 'Visible' : 'Invisible' }}</span>
                    </div>
                    <div class="card-body">

                    <footer class="blockquote-footer">Written by <cite title="Source Title">{{ $book->author }}</cite></footer>
                        {{ Form::open(array('route' => ['books.destroy', $book->id], 'method' => 'DELETE')) }}
                        {{ Form::token() }}
                            <button type="submit" class="btn btn-danger btn-sm float-right mt-1 ml-1" onclick="return confirm('Are you sure?')">Delete</button>
                            <a class="btn btn-primary btn-sm float-right mt-1" href="{{ route('books.edit', $book->id) }}">Edit</a>
                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12 border">
            {{ Form::open(array('route' => ['comments.store', $book->id], 'method' => 'post')) }}
                {{ Form::token() }}
                <div class="form-group">
                    {{ Form::label('title', 'Title') }}
                    {{ Form::text('title', null, array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('content', 'Comment') }}
                    {{ Form::textarea('content', null, ['class' => 'form-control', 'rows' => '4', 'cols' => '54']) }}
                </div>

                <div class="form-group">
                    {{ Form::submit('Send', array('class' => 'btn btn-primary')) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

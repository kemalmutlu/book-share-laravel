@if($user == 'current_user')
    <ul class="list-group">
        @if($commentsOfAuthUser->count() > 0)
            @foreach($commentsOfAuthUser as $comment)
                <li class="list-group-item">
                    <div class="d-flex justify-content-between">
                        <div>
                            You wrote a comment {{ $comment->book->title }} book.
                            <a href="{{ route('comments.edit', $comment->id) }}"> Click to manage</a>
                        </div>
                        <div>
                            <span class="badge badge-{{ $comment->status == 1 ? 'success' : 'info' }} text-white">
                                {{ $comment->status == 1 ? 'Approved' : 'waiting' }}
                            </span>
                        </div>
                    </div>
                </li>
            @endforeach
        @else
        <li class="list-group-item">
            There is no comment.
        </li>
        @endif
    </ul>
@else
    <ul class="list-group">
        @if($comments->count() > 0)
            @foreach($comments as $comment)
                <li class="list-group-item">
                    <div class="d-flex justify-content-between">
                        <div>
                            {{$comment->user->name }} wrote a comment your {{ $comment->book->title }} book.
                            <a href="{{ route('comments.edit', $comment->id) }}"> Click to manage</a>
                        </div>
                        <div>
                            <span class="badge badge-{{ $comment->status == 1 ? 'success' : 'info' }} text-white">
                                {{ $comment->status == 1 ? 'Approved' : 'waiting' }}
                            </span>
                        </div>
                    </div>
                </li>
            @endforeach
        @else
        <li class="list-group-item">
            There is no comment.
        </li>
        @endif
    </ul>
@endif



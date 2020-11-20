<div class="container">
    <div class="row">
        <div class="col-12">
             @foreach($comments as $comment)
            <div class="card mb-3">
                <div class="card-header">
                   Username:<strong>{{ $comment->user->name}}</strong>
                    <span class="badge badge-pill badge-info float-right">
                      Approved comment
                    </span>
                </div>
                <div class="card-body">
                  <h5 class="card-title">{{ $comment->title }}</h5>
                  <p class="card-text">
                   {{ $comment->content }}
                  </p>
                </div>
              </div>
            @endforeach
        </div>
    </div>
</div>

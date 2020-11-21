@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($users as $user)
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $user->name }}</h5>
                            <p class="card-text">{{ $user->email }}</p>
                            <footer class="blockquote-footer">Registered at
                                <cite title="Source Title">{{ $user->created_at }}</cite>
                            </footer>
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary mt-3">Go Profile</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

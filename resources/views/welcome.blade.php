@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="jumbotron">
                    @if (Auth::check())
                        <h1 class="display-4">Hello, {{ Auth::user()->name }}!</h1>
                        <p class="lead">This is a book share platform.</p>
                        <hr class="my-4">
                        <p>If you want to book share or rent a book, you must registered or signin.</p>
                    @else
                        <h1 class="display-4">Hello, guest!</h1>
                        <p class="lead">This is a book share platform.</p>
                        <hr class="my-4">
                        <p>If you want to book share or rent a book, you must registered or signin.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if (Auth::check())
        <x-book />
    @endif
@endsection

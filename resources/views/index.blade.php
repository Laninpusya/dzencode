@extends('layout')

@section('title', 'гамно')

@section('content')

    <div class="container">
        <div class="container mt-5 w-75">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Head Message</h5>
                </div>
                @foreach($mainMessage as $main)
                <a href="{{ route('single', ['id' => $main->id]) }}" class="card-body">
                    <p>User Name: {{ $main->user_name }}</p>
                    <p>Email: {{ $main->email }}</p>
                    <p>URL: {{ $main->url }}</p>
                    <p>Text: {{ $main->text }}</p>
                    <p>Date Added: {{ $main->created_at }}</p>
                </a>
                @endforeach
            </div>

        </div>

    </div>

@endsection

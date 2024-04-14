@extends('layout')

@section('title', 'гамно')

@section('content')

    <div class="container">
        <div class="container mt-5">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Head Message</h5>
                </div>
                <div class="card-body">
                    <p>User Name: {{ $headMessage->user_name }}</p>
                    <p>Email: {{ $headMessage->email }}</p>
                    <p>URL: {{ $headMessage->url }}</p>
                    <p>Text: {{ $headMessage->text }}</p>
                    <p>Date Added: {{ $headMessage->date_add }}</p>
                    <p>Status: {{ $headMessage->status == 1 ? 'Main Message' : 'Reply' }}</p>
                </div>
            </div>
        </div>
        <h1>Форма добавления записи</h1>
            <form action="submit" method="POST">
                @csrf
                <div style="position: absolute; top: 10px; right: 10px;">
                <div class="form-group">
                    <label for="username">User Name:</label>
                    <input type="text" class="form-control" id="username" name="username" required pattern="[a-zA-Z0-9]+" title="Только цифры и буквы латинского алфавита">
                </div>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="homepage">Home page:</label>
                    <input type="url" class="form-control" id="homepage" name="homepage">
                </div>
                </div>
                <div>
                    <div class="form-group">
                        <label for="text">Text:</label>
                        <textarea class="form-control" id="text" name="text" rows="4" required></textarea>
                    </div>
                    {!! NoCaptcha::renderJs() !!}
                    {!! NoCaptcha::display() !!}
                </div>
                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
    </div>

@endsection

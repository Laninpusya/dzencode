@extends('layout')

@section('title', 'гамно')

@section('content')

    <div class="container">
        <h1>Форма добавления записи</h1>
        <form action="submit" method="POST">
            @csrf

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
            <div class="form-group">
                <label for="text">Text:</label>
                <textarea class="form-control" id="text" name="text" rows="4" required></textarea>
            </div>
            {!! NoCaptcha::renderJs() !!}
            {!! NoCaptcha::display() !!}
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>

@endsection

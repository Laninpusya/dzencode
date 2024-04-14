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
                <div class="card-body">
                    <p>User Name: {{ $main->user_name }}</p>
                    <p>Email: {{ $main->email }}</p>
                    <p>URL: {{ $main->url }}</p>
                    <p>Text: {{ $main->text }}</p>
                    <p>Date Added: {{ $main->created_at }}</p>
                </div>
                @if(!empty($responses))
                    @foreach($responses as $item)
                        <div style="margin-left: 20px;" class="card">
                            <div class="card-body" style="margin-left: 20px;">
                                <p>User Name: {{ $item->user_name }}</p>
                                <p>Email: {{ $item->email }}</p>
                                <p>URL: {{ $item->url }}</p>
                                <p>Text: {{ $item->text }}</p>
                                <p>Date Added: {{ $item->created_at }}</p>
                                @if(!empty($item->level))
                                    @php
                                        $responseUser = $responses->firstWhere('id', $item->level);
                                    @endphp
                                        <p>Ответ для: {{ $responseUser->user_name }}</p>
                                @else
                                    <p>Ответ для: {{ $item->name }}</p>
                                @endif



                            </div>
                        </div>
                    @endforeach
                    @endif
                @endforeach
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

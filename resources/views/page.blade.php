@extends('layout')

@section('title', 'massage')

@section('content')

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="container mt-5 w-75">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Head Message</h5>
                </div>
                <form action="{{route('submit_massage')}}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <p>User Name: {{ $mainMessage->user_name }}</p>
                            <p>Email: {{ $mainMessage->email }}</p>
                            <p>URL: {{ $mainMessage->url }}</p>
                            <p>Text: {{ $mainMessage->text }}</p>
                            <p>Date Added: {{ $mainMessage->created_at }}</p>
                            <input type="radio" id="radio_" name="parent_message_id" value="NULL">
                            <label for="radio_">Ответить {{ $mainMessage->user_name }}</label>
                        </div>
                    </div>
                        @if(!empty($responses))
                            @foreach($responses->where('parent_message_id', $mainMessage->id) as $item)
                            <div style="margin-left: 20px;" class="card" id="item_{{ $item->id }}">
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
                                        @if(!empty($responseUser))
                                            <p>Ответ для: {{ $responseUser->user_name }}</p>
                                        @endif
                                    @else
                                        <p>Ответ для: {{ $item->name }}</p>
                                    @endif
                                    <input type="radio" id="radio_{{ $item->id }}" name="level" value="{{ $item->id }}">
                                    <label for="radio_{{ $item->id }}">Ответить {{ $item->user_name }}</label>
                                </div>
                            </div>
                @endforeach
                @endif
            </div>
        </div>

        <h1>Форма добавления записи</h1>


        <div style="position: absolute; top: 10px; right: 10px;">
            <div class="form-group">
                <label for="username">User Name:</label>
                <input type="text" class="form-control" id="username" name="username" required pattern="[a-zA-Z0-9]+" title="Только цифры и буквы латинского алфавита">
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="text" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="homepage">Home page:</label>
                <input type="text" class="form-control" id="homepage" name="url">
            </div>
        </div>
        <div>
            <div class="form-group">
                <label for="text">Text:</label>
                <textarea class="form-control" id="text" name="text" rows="4" required></textarea>
            </div>
            <input type="hidden" name="parent_message_id" value="{{ $mainMessage->id }}">

            {!! NoCaptcha::renderJs() !!}
            {!! NoCaptcha::display() !!}
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>

@endsection

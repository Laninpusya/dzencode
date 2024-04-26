@php use App\Models\Response; @endphp
@extends('layout')

@section('title', 'massage')

@section('content')

    <div class="container mt-1">
        @if(session('success'))
            <div style="z-index: 99999" class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{route('save')}}" method="POST">
            @csrf
            <div class="container mt-5 w-75">
                <div class="mb-3">
                    <a href="{{ route('index') }}" class="btn btn-primary">На главную</a>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Head Message</h5>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <p>User Name: {{ $mainMessage->user_name }}</p>
                            <p>Email: {{ $mainMessage->email }}</p>
                            <p>URL: {{ $mainMessage->url }}</p>
                            <p>Text: {!! $mainMessage->text !!}</p>
                            <p>Date Added: {{ $mainMessage->created_at }}</p>
                            <input type="radio" id="radio_" name="level" value="">
                            <label for="radio_">Ответить {{ $mainMessage->user_name }}</label>
                        </div>
                    </div>
                    @if(!empty($responses))
                        @foreach($responses as $item)
                            <div style="margin-left: 20px;" class="card mt-2" id="item_{{ $item->id }}">
                                <div class="card-body" style="margin-left: 20px;">
                                    <p>User Name: {{ $item->user_name }}</p>
                                    <p>Email: {{ $item->email }}</p>
                                    @if(!empty($item->url))
                                    <p>URL: {{ $item->url }}</p>
                                    @endif
                                    <p>Text: {!! $item->text !!}</p>
                                    <p>Date Added: {{ $item->created_at }}</p>
                                    @if(!empty($item->level))
                                        @php
                                            $responseUser = $responses->firstWhere('id', $item->level);
//                                            dump($responses->firstWhere('id', $item->level))
                                        @endphp
                                        @if(!empty($responseUser))
                                            <p style="background-color: #84d8da">Ответ для: {{ $responseUser->user_name }}</p>
                                        @endif
                                    @else
                                        <p style="background-color: #84d8da">Ответ для: {{ $mainMessage->user_name }}</p>
                                    @endif
                                    <input type="radio" id="radio_{{ $item->id }}" name="level" value="{{ $item->id }}">
                                    <label for="radio_{{ $item->id }}">Ответить {{ $item->user_name }}</label>
                                </div>
                            </div>
                        @endforeach
                            {{$responses->links()}}

                    @endif

                </div>
            </div>
            @if(auth()->check())
                @php
                    $user = auth()->user();
                @endphp
            <h1>Форма добавления записи</h1>


            <div style="position: absolute; top: 100px; right: 10px;">
                <div class="form-group">
                    <label for="username">User Name:</label>
                    <input type="text" class="form-control" id="user_name" name="user_name"
                           pattern="[a-zA-Z0-9]+"
                           title="Только цифры и буквы латинского алфавита" value="{{ $user->name }}" readonly>
                    @error('user_name')
                    <p class="text-danger">Заполните поле</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}" readonly>
                    @error('email')
                    <p class="text-danger">Заполните поле</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="homepage">Home page:</label>
                    <input type="text" class="form-control" id="homepage" name="url">

                </div>
            </div>
            <div>
                <div class="form-group">
                    <label for="text">Text:</label>
                    <textarea class="form-control" name="text" id="text" rows="4" placeholder="Введіть text">{{ old('text') }}</textarea>
                    @error('text')
                    <p class="text-danger">Заполните поле</p>
                    @enderror
                </div>
                <input type="hidden" name="parent_message_id" value="{{ $mainMessage->id }}">

                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}
                @if ($errors->has('g-recaptcha-response'))
                    <div class="alert alert-danger">
                        {{ $errors->first('g-recaptcha-response') }}
                    </div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
            @else
                <p class="container mt-1 w-75" style="font-size: x-large">Пожалуйста, <a href="{{ route('login') }}">войдите</a> или <a href="{{ route('register') }}">зарегистрируйтесь</a>, чтобы отправлять сообщения.</p>
            @endif
        </form>

    </div>

@endsection

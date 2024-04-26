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
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if(auth()->check())
                        @php
                            $user = auth()->user();
                        @endphp
                    <form action="{{route('main-massage-save')}}" method="POST">
                        @csrf
                        <div class="container mt-1">
                            <div class="mb-3">
                                <a href="{{ route('index') }}" class="btn btn-primary">На главную</a>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Создать тему для обсуждения</h5>
                                </div>

                                <div class="card">
                                    <div class="card-body">
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
                                        <div>
                                            <div class="form-group">
                                                <label for="text">Text:</label>
                                                <textarea class="form-control" name="text" id="text" rows="4" placeholder="Введіть text">{{ old('text') }}</textarea>
                                                @error('text')
                                                <p class="text-danger">Заполните поле</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Отправить</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                    @else
                        <p class="container mt-1 w-75" style="font-size: x-large">Пожалуйста, <a href="{{ route('login') }}">войдите</a> или <a href="{{ route('register') }}">зарегистрируйтесь</a>, чтобы создать тему для обсуждения.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

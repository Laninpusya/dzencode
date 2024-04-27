@extends('layout')

@section('title', 'main')

@section('content')

    <div class="container">
        @if(session('success'))
            <div style="z-index: 99999" class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="container mt-5">
            <div class="card">
                <div class="card-header" style="display: flex; justify-content: space-between; align-items: flex-end">
                    <h5 class="card-title">Head Message</h5>
                    <a href="{{ route('main-massage') }}" class="btn btn-primary">Создать обсуждение</a>

                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>
                                    User Name<br>
                                    <a href="{{ route('sort', ['field' => 'user_name', 'order' => 'asc']) }}">
                                        По возрастанию
                                    </a><br>
                                    <a href="{{ route('sort', ['field' => 'user_name', 'order' => 'desc']) }}">
                                        По убыванию
                                    </a>
                                </th>
                                <th>
                                    Email<br>
                                    <a href="{{ route('sort', ['field' => 'email', 'order' => 'asc']) }}">
                                        По возрастанию
                                    </a><br>
                                    <a href="{{ route('sort', ['field' => 'email', 'order' => 'desc']) }}">
                                        По убыванию
                                    </a>
                                </th>
                                <th>URL</th>
                                <th style="width: 30%">Text</th>
                                <th>
                                    Date Added <br>
                                    <a href="{{ route('sort', ['field' => 'created_at', 'order' => 'asc']) }}">
                                      По возрастанию
                                    </a><br>
                                    <a href="{{ route('sort', ['field' => 'created_at', 'order' => 'desc']) }}">
                                        По убыванию
                                    </a>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mainMessage as $main)
                                <tr>
                                    <td><a href="{{ route('single', ['id' => $main->id]) }}">{{ $main->user_name }}</a></td>
                                    <td>{{ $main->email }}</td>
                                    <td>{{ $main->url }}</td>
                                    <td class="main-text" style="width: 30%; position: absolute; overflow: hidden; max-height: 10%" data-message-id="{{ $main->id }}">{!! $main->text !!}</td>
                                    <td>{{ $main->created_at }}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <div id="fullMessageContainer" style="display: none; position: sticky"></div>

                        {{$mainMessage->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

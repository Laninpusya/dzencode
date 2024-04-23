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
                                    <td style="width: 30%; position: absolute; overflow: hidden; height: 10%">{!! $main->text !!}</td>
                                    <td>{{ $main->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$mainMessage->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

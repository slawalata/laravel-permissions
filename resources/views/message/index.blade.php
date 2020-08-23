@extends('app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Message

                        @role('writer')
                        <a href="{{route('message.create')}}" class="float-right">New</a>
                        @endrole

                    </div>

                    <div class="card-body">

                        <div></div>
                        <div>
                            @foreach ($messages as $message)
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        {{$message->content}}

                                        @can('message.update', $message)
                                            <a href="{{route('message.edit', $message)}}" class="float-right">Edit</a>
                                        @endcan

                                    </li>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

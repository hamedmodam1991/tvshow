@extends('layouts.app')

@section('content')

    <div class="container">

        <a href="{{url("/tv/create")}}">
            <div style="margin-bottom:2%;padding: 2%">
                <button type="submit" id="edit" class="btn btn-primary btn-lg " style="padding: 2%">
                    + create new quote
                </button>
            </div>
        </a>


        <div class="row">
            @foreach ($tvshows as $tvshow)
                @php
                    $min=1;
                    $max=100;
                    $rand=rand($min,$max);
                @endphp
                <div class="col-md">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="https://picsum.photos/id/{{$rand}}/200/200" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">TV Show</h5>
                            <p class="card-text">{{ $tvshow->quote }}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Name: {{ $tvshow->name }}</li>
                            <li class="list-group-item">Season {{ $tvshow->season }}</li>
                            <li class="list-group-item">Episode {{ $tvshow->episode }}</li>
                        </ul>
                    </div>
                    <div id="{{ $tvshow->id }}">
                        <form method="GET" action="{{url("/tv/{$tvshow->id}/edit")}}">
                            @csrf
                            <button type="submit" id="edit" class="btn btn-primary">
                                Edit
                            </button>
                        </form>
                        <button type="button" id="delete" onclick="tvshow(event)" class="btn btn-danger" data-toggle="button" aria-pressed="false" autocomplete="off">
                            Delete
                        </button>
                    </div>

                </div>
            @endforeach
        </div>
    </div>

@endsection

@push('scripts')
    <script  type="text/javascript" src="{{ URL::asset('js/tvshow.js') }}" ></script>
@endpush

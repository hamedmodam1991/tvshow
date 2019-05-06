@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<div class="row">
    <div class="col-md-4 offset-md-4">
        <form method="post" action="../{{$tvshow->id}}">
            @csrf
        {{ method_field('PUT') }}
        <div class="form-group">
                <label for="form-control">Name OF TVshow</label>
                <input class="form-control" name="name" type="text" placeholder="Name OF TV Show" value={{$tvshow->name}}>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Season</label>
                <input class="form-control" name="season" type="text" placeholder="Season" value={{$tvshow->season}}>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Episode</label>
                <input class="form-control" name="episode" type="text" placeholder="Episode" value={{$tvshow->episode}}>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Quote</label>
                <textarea class="form-control" name="quote" rows="4" >{{$tvshow->quote}}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</div>
@endsection

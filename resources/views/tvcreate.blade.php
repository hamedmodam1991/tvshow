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
            <form method="POST" action="../tv">
                @csrf

                <div class="form-group">
                    <label for="form-control">Name OF TVshow</label>
                    <input class="form-control" name="name" type="text" placeholder="Name OF TV Show">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Season</label>
                    <input class="form-control" name="season" type="text" placeholder="Season">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Episode</label>
                    <input class="form-control" name="episode" type="text" placeholder="Episode">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Quote</label>
                    <textarea class="form-control" name="quote" rows="4"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
@endsection

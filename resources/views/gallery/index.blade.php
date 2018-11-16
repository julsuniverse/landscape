@extends('layout.layout')

@section('content')
    <h1>Your Places Gallery</h1>
    <div class="row">
        @foreach($places as $place)
        <div class="col-md-3">
            <div class="border border-secondary">
                <div>
                    <img src="{{ asset($place->photo) }}" class="img-fluid">
                </div>
                <h3>{{ $place->name }}</h3>
                <h4>{{$place->lat}}, {{ $place->lng }}</h4>
                <p class="text-center">{{ $place->created_at->format('d M, Y') }}</p>
            </div>

        </div>
        @endforeach
    </div>
    <div class="row text-center">
        <div class="col-12 mt-md-5 m-auto">
            {{ $places->links() }}
        </div>
    </div>

@endsection
@extends('layout.layout')

@section('content')
    <main role="main" class="inner cover">
        <h1 class="cover-heading">See your results</h1>

        <p class="lead">
            <img src="{{ asset($landmark->img) }}" class="img-fluid" />
        </p>

        <h2>{{ $landmark->description }}</h2>
        <p>Location: {{ $landmark->location->lat }}, {{ $landmark->location->lng }}</p>
        <p>Coincidence: {{ $landmark->score }}%</p>

        <google-map />
    </main>
@endsection

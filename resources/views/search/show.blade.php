@extends('layout.layout')

@section('content')
    <main role="main" class="inner cover">
        <h1 class="cover-heading">See your results</h1>

        <div class="row">
            <div class="col-md-6">
                <p class="lead">
                    <img src="{{ asset($landmark->img) }}" class="img-fluid" />
                </p>

                <h2>{{ $landmark->description }}</h2>
                <p>Location: {{ $landmark->location->lat }}, {{ $landmark->location->lng }}</p>
                <p>Coincidence: {{ $landmark->score }}%</p>
            </div>
            <div class="col-md-6">
                <google-map
                        :lat="{{ $landmark->location->lat }}"
                        :lng="{{ $landmark->location->lng }}"
                        :desc="'{{ $landmark->description }}'"
                        :img="' {{ $landmark->img }}'"
                />
            </div>
        </div>
    </main>
@endsection
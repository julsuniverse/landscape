@extends('layout.layout')

@section('content')

    <main role="main" class="inner cover">
        <h1 class="cover-heading">Find landscape by the image</h1>
        <p class="lead">Just download photo from your computer</p>
        <upload-form
                action="{{ route('upload') }}"
        ></upload-form>
    </main>

@endsection

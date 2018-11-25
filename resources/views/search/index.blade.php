@extends('layout.layout')

@section('content')

    <main role="main" class="inner cover">
        <h1 class="cover-heading">Find landscape by the image</h1>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{$error}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endforeach
        @endif

        <p class="lead">Just download photo from your computer</p>
        <upload-form
                action="{{ route('upload') }}"
        ></upload-form>
    </main>

@endsection

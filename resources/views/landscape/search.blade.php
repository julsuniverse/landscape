@extends('layout.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Find landscape</div>

                <div class="card-body">
                    <upload-form
                        action="{{ route('upload') }}"
                    ></upload-form>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="spinner">
    <i class="fa fa-spinner fa-spin" aria-hidden="true"></i>
</div>
@endsection

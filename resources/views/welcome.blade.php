@extends('layouts.app')

@section('content')
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">welcome page</div>
                    <div class="card-body">
                        <p>привет буфет</p>
                      
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    @auth
        <app-component />
    @endauth
@endsection

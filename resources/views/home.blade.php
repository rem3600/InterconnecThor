@extends('master')

@section('content')

    <div class="row justify-content-center mt-5">
        <div class="col-md-10 bg-light p-5 rounded">

            {{-- welcome message --}}
            <div class="row justify-content-center mb-5">
                <div class="col-md-10">
                    @if (Auth::check())
                        @if (Auth::user()->role_id == 1)
                            <h2 class="text-center"><span class="text-primary fw-bold">{{ Auth::user()->name }}</span>, you are the most <span class="text-primary fw-bold">talented</span>, most <span class="text-primary fw-bold">interesting</span>, and most <span class="text-primary fw-bold">extraordinary</span> person in the universe.</h2>
                        @else
                            <h2 class="text-center"><span class="text-primary fw-bold">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>, you are the most <span class="text-primary fw-bold">talented</span>, most <span class="text-primary fw-bold">interesting</span>, and most <span class="text-primary fw-bold">extraordinary</span> person in the universe.</h2>
                        @endif
                    @else
                        <h2 class="text-center">Welcome, <a href="/login" class="text-decoration-none"><span class="text-primary fw-bold">log in</span></a> or <a href="/register" class="text-decoration-none"><span class="text-primary fw-bold">sign up</span></a>!</h2>
                    @endif
                </div>
            </div>

            {{-- succes message --}}
            @if (session('success'))
                <div class="row justify-content-center mb-5">
                    <div class="col-md-10">
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    </div>
                </div>
            @endif

            {{-- validation errors --}}
            @if ($errors->any())
                <div class="row justify-content-center mb-5">
                    <div class="col-md-10">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
            
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nesciunt explicabo nihil libero dolor sit architecto quam tenetur temporibus debitis iusto nam assumenda facilis impedit voluptas, dolorum illo quibusdam magnam officia?</p>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nesciunt explicabo nihil libero dolor sit architecto quam tenetur temporibus debitis iusto nam assumenda facilis impedit voluptas, dolorum illo quibusdam magnam officia?</p>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nesciunt explicabo nihil libero dolor sit architecto quam tenetur temporibus debitis iusto nam assumenda facilis impedit voluptas, dolorum illo quibusdam magnam officia?</p>        
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nesciunt explicabo nihil libero dolor sit architecto quam tenetur temporibus debitis iusto nam assumenda facilis impedit voluptas, dolorum illo quibusdam magnam officia?</p>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nesciunt explicabo nihil libero dolor sit architecto quam tenetur temporibus debitis iusto nam assumenda facilis impedit voluptas, dolorum illo quibusdam magnam officia?</p>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nesciunt explicabo nihil libero dolor sit architecto quam tenetur temporibus debitis iusto nam assumenda facilis impedit voluptas, dolorum illo quibusdam magnam officia?</p>        
                </div>
            </div>
        
        </div>
    </div>

@endsection
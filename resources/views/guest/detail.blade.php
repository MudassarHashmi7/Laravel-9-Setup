
@extends('guest')
@section('content')

    <div class="container mt-3">
        @if($message = Session::get('success'))
            <div class="alert alert-success text-center" style="width: 60%;margin:auto">{{ $message }}</div>
        @endif
    @if($user)

        <div class="card" style="width:400px;margin: auto">
            <div class="card-body">
                <img class="card-img-top" src="{{ asset('uploads/'.$user->poster ) }}" alt="Card image">
                <h4 class="card-title">{{ $user->name }}</h4>
                <p class="card-text"><b>Email:</b> &nbsp; {{ $user->email }}</p>


            </div>
        </div>

        @endif
    </div>

@endsection


@extends('guest')
@section('content')

    @if($user)
    <form action="{{ route('guests.update',$user->id) }}" style="width: 60%;margin: auto" enctype="multipart/form-data" method="POST">

        @csrf


        <div class="mb-3 mt-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{ $user->name }}">
        </div>

        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ $user->email }}">
        </div>

        <div class="mb-3 mt-3">
            <label for="poster" class="form-label">Profile Pic:</label>
            <input type="file" class="form-control" id="poster" placeholder="Enter Pic" name="poster">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" value="{{ $user->password }}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endif
@endsection



<x-app-layout>
    <main class="mt-5 pt-3">

    @if($errors->any())
        <div class="alert alert-danger" style="width: 60%;margin:auto">
        <strong>Oops! There were some problems with your input.</strong>
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
        @endif
<br>
    <form action="{{route('users.strore')}}" style="width: 60%;margin:auto" method="POST"  enctype="multipart/form-data">
    @csrf

    <div class="mb-3 mt-3">
    <label for="name" class="form-label">Name:</label>
    <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
  </div>

  <div class="mb-3 mt-3">
    <label for="email" class="form-label">E-mail:</label>
    <input type="email" class="form-control" id="email" placeholder="Enter E-mail" name="email">
  </div>

        <div class="mb-3 mt-3">
            <label for="poster" class="form-label">Profile Pic:</label>
            <input type="file" class="form-control" id="poster" placeholder="Enter Pic" name="poster">
        </div>

  <div class="mb-3 mt-3">
    <label for="password" class="form-label">Password:</label>
    <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
  </div>

  <h4>Select Roles </h4>
  @foreach($roles as $role)
            <div class="form-check">
                 <input class="form-check-input" name="role[]" value="{{ $role->id }}" type="checkbox" id="flexCheckDefault-{{$role->id}}">
                 <label class="form-check-label" for="flexCheckDefault-{{$role->id}}"> {{ $role->name ?? "" }}</label>
            </div>
            @endforeach

        <h4>Select Permissions </h4>
        @foreach($permissions as $permission)
            <div class="form-check">
                <input class="form-check-input" name="permission[]" value="{{ $permission->id }}" type="checkbox" id="flexCheckDefault-{{$permission->id}}">
                <label class="form-check-label" for="flexCheckDefault-{{$permission->id}}"> {{ $permission->name ?? "" }}</label>
            </div>
        @endforeach


  <button type="submit" class="btn btn-primary">Submit</button>
</form>



    </main>

</x-app-layout>

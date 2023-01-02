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

    <form action="{{route('roles.update',$role->id)}}" style="width: 60%;margin:auto" method="POST">
    @csrf
    @method('PUT')
  
    <div class="mb-3 mt-3">
    <label for="name" class="form-label">Role Name:</label>
    <input type="text" class="form-control" id="name" placeholder="Enter Role" name="name" value="{{$role->name}}">
  </div>
  
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>



    </main>

</x-app-layout>
<x-app-layout>
    <main class="mt-5 pt-3">
        <div class="container-fluid">


        @if($message = Session::get('success'))
<div class="alert alert-success text-center" style="width: 60%;margin:auto">{{ $message }}</div>
@endif


        <a href="{{route('roles.create')}}" class="btn btn-primary">Add Roles</a>
        </div>
<br>
<h2>Roles</h2>
<br>

        <table class="table" style="width: 60%;margin:auto">
    <thead>
      <tr>
        <th>Sr no.</th>
        <th>Name</th>
        <th>Action</th>
      </tr>
    </thead>
    @if($roles)
    <tbody>
      @foreach($roles as $role)
      <tr>
      <td class="align-middle">{{$role->id}}</td>
        <td class="align-middle">{{$role->name}}</td>
        <td>

        <form action="{{ route('roles.destroy', $role->id) }}" method="post">
        <a href="{{ route('roles.edit', $role->id)}}" class="btn btn-primary">Edit</a>
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')">Delete</button>
        </form>

        </td>
      </tr>
      @endforeach
    </tbody>
    @endif
  </table>








    </main>

</x-app-layout>


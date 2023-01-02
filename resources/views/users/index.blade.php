<x-app-layout>
    <main class="mt-5 pt-3">
        <div class="container-fluid">


            @if($message = Session::get('success'))
                <div class="alert alert-success text-center" style="width: 60%;margin:auto">{{ $message }}</div>
            @endif

            <a href="{{route('users.create')}}" class="btn btn-primary">Add User</a>
        </div>
<br>
<h2>Users</h2>
<br>

<table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>NAme</th>
        <th>Email</th>
          <th>ROle</th>
          <th>Permission</th>
      </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->id}}</td>
            <td>{{ $user->name}}</td>
            <td>{{ $user->email}}</td>
            <td>
                @if(count($user->getroles)>0)
                    @foreach($user->getroles as $role)
                        {{ $role->name ?? ""}}|
                    @endforeach
                @endif
            </td>

            <td>
                @if(count($user->permissions)>0)
                    @foreach($user->permissions as $role)
                        {{ $role->name ?? ""}}|
                    @endforeach
                @endif
            </td>

            <td>
                <form action="{{ route('users.destroy', $user->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
  </table>







    </main>

</x-app-layout>


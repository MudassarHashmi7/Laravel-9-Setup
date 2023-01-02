<x-app-layout>
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <h4>Dashboard</h4>

                    @if($message = Session::get('success'))
                        <div class="alert alert-success text-center" style="width: 60%;margin:auto">{{ $message }}</div>
                    @endif


                </div>
            </div>

            <form action="" method="POST">
                @csrf

                <label>Permission Name</label></br>
                <input type="name" name="name" id="name" class="form-control"></br>
                <button type="submit" class="btn btn-success">Save</button>
            </form>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>

                        <th>Permission</th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            <td> <a href="{{route('permission.edit', $permission->id)}}" ><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                <a href="{{route('permission.delete',$permission->id)}}" ><button class="btn btn-danger btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Delete</button></a>

                            </td>

                        </tr>
                @endforeach


            </div>
        </div>
    </main>


</x-app-layout>

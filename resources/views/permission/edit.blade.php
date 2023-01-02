<x-app-layout>
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h4>Dashboard</h4>
                </div>
            </div>

            <form action="" method="POST">
                @csrf
                @method('PUT')

                <label>Permission Name</label></br>
                <input type="name" value="{{$permission->name}}}" name="name" id="name" class="form-control"></br>
                <button type="submit" class="btn btn-success">Save</button>
            </form>

        </div>
    </main>

</x-app-layout>

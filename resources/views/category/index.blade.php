<x-app-layout>
    <main class="mt-5 pt-3">


        <div class="container-fluid">


            @if($message = Session::get('success'))
                <div class="alert alert-success text-center" style="width: 60%;margin:auto">{{ $message }}</div>
            @endif


            <a href="{{ route('category.create') }}" class="btn btn-primary">Add Category</a>
        </div>

        <br>
        <h1>Categories</h1>
@if($categories)
        <table class="table" style="width: 90%;margin: auto">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Status</th>
            </tr>
            </thead>
            @foreach($categories as $item)
            <tbody>

            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->slug }}</td>
                <td>{{ $item->status }}</td>
                <td>

                    <form action="{{ route('category.destroy', $item->id) }}" method="post">
                        <a href="{{ route('subcategory.index',$item->id) }}" class="btn btn-success">Add SubCategory</a>
                        <a href="{{ route('category.edit', $item->id)}}" class="btn btn-primary">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')">Delete</button>
                    </form>

                </td>
            </tr>




            <tr>
                <th>SubCategories</th>
            </tr>

            @foreach($item->getsubcategory as $subfield)

                @if($subfield->name1)

                <tr>

                    <td>{{ $subfield->name1 }}</td>
                    <td>
                        <form action="{{ route('subcategory.destroy', $subfield->id) }}" method="post">
                            <a href="{{ route('subcategory.edit',$subfield->id) }}" class="btn btn-primary">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endif

            @endforeach






            </tbody>
            @endforeach
        </table>
        @endif

    </main>

</x-app-layout>

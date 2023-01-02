<x-app-layout>
    <main class="mt-5 pt-3">

        @if($message = Session::get('success'))
            <div class="alert alert-success text-center" style="width: 60%;margin:auto">{{ $message }}</div>
        @endif

       &nbsp; <a href="{{ route('products.create') }}" class="btn btn-primary">Add Products</a>


@if($product)
            <table class="table" style="width: 90%;margin: auto">
                <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Product Quantity</th>
                    <th>Categories</th>
                </tr>
                </thead>

                @foreach($product as $products)
                <tbody>
                <tr>
                    <td>{{ $products->product }}</td>
                    <td>{{ $products->quantity }}</td>
                    <td>
                        @if(count($products->getcat)>0)
                            @foreach($products->getcat as $cat)
                                {{ $cat->name ?? ""}}|
                            @endforeach
                        @endif
                    </td>
                    <td>

                        <form action="{{ route('products.destroy', $products->id) }}" method="post">
                            <a href="{{ route('products.edit',$products->id) }}" class="btn btn-info">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
                </tbody>
                @endforeach
            </table>
            @endif
    </main>

</x-app-layout>

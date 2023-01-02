<x-app-layout>
    <main class="mt-5 pt-3">

        <h3>Edit Record</h3>



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

        <form action="{{ route('products.update',$product->id) }}" style="width: 60%;margin: auto" method="POST">
            @csrf
            <div class="mb-3 mt-3">
                <label for="product" class="form-label">Product Name:</label>
                <input type="text" class="form-control" id="product" placeholder="Product Name" name="product" value="{{ $product->product }}">
            </div>

            <div class="mb-3 mt-3">
                <label for="quantity" class="form-label">Product Quantity:</label>
                <input type="text" class="form-control" id="quantity" placeholder="Product Quantity" name="quantity" value="{{ $product->quantity }}">
            </div>

            @if($categories)
                <h4>Select Category </h4>
                @foreach($categories as $items)
                    <div class="form-check">
                        <input class="form-check-input" name="item[]" value="{{ $items->id }}" type="checkbox" id="flexCheckDefault-{{$items->id}}">
                        <label class="form-check-label" for="flexCheckDefault-{{$items->id}}"> {{ $items->name ?? "" }}</label>
                    </div>
                @endforeach
            @endif

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>


    </main>

</x-app-layout>

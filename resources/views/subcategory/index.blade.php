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

        <form action="{{ route('subcategory.store',$category->id) }}" style="width: 60%;margin: auto" method="POST">
            @csrf

            @if($category)
            <div class="mb-3 mt-3">
                <label for="name">Parent Category</label>
                <input type="text" class="form-control" value="{{ $category->name }}" disabled>
            </div>
            @endif

            <div class="mb-3 mt-3">
                <label for="name1">SubCategory:</label>
                <input type="name" class="form-control" id="name1" placeholder="Enter name" name="name1">
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>


    </main>

</x-app-layout>

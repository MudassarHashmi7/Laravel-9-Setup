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

        @if($categories)
        <form action="{{ route('category.update',$categories->id) }}" style="width: 60%;margin:auto" method="POST"  enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="{{ $categories->name }}">
            </div>

            <div class="mb-3 mt-3">
                <label for="slug" class="form-label">Slug:</label>
                <input type="text" class="form-control" id="slug" placeholder="Enter Slug" name="slug" value="{{ $categories->slug }}">
            </div>

            <div class="mb-3 mt-3">
                <label for="url" class="form-label">Image URL:</label>
                <input type="text" class="form-control" id="url" placeholder="Enter Url" name="url" value="{{ $categories->url }}">
            </div>

            <div class="mb-3 mt-3">
                <label for="password" class="form-label">Status:</label>
                <select class="form-select" name="status">
                    <option>Active</option>
                    <option>Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

            @endif

    </main>

</x-app-layout>

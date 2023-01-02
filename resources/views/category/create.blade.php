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

        <form action="{{ route('category.store') }}" style="width: 60%;margin:auto" method="POST"  enctype="multipart/form-data">
            @csrf

            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
            </div>

            <div class="mb-3 mt-3">
                <label for="slug" class="form-label">Slug:</label>
                <input type="text" class="form-control" id="slug" placeholder="Enter Slug" name="slug">
            </div>

            <div class="mb-3 mt-3">
                <label for="url" class="form-label">Image URL:</label>
                <input type="text" class="form-control" id="url" placeholder="Enter Url" name="url">
            </div>

            <div class="mb-3 mt-3">
                <label for="password" class="form-label">Status:</label>
                <select class="form-select" name="status">
                    <option>Active</option>
                    <option>Inactive</option>
                </select>
            </div>

{{--            @if($categories)--}}
{{--                @foreach($categories as $item)--}}
{{--                    @foreach($item->getsubcategory as $subfield)--}}
{{--            <div class="mb-3 mt-3">--}}
{{--                <select class="form-select">--}}
{{--                    <option>{{ $subfield->name }}</option>--}}
{{--                </select>--}}
{{--            </div>--}}
{{--                    @endforeach--}}
{{--                @endforeach--}}
{{--            @endif--}}

            @if($categories)


                        <div class="mb-3 mt-3">
                            <label for="name1" class="form-label">SubCategory:</label>
                            <select class="form-select" name="name1" id="name1" >
                                @foreach($categories as $item)
                                @foreach($item->getsubcategory as $subfield)
                                <option>{{ $subfield->name1 }}</option>
                                @endforeach
                                @endforeach
                            </select>
                        </div>


            @endif

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>


    </main>

</x-app-layout>

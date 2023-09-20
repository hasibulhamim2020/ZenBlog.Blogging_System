@extends('admin.master')
@section('content')

    <div class="row">
        <div class="col-xl-8 mx-auto">

            <div class="card rounded">
                <div class="card-body rounded">
                    <div class="border p-3 rounded">
                        <h5 class="mb-0 text-uppercase">Blog Form</h5>
                        <hr/>
                        <form action="{{ route('blogs.store') }}" method="post" class="row g-3" enctype="multipart/form-data">
                            @csrf

                            <div class="col-12">
                                <label class="form-label">Blog Title</label>
                                <input type="text" class="form-control" name="title">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Slug</label>
                                <input type="text" class="form-control" name="slug">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Category</label>
                                <select name="category_id" id="" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Author Name</label>
                                <input type="text" class="form-control" name="author_name">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="description"></textarea>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Upload Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>

                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Set Category</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

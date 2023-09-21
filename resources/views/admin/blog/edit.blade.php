@extends('admin.master')
@section('content')

    <div class="row">
        <div class="col-xl-8 mx-auto">

            <div class="card rounded">
                <div class="card-body rounded">
                    <div class="border p-3 rounded">
                        <h5 class="mb-0 text-uppercase">Blog Form</h5>
                        <hr/>
                        <form action="{{ route('blogs.update',$blog->id) }}" method="post" class="row g-3" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-12">
                                <label class="form-label">Blog Title</label>
                                <input value="{{$blog->title}}" type="text" class="form-control" name="title">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Slug</label>
                                <input value="{{$blog->slug}}" type="text" class="form-control" name="slug">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Category</label>
                                <select value="{{$blog->category->category_name}}" name="category_id" id="" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{($category->id == $blog->category_id) ? 'selected' : '' }}>{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Author Name</label>
                                <input value="{{$blog->author_name}}" type="text" class="form-control" name="author_name">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="description">{{$blog->description}}</textarea>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Upload Image</label><br>
                                <img src="{{asset($blog->image)}}" alt="" style="height:150px"width="150px">
                                <br><br>
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

@extends('admin.master')
@section('content')

    <div class="row">
        <div class="col-xl-12 mx-auto">

            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <h6 class="mb-0 text-uppercase">Blogs table</h6>
                        <hr>
                        <table id="example" class="table table-hover table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Sl. No.</th>
                                <th>Title</th>
{{--                                <th>slug</th>--}}
                                <th>Category</th>
                                <th>Author</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($blogs as $blog)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $blog->title }}</td>
{{--                                    <td>{{ $blog->slug }}</td>--}}
                                    <td>{{ $blog->category->category_name }}</td>
                                    <td>{{ $blog->author_name }}</td>
                                    <td>{{ substr($blog->description,0,30) }}...</td>{{--  find php string on google--}}
                                    <td><img src="{{ $blog->image }}" alt="" style="width: 100px" height="100px"></td>
                                    <td>{{ $blog->status ==1 ? 'Active' : 'Inactive' }}</td>
                                    <td>{{ date('F j Y', strtotime($blog->created_at)) }}</td>{{-- https://www.php.net/manual/en/function.date.php --}}
                                    <td>
                                        <a href="{{ route('blogs.edit',$blog->id) }}" class=" mx-1 float-start btn btn-sm btn-secondary">Edit</a>
                                        @if($blog->status == 1)
                                            <a href="{{ route('blogs.show',$blog->id) }}" class="mx-1 float-start btn btn-sm btn-warning">Inactive</a>
                                        @else
                                            <a href="{{ route('blogs.show',$blog->id) }}" class="mx-1 float-start btn btn-sm btn-info">Active</a>
                                        @endif
                                        <form action="{{route('blogs.destroy',$blog->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm float-start mx-1 " onclick="return confirm('Are you sure you want to delete this!!')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

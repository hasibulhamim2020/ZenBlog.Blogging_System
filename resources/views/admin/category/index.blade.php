@extends('admin.master')
@section('content')

<div class="row">
    <div class="col-xl-10 mx-auto">

        <div class="card">
            <div class="card-body">
                <div class="border p-3 rounded">
                    <h6 class="mb-0 text-uppercase">category table</h6>
                    <hr>
                    <table class="table table-hover table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Sl. No.</th>
                            <th>Category Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->status ==1 ? 'Active' : 'Inactive' }}</td>
                            <td>
                                <a href="{{ route('categories.edit',$category->id) }}" class=" mx-1 float-start btn btn-sm btn-secondary">Edit</a>
                                @if($category->status == 1)
                                    <a href="{{ route('categories.show',$category->id) }}" class="mx-1 float-start btn btn-sm btn-warning">Inactive</a>
                                @else
                                    <a href="{{ route('categories.show',$category->id) }}" class="mx-1 float-start btn btn-sm btn-info">Active</a>
                                @endif
                                <form action="{{route('categories.destroy',$category->id)}}" method="post">
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

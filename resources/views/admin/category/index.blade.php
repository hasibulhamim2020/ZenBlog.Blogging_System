@extends('admin.master')
@section('content')

<div class="row">
    <div class="col-xl-8 mx-auto">

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
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                @if($category->status ==1)
                                    <a href="{{ route('categories.show', $category->id) }}" class="btn btn-sm btn-warning">Active</a>
                                @else
                                    <a href="{{ route('categories.show', $category->id) }}" class="btn btn-sm btn-success">Inactive</a>
                                @endif
                                <a href="{{ route('categories.destroy', $category->id) }}" class="btn btn-sm btn-danger">Delete</a>
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

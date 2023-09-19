@extends('admin.master')
@section('content')

    <div class="row">
        <div class="col-xl-8 mx-auto">

            <div class="card rounded">
                <div class="card-body rounded">
                    <div class="border p-3 rounded">
                        <h5 class="mb-0 text-uppercase">Category Form</h5>
                        <hr/>
                        <form action="{{ route('categories.store') }}" method="post" class="row g-3">
                        @csrf

                            <div class="col-12">
                                <label class="form-label">Category Name</label>
                                <input type="text" class="form-control" name="category_name">
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

@extends('admin.app')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Update Category</h3></div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="post" action="{{ route('category.update') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $category->id }}" />
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputFirstName">Category Name</label>
                                        <input type="text" name="name" value="{{ $category->name }}"  class="form-control py-4" id="inputFirstName" type="text" placeholder="Enter Category" required />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block">Update Category</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection

@extends('admin.app')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container">
            <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header"><h3 class="text-center font-weight-light my-4">Update Job</h3></div>
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
                    <form method="post" action="{{ route('job.update') }}">
                        @csrf
                        <input type="hidden" value="{{ $job->id }}" name="id"/>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputFirstName">Title</label>
                                    <input type="text" value="{{ $job->title }}" name="title" class="form-control py-4" id="inputFirstName" type="text" placeholder="Enter title" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputLastName">Category</label>
                                    <select name="category_id" class="form-control @error('role') is-invalid @enderror" required>
                                        <option  selected disabled>Select</option>
                                        @empty(!$categories)
                                            @foreach ($categories as $category)
                                                @if($category->id == $job->category_id)
                                                    <option value="{{ $category->id }}" selected> {{$category->name}} </option>
                                                @else
                                                    <option value="{{ $category->id }}" > {{$category->name}} </option>
                                                @endif

                                            @endforeach
                                        @endempty
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="inputEmailAddress">Description</label>
                            <textarea name="description" class="form-control py-4" required>{{ $job->description }}</textarea>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputPassword">Start Date</label>
                                    <input type="date" value="{{ $job->startdate }}" name="startdate" class="form-control py-4" id="inputPassword"  placeholder="Start Date"  required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputConfirmPassword">End Date</label>
                                    <input type="date" value="{{ $job->enddate }}" class="form-control py-4" name="enddate" id="inputConfirmPassword"  placeholder="End Date" required />

                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block">Update Job</button></div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </main>
</div>
@endsection

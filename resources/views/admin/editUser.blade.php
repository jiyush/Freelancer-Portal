@extends('admin.app')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container">
            <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header"><h3 class="text-center font-weight-light my-4">Update User</h3></div>
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
                    <form method="post" action="{{ route('user.update') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}" />
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputFirstName">Name</label>
                                    <input type="text" name="name" value="{{ $user->name }}" class="form-control py-4" id="inputFirstName" type="text" placeholder="Enter name" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputLastName">Role</label>
                                    <select name="role" class="form-control @error('role') is-invalid @enderror" required>
                                        <option  selected disabled>Select</option>
                                        @foreach ($roles as $role)
                                            @if($user->role == $role->name)
                                                <option value="{{ $role->name }}" selected > {{$role->name}} </option>
                                            @else
                                                <option value="{{ $role->name }}" > {{$role->name}} </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                            <input name="email" type="email" value="{{ $user->email }}" class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" required />
                        </div>
                        <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block">Update User</button></div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </main>
</div>
@endsection

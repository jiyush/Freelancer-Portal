<h3 class="mt-4">Users</h3>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Users</li>
</ol>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        DataTable
        <a href="{{ url('home/user/add') }}" class="btn btn-info" style="float: right;">Add User</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th >Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th >Edit</th>
                        <th>Delete</th>
                    </tr>
                </tfoot>
                <tbody>
                    @empty(!$users)
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    <a href="{{ route('user.edit',['id' => $user->id]) }}" class="btn btn-info" >Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('user.delete',['id' => $user->id]) }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $user->id }}" name="id">
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete {{ $user->name }}?')" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endempty
                </tbody>
            </table>
        </div>
    </div>
</div>

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
                                    <a href="" class="btn btn-info" >Edit</a>
                                </td>
                                <td>
                                    <button href="" class="btn btn-danger" >Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    @endempty


                </tbody>
            </table>
        </div>
    </div>
</div>

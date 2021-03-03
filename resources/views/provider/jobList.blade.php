<h3 class="mt-4">Jobs</h3>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Jobs</li>
</ol>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        DataTable
        <a href="{{ route('job.add') }}" class="btn btn-info" style="float: right;">Add Jobs</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Bid Status</th>
                        <th >Start Date</th>
                        <th>End Date</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Bid Status</th>
                        <th >Start Date</th>
                        <th>End Date</th>
                    </tr>
                </tfoot>
                <tbody>
                    @empty(!$jobs)
                        @foreach ($jobs as $job)
                            <tr>
                                <td>{{ $job->title }}</td>
                                <td>{{ $job->email }}</td>
                                <td>{{ $job->role }}</td>
                                <td>
                                    <a href="{{ route('job.edit',['id' => $job->id]) }}" class="btn btn-info" >Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('job.delete',['id' => $job->id]) }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $job->id }}" name="id">
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete {{ $job->name }}?')" class="btn btn-danger">Delete</button>
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

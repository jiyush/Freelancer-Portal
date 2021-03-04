<h3 class="mt-4">Jobs</h3>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Jobs</li>
</ol>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        DataTable
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
                                <td>{{ $job->category }}</td>
                                <td>{{ $job->bid_status ? 'close' : 'open' }}</td>
                                <td>{{ $job->startdate }}</td>
                                <td>{{ $job->enddate }}</td>
                            </tr>
                        @endforeach
                    @endempty
                </tbody>
            </table>
        </div>
    </div>
</div>

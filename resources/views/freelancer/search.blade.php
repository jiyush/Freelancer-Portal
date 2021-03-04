<h3 class="mt-4">Jobs</h3>
@empty(!$jobs)
    @foreach ($jobs as $job)
        <div class="card mb-4">
            <div class="card-header">
                <i class="fa fa-briefcase" aria-hidden="true"></i>
                {{ $job->title }}
                <form  class="d-none d-md-inline-block form-inline ml-auto " action="{{ route('freelancer.bid') }}" method="POST" style="float: right;">
                    @csrf
                    <input type="hidden" name="job_id" value="{{ $job->id }}"/>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"/>
                    <div class="input-group">
                        <input class="form-control" type="number" name="amount" placeholder="Enter amount" aria-label="Search" aria-describedby="basic-addon2" />
                        <div  class="input-group-append">
                            <button class="btn btn-primary" type="submit">Bid</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <h6>Category:- {{ $job->category }}</h6>
                <h6>Description:- {{ $job->description }}</h6>
            </div>
            <div class="card-footer small text-muted">
                Start Date :- {{ $job->startdate }}
                End   Date :- {{ $job->enddate }}
            </div>
        </div>
    @endforeach
@endempty

@extends('admin.app')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container">
            <h5 class="mt-4">Job Bids</h5>
            @empty(!$jobs)
                @foreach ($jobs as $job)
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fa fa-briefcase" aria-hidden="true"></i>
                            {{ $job->title }} <h3>Amount :- {{ $job->amount }}</h3>
                            @if($job->bid_id == null)
                            <form  class="d-none d-md-inline-block form-inline ml-auto " action="{{ route('job.accept') }}" method="POST" >
                                @csrf
                                <input type="hidden" name="bid_id" value="{{ $job->bidId }}"/>
                                <input type="hidden" name="job_id" value="{{ $job->id }}"/>
                                <div class="input-group">
                                    <div>
                                        <button class="btn btn-primary" type="submit">Accept</button>
                                    </div>
                                </div>
                            </form>
                            <form  class="d-none d-md-inline-block form-inline ml-auto " action="{{ route('job.cancle') }}" method="POST" >
                                @csrf
                                <input type="hidden" name="bid_id" value="{{ $job->bidId }}"/>
                                <input type="hidden" name="job_id" value="{{ $job->id }}"/>
                                <div class="input-group">
                                    <div>
                                        <button class="btn btn-danger" type="submit">Cancle</button>
                                    </div>
                                </div>
                            </form>
                            @else
                                <h4>
                                    <button class="btn btn-success" type="submit">job Aprruved</button>
                                </h4>
                            @endif
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
        </div>
    </main>
</div>
@endsection

@extends('admin.app')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container">
            <h5 class="mt-4">Appruved Jobs</h5>
            @if(!empty($jobs))
                @foreach ($jobs as $job)
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fa fa-briefcase" aria-hidden="true"></i>
                            {{ $job->title }} <h3>Amount :- {{ $job->amount }}</h3>
                                <h4>
                                    <button class="btn btn-success" type="submit">job Aprruved</button>
                                </h4>
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
            @else
                    <h1>no jobs are appruve</h1>
            @endif
        </div>
    </main>
</div>
@endsection

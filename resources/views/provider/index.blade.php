@extends('admin.app')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container">
            @if (Auth::user()->role == 'job_provider')
                @include('provider.jobList')
            @endif
        </div>
    </main>
</div>
@endsection

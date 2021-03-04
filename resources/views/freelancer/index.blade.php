@extends('admin.app')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container">
            {{-- @if (Auth::user()->role == 'job_provider')
                @include('provider.jobList');
            @elseif(Auth::user()->role == 'admin')
                @include('admin.jobList')
            @endif --}}
            @include('freelancer.search')
        </div>
    </main>
</div>
@endsection

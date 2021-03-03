@extends('admin.app')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container">
            @if (Auth::user()->role == 'admin')
                @include('admin.user')
            @elseif (Auth::user()->role == 'freelancer')
                @include('freelancer.search')
            @else
                @include('provider.job')
            @endif
        </div>
    </main>
</div>
@endsection

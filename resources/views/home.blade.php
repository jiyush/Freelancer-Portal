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
                <script>window.location = "/home/job"</script>
            @endif
        </div>
    </main>
</div>
@endsection

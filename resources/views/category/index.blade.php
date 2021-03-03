@extends('admin.app')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container">
            @if (Auth::user()->role == 'admin')
                @include('category.categoryList')
            @endif
        </div>
    </main>
</div>
@endsection

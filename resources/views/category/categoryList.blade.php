<h3 class="mt-4">Categories</h3>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Categories</li>
</ol>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        DataTable
        <a href="{{ route('category.add') }}" class="btn btn-info" style="float: right;">Add Category</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th >Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th >Edit</th>
                        <th>Delete</th>
                    </tr>
                </tfoot>
                <tbody>
                    @empty(!$categories)
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a href="{{ route('category.edit',['id' => $category->id]) }}" class="btn btn-info" >Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('category.delete',['id' => $category->id]) }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $category->id }}" name="id">
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete {{ $category->name }}?')" class="btn btn-danger">Delete</button>
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

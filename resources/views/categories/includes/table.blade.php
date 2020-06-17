<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>Category ID</th>
                <th>Name</th>
                <th>Created Date</th>
                <th>Updated Date</th>
                <th colspan="2">
                    <a href=" {{ route('categories.create') }}">+ New</a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $loop -> index + 1 }}</td>
                    <td>{{ $category -> id }}</td>
                    <td>{{ $category -> name }}</td>
                    <td>{{ $category -> created_at }}</td>
                    <td>{{ $category -> updated_at }}</td>
                    <td>
                        <button onclick="location.href='{{ route('categories.edit', $category -> id) }}'" type="button" class="btn btn-primary">Edit</button>
                    </td>
                    <td>
                        <form action="{{ route('categories.delete', $category -> id) }}" method="post" id="frm{{ $category -> id }}">
                            @csrf
                            @method('delete')
                            <button href="javascript:void(0)" 
                            onclick="if(confirm('Are you sure you want to delete this item?')){
                                document.getElementById('frm{{ $category -> id }}').submit()
                                }" type="button" class="btn btn-primary">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="pagination">
    {{ $categories -> links() }}
</div>
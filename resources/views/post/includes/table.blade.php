<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>Category ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Creator Name</th>
                <th colspan="2">
                    <a href=" {{ route('post.create') }}">+ New</a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $loop -> index + 1 }}</td>
                    <td>
                        @if ($post -> category)
                        {{ $post -> category->name }}
                        @endif
                    </td>
                    <td>{{ $post -> title }}</td>
                    <td>{{ $post -> author }}</td>
                    <td>{{ $post -> creator->name }}</td>
                    @can('editPost', $post)
                        <td>
                            <button onclick="location.href='{{ route('post.edit', $post -> id) }}'" type="button" class="btn btn-primary">Edit</button>
                            @if (empty($post -> category))
                            <button onclick="location.href="#" type="button" class="btn btn-primary">Reasign Category</button>
                            @endif
                        </td>
                    @endcan    
                    @can('deletePost', $post)
                        <td>
                            <form action="{{ route('post.delete', $post -> id) }}" method="post" id="frm{{ $post -> id }}">
                                @csrf
                                @method('delete')
                                <button href="javascript:void(0)" 
                                onclick="if(confirm('Are you sure you want to delete this item?')){
                                    document.getElementById('frm{{ $post -> id }}').submit()
                                    }" type="button" class="btn btn-primary">Delete</button>
                            </form>
                        </td>
                    @endcan
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="pagination">
    {{ $posts -> links() }}
</div>
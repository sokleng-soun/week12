@if($errors -> any())
    <div class="error">
        @foreach($errors -> all() as $error)
            <div class="alert alert-danger" role="alert">
                 {{ $error }}
            </div>
        @endforeach
    </div>
@endif

<div class="form-group">
    <div class="col-lg-4">
        <label for="category_id">Category *</label>
        <select name="category_id" id="category_id" class="form-control" required>
            <option value="">Please select one</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-4">
        <label for="title">Title *</label>
        <input type="text" name="title" id="title" class="form-control" 
        value="@if(isset($post)) {{ $post -> title }} @endif" required/>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-4">
        <label for="author">Author</label>
        <input type="text" name="author" id="author" class="form-control" 
        value="@if(isset($post)) {{ $post -> author }} @endif"/>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-4">
        <label for="content">Content</label>
        <textarea name="content" id="content" class="form-control">
            @if(isset($post)) {{ $post -> content }} @endif
        </textarea>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-4">
        <button class="btn btn-primary">Save</button>
    </div>
</div>
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
        <label for="name">Category Name *</label>
        <input type="text" name="name" id="name" class="form-control" 
        value="@if(isset($category)) {{ $category -> name }} @endif"/>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-4">
        <button class="btn btn-primary">Save</button>
    </div>
</div>
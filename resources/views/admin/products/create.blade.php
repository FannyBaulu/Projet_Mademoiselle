@section('script')
<script>
    function aff_commerce() {

        if (document.getElementById("exampleCheck1").checked == true) {
            document.getElementById("block_commerce").style.display = "block";
        } else {
            document.getElementById("block_commerce").style.display = "none";
        }
    }

</script>
@endsection
@extends('layouts.header')

@section('content')

<h2 class='text-center' style='margin-top:5%'>New Product</h2>

<form action="{{route('admin.products.store')}}" method="POST" style="width:50%; margin:auto; margin-top:5%"
    enctype="multipart/form-data">
    @csrf
    <div class="form-group">
    <input type="text" class="form-control" placeholder="Name of the product" name="name" value="{{old('name')}}">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Reference of the product" name="refNumber" value="{{old('refNumber')}}">
    </div>
    <div class="form-group">
        <textarea name="description" class="form-control" placeholder="Description of the product" rows='10'
            cols='10'>{{{ old('description') }}}</textarea>
    </div>
    <select name="category" id="categories" class="custom-select">
        @foreach ($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
    <div class="form-group">
        <label for="exampleFormControlFile1">Choose your product's image</label>
        <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
    </div>
    <div class="form-group">
        <input type="checkbox" class="form-check-input" id="exampleCheck1" onchange="aff_commerce()">
        <label class="form-check-label" for="exampleCheck1">Put to sale</label>
    </div>
    <div class="form-group" id="block_commerce" style="display:none">
        <input type="text" class="form-control" name="price" placeholder="Price">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>

@endsection

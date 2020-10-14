
@extends('layouts.header')

@section('content')

<h2 class='text-center' style='margin-top:5%'>Edit product</h2>
<title>{{$product->name}}</title>
<form action="{{route('admin.products.update',$product->id)}}" method="POST" style="width:50%; margin:auto; margin-top:5%" enctype="multipart/form-data">
    @csrf
    {{method_field('PUT')}}
    <div class= "form-group">
        <input type="text" class="form-control" placeholder="Name of the product" name="name" value={{$product->name}}>
    </div>
    <div class= "form-group">
        <input type="text" class="form-control" placeholder="Reference of the product" name="refNumber" value={{$product->refNumber}}>
    </div>
    <div class= "form-group">
    <textarea name="description" class="form-control" placeholder="Description of the product" rows='10' cols='10'>{{old('description')?old('description'):$product->description}}</textarea>
    </div>
    @if ($product->price)
    <div class="form-group">
        <input type="text" class="form-control" name="price" placeholder="Price">
    </div>
    @endif
    <select name="category" id="category" class="custom-select" >
        @foreach ($categories as $category)
          <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
    <div class="form-group">
        <label for="exampleFormControlFile1">Choose your product's image</label>
        <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-outline-success">Update</button>
    </div>
</form>

@endsection
@extends('./layouts/header')
@section('stylesheet')
<style>
    a {
        color: #f9ae64;
    }

</style>
@endsection
@section('content')

<div class="d-flex flex-wrap p-0 justify-content-center">
    @foreach($products as $product)
    <div class="card flex-row border-secondary m-1" style="width:270px; width:300px; height:250px;">
        <div class="d-flex flex-column col-6 p-0">
            <h4 class="card-header">
                <a href="{{url('admin/products/'.$product->id)}}">{{$product->name}}</a>
            </h4>
            <div class="card-body  ">
                @if($product->price)
                <div class="card-text font-weight-light text-sm text-muted ">
                    {{$product->getPrice()}}
                </div>
                @endif
                <div class="card-text font-weight-light text-truncate" style="font-size:smaller">
                    {{$product->description}}
                </div>
            </div>

            <div class="card-footer bottom-fixed text-muted font-weight-normal font-italic d-block ">
                {{$product->category->name}}
            </div>
        </div>
        <div class="d-flex flex-column col-6 p-0">
            <img src="{{asset($product->image)}}" alt="" width="100%" height="100%" class="img-center "
                style="object-fit:cover;">
        </div>

    </div>
    @endforeach 
</div>
<div class="d-flex justify-content-center">{{$products->links()}}</div>

@admin
    <div class="text-center">
        <a href="{{route('admin.products.create')}}"><button type="button" class="btn btn-primary mt-1 text-center"> Add
                Product</button></a>
    </div>
@endadmin


@endsection

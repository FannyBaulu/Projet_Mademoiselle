@extends('./layouts/header')
@section('content')

<div class="container">
    <div class="card m-4">
        <div class="container-in">
            <div class="wrapper row">
                <div class="preview col-md-6">
                    <div class="tab-pane active" id="pic-1">
                        <img class="w-100" src="{{asset($product->image)}}" />
                    </div>
                </div>
                <div class="details col-md-6">
                    <h3 class="product-title">{{$product->name}}</h3>

                    <p class="product-description">{{$product->description}}</p>
                    @if ($product->price)
                    <h4 class="price">Current price: <span>{{$product->getPrice()}}</span></h4>
                    @endif
                    @admin
                    <div class="d-flex justify-content-end">
                        <a href={{route('admin.products.edit',$product->id)}}>
                            <button type="button" class="btn btn-primary ml-2">Edit</button>
                        </a>
                        <form action="{{route('admin.products.destroy',$product->id)}}" method="POST">
                            @csrf
                            {{method_field('DELETE')}}
                            <button type="submit" class="btn btn-outline-danger mr-2 ml-1"
                                onclick="return confirm('Are you sure you want to delete?');">Delete</button>
                        </form>
                    </div>
                    @endadmin
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

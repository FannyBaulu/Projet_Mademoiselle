@extends('layouts.header')
@section('stylesheet')
<style>
    #cat_but,
    a {
        color: #f9ae64;
        border-color: #f9ae64;
    }

    #cat_but:hover {
        background-color: #f9ae64;
        color: white;
        border-color: #f9ae64;
    }

    #cat_but {
        width: 100%;
    }

</style>
@endsection
@section('content')

    <div class="d-flex">
        <div class="d-flex flex-column mt-1">
            <form action="{{route('products.search')}}" class=" d-flex align-items-center">
                <div class="form-group">
                    <input type="text" name="q" pattern=".{3,}" class="form-control" placeholder="Search..." required>
                </div>
                <button class="btn btn-info d-md-none p-0 ml-3" type="submit">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </button>
            </form>
            @if (request()->input('q'))
            <h6>{{$salableProducts->count()}} result(s) found for {{request()->input('q')}}</h6>
            @endif

            <nav class="" id="bd-docs-nav">
                <div class="bd-toc-item  d-flex flex-column">
                    <ul class="nav bd-sidenav d-flex flex-column">
                        <li class="nav-item">
                            <form method="GET" action="{{route('order.indexSalableProducts')}}">
                                @csrf
                                <button id="cat_but" class="btn m-1">All</button>
                            </form>
                        </li>
                        @foreach ($categories as $category)
                        <li class="nav-item">
                            <form method="POST"
                                action="{{route('order.productsByCategory',['category'=>$category->id])}}">
                                @csrf
                                <button id="cat_but" class="btn m-1">{{$category->name}}</button>
                            </form>
                        </li>
                        @endforeach

                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="container mt-1">
            <div class="col-lg-12">
                <div class="row">
                    @foreach($salableProducts as $salableProduct)
                    <div class="col-lg-3 col-md-6 mb-4 ">
                        <div class="card h-100">
                            <img src="{{asset($salableProduct->image)}}" alt="" class="card-img-top "
                                style="object-fit:cover;">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="{{url('admin/products/'.$salableProduct->id)}}">
                                        {{$salableProduct->name}}</a>
                                </h4>
                                <h6>{{$salableProduct->getPrice()}}</h6>
                                <p class="card-text text-truncate">{{$salableProduct->description}}</p>
                            </div>
                            <form action="{{route('order.store')}}" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$salableProduct->id}}">
                                <button type="submit" class="btn btn-dark btn-sm btn-block ">Add to cart</button>
                            </form>

                        </div>
                    </div>
                    @endforeach
                </div><!-- /.row -->
                <div class="d-flex justify-content-center">{{$salableProducts->links()}}</div>
            </div><!-- /.col-lg-9 -->
        </div><!-- /.container -->

    </div>

@endsection

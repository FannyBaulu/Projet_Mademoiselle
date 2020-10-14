@extends('./layouts/header')
@section('content')

<div class="container">
    <div class="card m-4">
        <div class="container-in">
            <div class="wrapper row">
                <div class="preview col-md-6">
                    <div class="tab-pane active" id="pic-1">
                        <img class="w-100" src="{{asset($news->image)}}" />
                    </div>
                </div>
                <div class="details col-md-6">
                    <h3 class="product-title">{{$news->title}}</h3>
                    <p class="product-description">{{$news->description}}</p>
                    @admin
                    <div class="d-flex justify-content-end">
                        <a href={{route('admin.news.edit',$news->id)}}>
                            <button type="button" class="btn btn-primary ml-2">Edit</button>
                        </a>
                        <form action="{{route('admin.news.destroy',$news->id)}}" method="POST">
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

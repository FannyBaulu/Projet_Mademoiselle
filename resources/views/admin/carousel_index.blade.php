@extends('layouts.header')

@section('content')

@if(!empty($success))
    <div class="alert alert-success" role="alert">
        {{$success}}
    </div>
@endif

<div>
    <div style="border: 1px solid rgb(249, 174, 100)" class="m-3 p-3">
        <form action="{{route('carousel.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <label for="exampleFormControlFile1">Choose your product's image (ratio must be of 3*4)</label>
            <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
            <button type="submit" class="btn btn-primary">Add image</button>
        </form>
    </div>



    <div class="container w-100 m-1 " >
            <div class="row">
                @foreach ($carousels as $carousel)
                <div class="col-lg-3 mb-4 " >
                    <div class="card">
                        <img src="{{asset($carousel->image)}}" class="card-img-top" alt="" style="object-fit:cover;">
                        <div class="card-body ">
                            
                                <button id="edbut{{$loop->index}}" onClick="showedit({{$loop->index}})" type="button" class="btn btn-primary w-100">Editer</button>
                                <form id="form-edit{{$loop->index}}" action="{{route('carousel.update',$carousel->id)}}" method="POST" enctype="multipart/form-data" style="display: none;">
                                    @csrf
                                    @method('PUT')
                                    <label for="exampleFormControlFile1">Choose your product's image (ratio must be of 3*4)</label>
                                    <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </form>
                            <form id="del-form{{$loop->index}}" action="{{route('carousel.destroy',$carousel->id)}}" method="POST"
                                onsubmit="return confirm('Êtes vous sûre de vouloir supprimer cette image du carousel?')">
                                @csrf
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-outline-danger w-100" >Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
    </div>
    @endsection

    @section('extra-js')
      <script>
        function showedit(index){
            var form = document.getElementById('form-edit'+index);
            var delform = document.getElementById('del-form'+index);
            var edform = document.getElementById('edbut'+index);
            edform.style.display="none";
            form.style.display= "block";
            delform.style.display = "none";
        }
        
    </script>  
    @endsection
    
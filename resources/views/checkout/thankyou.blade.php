@extends('layouts.header')
@section('content')
    <h3>Your order has been taken into account.</h3>

    <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th scope="col" class="border-0 bg-light">
                <div class="p-2 px-3 text-uppercase">Product</div>
              </th>
              <th scope="col" class="border-0 bg-light">
                <div class="py-2 text-uppercase">Unit price (HT)</div>
              </th>
              <th scope="col" class="border-0 bg-light">
                <div class="py-2 text-uppercase">Quantity</div>
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($products as $salableProduct)
            <tr>
              <th scope="row" class="border-0">
                <div class="p-2">
                  <img src="{{asset($salableProduct->image)}}" alt="" width="100" class="img-fluid rounded shadow-sm">
                  <div class="ml-3 d-inline-block align-middle">
                    <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle">{{$salableProduct->name}}</a></h5>
                  </div>
                </div>
              </th>
              <td class="border-0 align-middle"><strong>{{$salableProduct->getPrice()}}</strong></td>
              <td class="border-0 align-middle">
                <div>{{$salableProduct->qty}}</div>
              </td>
            </tr>
            @endforeach
            <tr>
              <td>Total (TTC)</td>
              <td>{{$amount}}</td>
            </tr>
          </tbody>
        </table>
      </div>

  
@endsection
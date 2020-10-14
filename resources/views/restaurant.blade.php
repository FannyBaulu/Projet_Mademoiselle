@extends('./layouts/header')
@section('stylesheet')
<link href="{{asset('css/restaurant.css')}}" rel='stylesheet'>
@endsection
@section('content')
<section class="page-section cta">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <div class="cta-inner text-center rounded">
                    <h2 class="section-heading mb-5">
                        <span class="section-heading-upper">Come On In</span>
                        <span class="section-heading-lower">We're Open</span>
                    </h2>
                    <ul class="list-unstyled list-hours mb-5 text-left mx-auto">
                        <li class="list-unstyled-item list-hours-item d-flex">
                            Sunday
                            <span class="ml-auto">Closed</span>
                        </li>
                        <li class="list-unstyled-item list-hours-item d-flex">
                            Monday
                            <span class="ml-auto">7:00 AM to 8:00 PM</span>
                        </li>
                        <li class="list-unstyled-item list-hours-item d-flex">
                            Tuesday
                            <span class="ml-auto">7:00 AM to 8:00 PM</span>
                        </li>
                        <li class="list-unstyled-item list-hours-item d-flex">
                            Wednesday
                            <span class="ml-auto">7:00 AM to 8:00 PM</span>
                        </li>
                        <li class="list-unstyled-item list-hours-item d-flex">
                            Thursday
                            <span class="ml-auto">7:00 AM to 8:00 PM</span>
                        </li>
                        <li class="list-unstyled-item list-hours-item d-flex">
                            Friday
                            <span class="ml-auto">7:00 AM to 8:00 PM</span>
                        </li>
                        <li class="list-unstyled-item list-hours-item d-flex">
                            Saturday
                            <span class="ml-auto">9:00 AM to 5:00 PM</span>
                        </li>
                    </ul>
                    <p class="address mb-5">
                        <em>
                            <strong>Avenida do Brasil 95</strong>
                            <br>
                            Porto 4150-151 Portugal
                        </em>
                    </p>
                    <p class="mb-0">
                        <small>
                            <em>Call Anytime</em>
                        </small>
                        <br>
                        (317) 585-8468
                    </p>
                    <a role="button" id="pop" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal">See
                        Menu</a>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Our menu</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                              <img src="{{asset('images/Menu_Mademoiselle.jpg')}}" alt="" class="w-80">
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</section>
<section>


</section>
@endsection

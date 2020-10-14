@extends('./layouts/header')
@section('stylesheet')
<style type="text/css">
    #logo {
        margin-top: 30px;
        max-width: 15%;
    }

    .titleHome {
        font-weight: bold;
        margin-top: 20px;
        margin-bottom: 20px;
        font-size: large;
        color: black;
    }

    .contact_link {
        color: #f9ae64;
    }

    .contact_link:hover {
        color: #f9ae64;
    }

    .send,
    .send:hover {
        background-color: #f9ae64;
        border-color: #f9ae64;

    }

    .send:hover {
        opacity: 0.7;
    }

</style>
@endsection

@section('content')

<div class="content">
    <div id="ourStory">
        <img id="logo" src="../images/Mademoiselle-logo.svg">
        <div class="titleHome">OUR STORY</div>
        <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis neque laudantium architecto modi iste
            similique facere fugit tenetur mollitia deleniti porro sint quasi, vero, recusandae incidunt alias
            temporibus omnis culpa?<br>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Perspiciatis fugiat inventore accusamus animi
            saepe architecto sint quaerat nesciunt ab. Praesentium corrupti voluptas minima veniam dolore minus numquam
            quam facere doloribus!<br>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, similique recusandae nobis quam incidunt
            necessitatibus debitis! Consectetur id, nam sapiente veritatis eveniet ea dolorum, nisi, illo enim ipsum
            repellat sint?<br>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus blanditiis adipisci accusamus
            consectetur iste, atque perferendis veniam rerum repellat ea cumque illum enim rem saepe voluptatem dicta
            velit, mollitia repudiandae?<br>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A dolor hic perspiciatis saepe consequatur aperiam
            ad consectetur vel harum magnam, eligendi quis quas omnis. Officia quibusdam saepe voluptas a
            praesentium.<br>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Illo ducimus dolores soluta qui recusandae
            asperiores impedit corporis, harum natus ratione ad. Tempore nostrum saepe reprehenderit veniam qui minima!
            Accusamus, vero.<br></div>
    </div>
    <div id="feedback" class="d-flex flex-column align-items-center">

        <div class="titleHome">FEEDBACK</div>
        <div id="carouselExampleIndicators" class="carousel slide w-50 h-50" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                @for ($i = 1; $i < $carousels->count(); $i++)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"></li>
                    @endfor
            </ol>
            <div class="carousel-inner">
                @foreach ($carousels as $carousel)
                <div class="carousel-item {{$loop->first?'active':''}}">
                    <img class="d-block w-100" src="{{asset($carousel->image)}}" alt="First slide">
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="titleHome">CONTACT US</div>
    <section class="Material-contact-section section-padding section-dark">
        <div class="container">
            <div class="row">
                <!-- Section Titile -->
                <div class="col-md-12 wow animated fadeInLeft" data-wow-delay=".2s">
                    <h1 class="section-title">Love to Hear From You</h1>
                </div>
            </div>
            <div class="row">
                <!-- Section Titile -->
                <div class="col-md-6 mt-3 contact-widget-section2 wow animated fadeInLeft" data-wow-delay=".2s">
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page
                        when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                        distribution of letters, as opposed to using Content.</p>

                    <div class="find-widget">
                        Company: <a class="contact_link" href="https://hostriver.ro">Mademoiselle</a>
                    </div>
                    <div class="find-widget">
                        Address: <a class="contact_link" href="#">Avenida do Brasil 95, Porto 4150-151 Portugal</a>
                    </div>
                    <div class="find-widget">
                        Phone: <a class="contact_link" href="#">+351 22 016 0229</a>
                    </div>

                    <div class="find-widget">
                        Website: <a class="contact_link" href="https://uny.ro">www.mademoiselle-porto.com</a>
                    </div>
                    <div class="find-widget">
                        Program: <a class="contact_link" href="#">Mon to Sat: 07:30 AM - 8.00 PM</a>
                    </div>
                </div>
                <!-- contact form -->
                <div class="col-md-6 wow animated fadeInRight" data-wow-delay=".2s">
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{route('contact.store')}}" class="shake" role="form" method="post" id="contactForm"
                        name="contact-form" data-toggle="validator">
                        @csrf
                        <!-- Name -->
                        <div class="form-group label-floating">
                            <label class="control-label" for="name">Name</label>
                            <input class="form-control" id="name" type="text" name="name" required
                                data-error="Please enter your name">
                            <div class="help-block with-errors"></div>
                        </div>
                        <!-- email -->
                        <div class="form-group label-floating">
                            <label class="control-label" for="email">Email</label>
                            <input class="form-control" id="email" type="email" name="email" required
                                data-error="Please enter your Email">
                            <div class="help-block with-errors"></div>
                        </div>
                        <!-- Subject -->
                        <div class="form-group label-floating">
                            <label class="control-label">Subject</label>
                            <input class="form-control" id="msg_subject" type="text" name="subject" required
                                data-error="Please enter your message subject">
                            <div class="help-block with-errors"></div>
                        </div>
                        <!-- Message -->
                        <div class="form-group label-floating">
                            <label for="message" class="control-label">Message</label>
                            <textarea class="form-control" rows="3" id="message" name="message" required
                                data-error="Write your message"></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                        <!-- Form Submit -->
                        <div class="form-submit mt-5">
                            <button class="btn btn-primary send" type="submit" id="form-submit"> Send Message</button>
                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection


@extends('layouts/app')

@section('title',__(' Home'))

@section('content')

<style>
    /* Add any necessary styles for the contact section */
    #contactSection {
        margin-top: 500px;
        padding: 50px;
        background-color: #f2f2f2;
        text-align: center;
    }
</style>


    <!-- about section -->
    <section class="section pt-0" id="about">
        <!-- container -->
        <div class="container text-center">
            <!-- about wrapper -->
            <div class="about">
                <div class="about-img-holder">
                    <img src="assets/imgs/man.png" class="about-img"
                        alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                </div>
                <div class="about-caption">
                    <p class="section-subtitle">Who Am I ?</p>
                    <h2 class="section-title mb-3">About Me</h2>
                    <p>
                        {{$about[0]->short_description}}
                    </p>
                    <a href="{{ route('resume.download') }}" class="btn btn-rounded btn btn-outline-primary mt-4">Download Resume</a>

                </div>
            </div><!-- end of about wrapper -->
        </div><!-- end of container -->
    </section> <!-- end of about section -->

    <!-- service section -->
    <section class="section" id="service">
        <div class="container text-center">
            <p class="section-subtitle">What I Do ?</p>
            <h6 class="section-title mb-6">Service</h6>
            <!-- row -->
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="service-card">
                        <div class="body">
                            <img src="assets/imgs/pencil-case.svg"
                                alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page"
                                class="icon">
                            <h6 class="title">Ecommerce</h6>
                            <p class="subtitle">Labore velit culpa adipisci excepturi consequuntur itaque in nam
                                molestias dolorem iste quod.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-card">
                        <div class="body">
                            <img src="assets/imgs/responsive.svg"
                                alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page"
                                class="icon">
                            <h6 class="title">Sapiente</h6>
                            <p class="subtitle">Labore velit culpa adipisci excepturi consequuntur itaque in nam
                                molestias dolorem iste quod.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-card">
                        <div class="body">
                            <img src="assets/imgs/toolbox.svg"
                                alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page"
                                class="icon">
                            <h6 class="title">Placeat</h6>
                            <p class="subtitle">Labore velit culpa adipisci excepturi consequuntur itaque in nam
                                molestias dolorem iste quod.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-card">
                        <div class="body">
                            <img src="assets/imgs/analytics.svg"
                                alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page"
                                class="icon">
                            <h6 class="title">Iusto</h6>
                            <p class="subtitle">Labore velit culpa adipisci excepturi consequuntur itaque in nam
                                molestias dolorem iste quod.</p>
                        </div>
                    </div>
                </div>
            </div><!-- end of row -->
        </div>
    </section><!-- end of service section -->

    <!-- portfolio section -->
    <section class="section" id="portfolio">
        <div class="container text-center">
            <p class="section-subtitle">What I Did ?</p>
            <h6 class="section-title mb-6">Portfolio</h6>
            <!-- row -->
            <div class="row">
                <div class="col-md-4">
                    <a href="#" class="portfolio-card">
                        <img src="assets/imgs/folio-1.jpg" class="portfolio-card-img"
                            alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                        <span class="portfolio-card-overlay">
                            <span class="portfolio-card-caption">
                                <h4>Web Designing</h5>
                                    <p class="font-weight-normal">Category: Web Templates</p>
                            </span>
                        </span>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#" class="portfolio-card">
                        <img class="portfolio-card-img" src="assets/imgs/folio-2.jpg" class="img-responsive rounded"
                            alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                        <span class="portfolio-card-overlay">
                            <span class="portfolio-card-caption">
                                <h4>Web Designing</h5>
                                    <p class="font-weight-normal">Category: Web Templates</p>
                            </span>
                        </span>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#" class="portfolio-card">
                        <img class="portfolio-card-img" src="assets/imgs/folio-3.jpg" class="img-responsive rounded"
                            alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                        <span class="portfolio-card-overlay">
                            <span class="portfolio-card-caption">
                                <h4>Web Designing</h5>
                                    <p class="font-weight-normal">Category: Web Templates</p>
                            </span>
                        </span>
                    </a>
                </div>
            </div><!-- end of row -->
        </div><!-- end of container -->
    </section> <!-- end of portfolio section -->

    <!-- section -->
    <section class="section-sm bg-primary">
        <!-- container -->
        <div class="container text-center text-sm-left">
            <!-- row -->
            <div class="row align-items-center">
                <div class="col-sm offset-md-1 mb-4 mb-md-0">
                    <h6 class="title text-light">Want to work with me?</h6>
                    <p class="m-0 text-light">Always feel Free to Contact & Hire me</p>
                </div>
                <div class="col-sm offset-sm-2 offset-md-3">
                    <button id="scrollButton" data-target="{{ route('scroll.to.contact') }}" class="btn btn-lg my-font btn-light rounded">Hire Me</button>

                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </section> <!-- end of section -->

    <!-- testimonial section -->
    <section class="section" id="testmonial">
        <div class="container text-center">
            <p class="section-subtitle">What Think Client About Me ?</p>
            <h6 class="section-title mb-6">Testimonial</h6>

            <!-- row -->
            <div class="row">
                @foreach($testimonial as $test)
                <div class="col-md-6">
                    <div class="testimonial-card">
                        <div class="testimonial-card-img-holder ">
                            <img src="{{asset('uploads/testimonials/'.$test->image)}}" class="testimonial-card-img"
                                alt="no_image">
                        </div>
                        <div class="testimonial-card-body">
                            <p class="testimonial-card-subtitle">{!!$test->desc!!}</p>
                            <h6 class="testimonial-card-title">{{$test->title}}</h6>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div> <!-- end of container -->
    </section> <!-- end of testimonial section -->

    <!-- blog section -->


    <!-- contact section -->
    <section class="section" id="contactSection">
        <div class="container text-center" >
            <p class="section-subtitle">How can you communicate?</p>
            <h6 class="section-title mb-5">Contact Me</h6>
            <!-- contact form -->
            <form id = "contact" action="" class="contact-form col-md-10 col-lg-8 m-auto">
                @csrf
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <input type="text" size="50" class="form-control" placeholder="Your Name" name = "name" required>
                    </div>
                    <div class="form-group col-sm-6">
                        <input type="email" class="form-control" placeholder="Enter Email" name = "email" requried>
                    </div>
                    <div class="form-group col-sm-12">
                        <input type="text" class="form-control" placeholder="Enter Mobile no." name = "mobile" requried>
                    </div>
                    <div class="form-group col-sm-12">
                        <textarea name = "description" id="comment" rows="6" class="form-control"
                            placeholder="Write Something"></textarea>
                    </div>
                    <div class="form-group col-sm-12 mt-3 d-flex">
                        <input type="submit" value="Send Message" style = "margin:auto" class="btn btn-outline-primary rounded">
                        <div class="spinner-border SubmitButtonLoader" role="status" style="margin: 6px;width: 1rem;height: 1rem; display:none">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
            </form><!-- end of contact form -->
        </div><!-- end of container -->
    </section><!-- end of contact section -->
    
    <!-- footer -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<script>



$(document).ready(function() {

    
        $('#scrollButton').click(function(e) {
            e.preventDefault();

            $('html, body').animate({
                scrollTop: $('#contactSection').offset().top
            }, 1000);
        });
        
       
        $('#contact').submit(function(e) {
            e.preventDefault();
            $(`.SubmitButtonLoader`).css('display','block');
            var form = $(this);
            var formData = new FormData(form[0]);

            $.ajax({
                type: 'POST',
                url: '{{ route("submit.form") }}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                processData: false,
                contentType: false,
                data: formData,
               
                success: function(response) {
                    toastr.success(response.message);
                    $('#contact')[0].reset(); 
                    $(`.SubmitButtonLoader`).css('display','none');
                },

                error: function(xhr, status, error) {
                    toastr.error(xhr.responseText, 'Error');
                    $(`.SubmitButtonLoader`).css('display','none');

                }
            });
        });
});



</script>
    @endsection
   
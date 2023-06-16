<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Meyawo landing page.">
    <meta name="author" content="Devcrud">
    <title>Scripter</title>
    <!-- font icons -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
    <!-- Bootstrap + Meyawo main styles -->
    <link rel="stylesheet" href="assets/css/meyawo.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css"> --}}


</head>

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <!-- Page Navbar -->
    <nav class="custom-navbar" data-spy="affix" data-offset-top="20">
        <div class="container">
            <a class="logo" href="#">Scripter</a>
            <ul class="nav">
                <li class="item">
                    <a class="link" href="#home">@lang('app.home')</a>
                </li>
                <li class="item">
                    <a class="link" href="#about">@lang('app.about')</a>
                </li>
                <li class="item">
                    <a class="link" href="#portfolio">@lang('app.portfolio')</a>
                </li>
                <li class="item">
                    <a class="link" href="#testmonial">@lang('app.testimonial')</a>
                </li>
                <li class="item">
                    <a class="link" href="#contact">@lang('app.contact')</a>
                </li>
                <li class="item ml-md-3">
                    <a href="{{route('skills')}}" class="btn btn-primary">@lang('app.components')</a>
                </li>
                <li class="item ml-md-3">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="navbarDarkDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @lang('app.select') @lang('app.language')
                        </button>
    
                        <div class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                            <a class="dropdown-item language @if(App::getLocale() == 'en') active @endif" href="javascript:void(0);" data-lang="en">
                                <img class="img-fluid me-3 mr-2" src="{{ asset('images/flag/english.png') }}" alt="" >English @if(App::getLocale() == 'en')
                                <i class="fas fa-check"></i>@endif
                            </a>
                            <a class="dropdown-item language @if(App::getLocale() == 'sp') active @endif" href="javascript:void(0);" data-lang="sp">
                                <img class="img-fluid me-3 mr-2" src="{{ asset('images/flag/spanish.png') }}" alt="">
                                    Spanish @if(App::getLocale() == 'sp') <i class="fas fa-check"></i>@endif
                            </a>
                           
                           
                            <a class="dropdown-item language @if(App::getLocale() == 'fr') active @endif" href="javascript:void(0);" data-lang="fr">
                                <img style="max-width: 19%;" class="img-fluid me-3 mr-2" src="{{ asset('images/flag/france.png') }}" alt="">
                                    French  @if(App::getLocale() == 'fr') <i class="fas fa-check"></i>@endif
                            </a>
                            <a class="dropdown-item language @if(App::getLocale() == 'pt') active @endif" href="javascript:void(0);" data-lang="pt">
                                <img style="max-width: 19%;" class="img-fluid " src="{{ asset('images/flag/Portuguese.jpg') }}" alt="">
                                &nbsp;&nbsp;Portuguese  @if(App::getLocale() == 'pt') <i class="fas fa-check"></i>@endif
                            </a>
                        </div>
                        </div>              
                 </li>
            </ul>
            <a href="javascript:void(0)" id="nav-toggle" class="hamburger hamburger--elastic">
                <div class="hamburger-box">
                    <div class="hamburger-inner"></div>
                </div>
            </a>

          
           
        </div>
       
    </nav><!-- End of Page Navbar -->

   
  
   @yield('content')
      
    <!-- footer start -->
    <div class="container">
        <footer class="footer">
            <p class="mb-0">@lang('app.copyright')
                <script>document.write(new Date().getFullYear())</script> &copy; <a
                    href="http://www.devcrud.com">Scripter</a> 
            </p>
            <div class="social-links  m-auto ml-sm-auto">
                <a href="https://www.instagram.com/harsh_aggarwal_its_me/" class="link"><i class="ti-instagram"></i></a>
                <a href="https://www.facebook.com/profile.php?id=100028895341409" class="link"><i class="ti-facebook"></i></a>
                <a href="twitter.com" class="link"><i class="ti-twitter-alt"></i></a>
                <a href="google.com" class="link"><i class="ti-google"></i></a>
                {{-- <a href="javascript:void(0)" class="link"><i class="ti-pinterest-alt"></i></a>
                <a href="javascript:void(0)" class="link"><i class="ti-rss"></i></a> --}}

            </div>
        </footer>
    </div> <!-- end of page footer -->

    <!-- core  -->
    <script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- bootstrap 3 affix -->
    <script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- Meyawo js -->
    <script src="assets/js/meyawo.js"></script>

    <script>
        var botmanWidget = {
            placeholderText: 'Send your query',
            introMessage:"Hello, How can i help you ?",    
            aboutText:"Scripter",
            title:"Scripter Bot"
        };
        </script>
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>

    <script>
        language();
       function language(){
   
           $('.language').click(function() {
                   
               var lang = $(this).data('lang');
               var _token = $('input[name="_token"]').val();
           
               $.ajax({
                   type: "POST",
                   dataType: "json",
                   url:"{{route('language')}}",
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                   data: {
                       'lang': lang,
                   },
                   beforeSend: function() {
                       $('#preloader').css('display', 'block');
                   },
                   error: function(xhr, textStatus) {
   
                       if (xhr && xhr.responseJSON.message) {
                           sweetAlertMsg('error', xhr.status + ': ' + xhr.responseJSON.message);
                       } else {
                           sweetAlertMsg('error', xhr.status + ': ' + xhr.statusText);
                       }
                       $('#preloader').css('display', 'none');
                   },
                   success: function(data) {
                       $('#preloader').css('display', 'none');
                       if (data.reload) {
                           location.reload();
                       }else{
                        console.log('Invalid language selected.');
                       }
                   }
               });
           });
       }
       
   
   </script>

</body>

</html>
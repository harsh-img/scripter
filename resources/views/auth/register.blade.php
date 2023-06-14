<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | Ecommerce</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/css/admin_login.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="{{ asset('admin-assets/css/app.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" >
		
    <style>
 
        .modal-dialog-2{
            max-width: 589px;
            margin: 175px auto;
        }

        .modal-content{
            border: none;
        }
        
        .modal-header-2{
            border-bottom: none !important;
        }
        .table{
        border-color: #4f4c4c;
        }

        h4{
        color: green;
        }
        h6{
            color: green;
        }
        .not-box{
            color: red;
            font-size: 12px;
            font-weight: 500;
            text-align: center;
        }
        .table tbody td{
            font-size: 14px;
            font-weight: 500;
            text-align:center
        }
        .spinner-border-sm {
            width: 19px;
            height: 19px;
            border-width: 0.2em;
        }
        .right .submit {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #183883;
            border: 2px #183883 solid;
            margin: 10px 0;
            color: #fff;
            font-size: 20px;
            outline: none;
            font-weight: 600;
            border-radius: 20px;
            cursor: pointer;
            padding: 29px 12px 4px 19px;
        }

        

    </style>

</head>

<body>
    <div class="workSpace">
        <div class="avatar" style="background: white;">
            <div id="infinity">
               <img src="" style="margin-top: 28px;height: 90px" alt="">
            </div>
        </div>
        <div class="left">
            <img class="img-fluid" src="{{ asset('admin-assets/images/optishine.png') }}" alt="">
            <h1 class="logo">Welcome to Ecommerce</h1>
        </div>
        <div class="right">
            <form id="formsubmit" action="{{route('register')}}" method="post">
                @csrf
                <h1>Signup</h1>
                     <pre class="spinner-border spinner-border-sm"  style="color:black;font-size: 100%;position:absolute;top:22%;right:10%;display:none" id="chkReferralLoader"></pre>
                <p id="ReferralMessageSuccess" style="color:green"></p>
                <p id="ReferralMessageError" style="color:red"></p>
                <input class="input" type="text" placeholder="Enter your name" name="name" value="{{ old('name') }}"
                    required autocomplete="off">
                <input class="input" type="email" placeholder="Enter your email" name="email" value="{{ old('email') }}"
                    required autocomplete="off">
                <input class="input" type="tel" placeholder="Enter your mobile" onkeypress="return /[0-9 ]/i.test(event.key)"  maxLength="10" name="mobile" value="{{ old('mobile') }}"
                    required autocomplete="off">
                <input class="input" name="password" type="password" placeholder="Enter your password" required
                    autocomplete="off">
                <input class="input" name="password_confirmation" type="password" placeholder="Enter your confirm password" required
                    autocomplete="off">
                <div class="login-btn-box">
                    <button class="submit" id="formsubmitSubmit" style="display: flex;align-items: center;"> Sign-up Now &nbsp;&nbsp;&nbsp; <pre class="spinner-border spinner-border-sm"  style="color:white;font-size: 100%;position:relative;top:21%;right:7%;display:none" id="registerLoader"></pre></button>
                </div>
            </form>
            <div>
                <a href="{{url('login')}}" >Login</a>
            </div>
        </div>
    </div>
    <script src="{{ asset('admin-assets/js/app.min.js')}}"></script> 
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" id="theme-styles">

    <script>

        $("form#formsubmit").submit(function(e) {
 
            e.preventDefault();

            var formId = $(this).attr('id');
            var formAction = $(this).attr('action');

            $.ajax({
                url: formAction,
                data: new FormData(this),
                async: false,
                dataType: 'json',
                type: 'post',
                beforeSend: function() {
                    $('#registerLoader').css('display', 'inline-block');
                    $('#' + formId + 'Submit').prop('disabled', true);
                },
                error: function(xhr, textStatus) {

                    if (xhr && xhr.responseJSON.message) {
                    
                        swal({
                            title: "Error!",
                            icon: "error",
                            text: xhr.responseJSON.message, 
                            button: "OK",
                            closeOnClickOutside: false
                        }); 
 
                    } else {
                    
                        swal({
                            title: "Error!",
                            icon: "error",
                            text: xhr.statusText,
                            button: "OK",
                            closeOnClickOutside: false
                        }); 
                    }

                    $('#registerLoader').css('display', 'none');
                    $('#' + formId + 'Submit').prop('disabled', false);

                },
                success: function(data) {
                    
                    $('#registerLoader').css('display', 'none');
                    $('#' + formId + 'Submit').prop('disabled', false);

                    if(data.error == false){

                        $('#formsubmit')[0].reset();

                        swal.fire({
                            title: 'Success !',
                            icon: "success",
                            html: data.msg,
                            button: "OK",
                            closeOnClickOutside: false
                        });

                    }else{
                        swal.fire({
                            title: "Error!",
                            icon: "error",
                            text: data.msg,
                            button: "OK",
                            closeOnClickOutside: false
                        });
                    } 
                    
                },
                
                cache: false,
                contentType: false,
                processData: false,
                timeout: 5000
            });

        });
       

    </script>

    </body>
</html>
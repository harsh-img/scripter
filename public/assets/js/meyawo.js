/*!
=========================================================
* Meyawo Landing page
=========================================================

* Copyright: 2019 DevCRUD (https://devcrud.com)
* Licensed: (https://devcrud.com/licenses)
* Coded by www.devcrud.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
*/

// smooth scroll
$(document).ready(function(){
    $(".navbar .nav-link").on('click', function(event) {

        if (this.hash !== "") {

            event.preventDefault();

            var hash = this.hash;

            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 700, function(){
                window.location.hash = hash;
            });
        } 
    });
});

// navbar toggle
$('#nav-toggle').click(function(){
    $(this).toggleClass('is-active')
    $('ul.nav').toggleClass('show');
});

function showMsg(type, msg) {
    if (type == 'error') {
        $('.toast-body').html('<i class="fa fa-times-circle red"></i> ' + msg);
    } else if (type == 'success') {
        $('.toast-body').html('<i class="fa fa-check-circle green"></i> ' + msg);
    } else {
        $('.toast-body').html('<i class="fa fa-exclamation-circle warning"></i> ' + msg);
    }

    $(".toast").toast({ delay: 3000 });
    $('.toast').toast('show');
}
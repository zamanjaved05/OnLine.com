@extends('layout.layout')
@section('content')
<div>
    <br><br><br><br>
</div>

<div id="page-content">
    <!--Page Title-->
    <div class="page section-header text-center">
        <div class="page-title">
            <div class="wrapper"><h1 class="page-width">Contact Us</h1></div>
        </div>
    </div>
    <!--End Page Title-->
    <div class="map-section map">
        <iframe src="https://www.google.com/maps/embed?pb=" height="350" allowfullscreen></iframe>
        <div class="container">
            <div class="row">
                <div class="map-section__overlay-wrapper">
                    <div class="map-section__overlay">
                        <h3 class="h4">Our store</h3>
                        <div class="rte-setting">
                            <p>123 Fake St.<br>Toronto, Canada</p>
                            <p>Mon - Fri, 10am - 9pm<br>Saturday, 11am - 9pm<br>Sunday, 11am - 5pm</p>
                        </div>
                        <p><a href="https://maps.google.com/?daddr=80%20Spadina%20Ave,%20Toronto" class="btn btn--secondary btn--small" target="_blank">Get directions</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bredcrumbWrap">
        <div class="container breadcrumbs">
            <a href="index.html" title="Back to the home page">Home</a><span aria-hidden="true">›</span><span>Contact Us</span>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-8 col-lg-8 mb-4">
                <h2>Drop Us A Line</h2>
                <p>Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão. O Lorem Ipsum tem vindo a ser o texto padrão usado por estas indústrias desde o ano de 1500 </p>
                <div class="formFeilds contact-form form-vertical">
                    <form action="http://annimexweb.com/items/belle/assets/php/mail.php" method="post"  id="contact_form" class="contact-form">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input type="text" id="ContactFormName" name="name" placeholder="Name" value="" required="">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input type="email" id="ContactFormEmail" name="email" placeholder="Email" value="" required="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input required="" type="tel" id="ContactFormPhone" name="phone" pattern="[0-9\-]*" placeholder="Phone Number" value="">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <input required="" type="text" id="ContactSubject" name="subject" placeholder="Subject" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <textarea required="" rows="10" id="ContactFormMessage" name="message" placeholder="Your Message"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <input type="submit" class="btn" value="Send Message">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                <div class="open-hours">
                    <strong>Opening Hours</strong><br>
                    Mon - Sat : 9am - 11pm<br>
                    Sunday: 11am - 5pm
                </div>
                <hr />
                <ul class="addressFooter">
                    <li><i class="icon anm anm-map-marker-al"></i><p>55 Gallaxy Enque, 2568 steet, 23568 NY</p></li>
                    <li class="phone"><i class="icon anm anm-phone-s"></i><p>(440) 000 000 0000</p></li>
                    <li class="email"><i class="icon anm anm-envelope-l"></i><p>sales@yousite.com</p></li>
                </ul>
                <hr />
                <ul class="list--inline site-footer__social-icons social-icons">
                    <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Facebook"><i class="icon icon-facebook"></i></a></li>
                    <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Twitter"><i class="icon icon-twitter"></i> <span class="icon__fallback-text">Twitter</span></a></li>
                    <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Pinterest"><i class="icon icon-pinterest"></i> <span class="icon__fallback-text">Pinterest</span></a></li>
                    <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Instagram"><i class="icon icon-instagram"></i> <span class="icon__fallback-text">Instagram</span></a></li>
                    <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Tumblr"><i class="icon icon-tumblr-alt"></i> <span class="icon__fallback-text">Tumblr</span></a></li>
                    <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on YouTube"><i class="icon icon-youtube"></i> <span class="icon__fallback-text">YouTube</span></a></li>
                    <li><a class="social-icons__link" href="#" target="_blank" title="Belle Multipurpose Bootstrap 4 Template on Vimeo"><i class="icon icon-vimeo-alt"></i> <span class="icon__fallback-text">Vimeo</span></a></li>
                </ul>
            </div>
        </div>
    </div>

</div>
















    {{--contact us
<style>
    @import url("https://fonts.googleapis.com/css?family=Open+Sans:400,700");

    /* RESET RULES
    –––––––––––––––––––––––––––––––––––––––––––––––––– */
    :root {
        --white: #afafaf;
        --red: #e31b23;
        --bodyColor: #292a2b;
        --borderFormEls: hsl(0, 0%, 10%);
        --bgFormEls: hsl(0, 0%, 14%);
        --bgFormElsFocus: hsl(0, 7%, 20%);
    }

    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        outline: none;
    }

    a {
        color: inherit;
    }

    input,
    select,
    textarea,
    button {
        font-family: inherit;
        font-size: 100%;
    }

    button,
    label {
        cursor: pointer;
    }

    select {
        appearance: none;
    }

    /* Remove native arrow on IE */
    select::-ms-expand {
        display: none;
    }

    /*Remove dotted outline from selected option on Firefox*/
    /*https://stackoverflow.com/questions/3773430/remove-outline-from-select-box-in-ff/18853002#18853002*/
    /*We use !important to override the color set for the select on line 99*/
    select:-moz-focusring {
        color: transparent !important;
        text-shadow: 0 0 0 var(--white);
    }

    textarea {
        resize: none;
    }

    ul {
        list-style: none;
    }

    body {
        font: 18px/1.5 "Open Sans", sans-serif;
        background: var(--bodyColor);
        color: var(--white);
        margin: 1.5rem 0;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 0 1.5rem;
    }


    /* FORM ELEMENTS
    –––––––––––––––––––––––––––––––––––––––––––––––––– */
    .my-form h1 {
        margin-bottom: 1.5rem;
    }

    .my-form li,
    .my-form .grid > *:not(:last-child) {
        margin-bottom: 1.5rem;
    }

    .my-form select,
    .my-form input,
    .my-form textarea,
    .my-form button {
        width: 100%;
        line-height: 1.5;
        padding: 15px 10px;
        border: 1px solid var(--borderFormEls);
        color: var(--white);
        background: var(--bgFormEls);
        transition: background-color 0.3s cubic-bezier(0.57, 0.21, 0.69, 1.25),
        transform 0.3s cubic-bezier(0.57, 0.21, 0.69, 1.25);
    }

    .my-form textarea {
        height: 170px;
    }

    .my-form ::placeholder {
        color: inherit;
        /*Fix opacity issue on Firefox*/
        opacity: 1;
    }

    .my-form select:focus,
    .my-form input:focus,
    .my-form textarea:focus,
    .my-form button:enabled:hover,
    .my-form button:focus,
    .my-form input[type="checkbox"]:focus + label {
        background: var(--bgFormElsFocus);
    }

    .my-form select:focus,
    .my-form input:focus,
    .my-form textarea:focus {
        transform: scale(1.02);
    }

    .my-form *:required,
    .my-form select {
        background-repeat: no-repeat;
        background-position: center right 12px;
        background-size: 15px 15px;
    }

    .my-form *:required {
        background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/asterisk.svg);
    }

    .my-form select {
        background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/down.svg);
    }

    .my-form *:disabled {
        cursor: default;
        filter: blur(2px);
    }


    /* FORM BTNS
    –––––––––––––––––––––––––––––––––––––––––––––––––– */
    .my-form .required-msg {
        display: none;
        background: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/asterisk.svg)
        no-repeat center left / 15px 15px;
        padding-left: 20px;
    }

    .my-form .btn-grid {
        position: relative;
        overflow: hidden;
        transition: filter 0.2s;
    }

    .my-form button {
        font-weight: bold;
    }

    .my-form button > * {
        display: inline-block;
        width: 100%;
        transition: transform 0.4s ease-in-out;
    }

    .my-form button .back {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-110%, -50%);
    }

    .my-form button:enabled:hover .back,
    .my-form button:focus .back {
        transform: translate(-50%, -50%);
    }

    .my-form button:enabled:hover .front,
    .my-form button:focus .front {
        transform: translateX(110%);
    }


    /* CUSTOM CHECKBOX
    –––––––––––––––––––––––––––––––––––––––––––––––––– */
    .my-form input[type="checkbox"] {
        position: absolute;
        left: -9999px;
    }

    .my-form input[type="checkbox"] + label {
        position: relative;
        display: inline-block;
        padding-left: 2rem;
        transition: background 0.3s cubic-bezier(0.57, 0.21, 0.69, 1.25);
    }

    .my-form input[type="checkbox"] + label::before,
    .my-form input[type="checkbox"] + label::after {
        content: '';
        position: absolute;
    }

    .my-form input[type="checkbox"] + label::before {
        left: 0;
        top: 6px;
        width: 18px;
        height: 18px;
        border: 2px solid var(--white);
    }

    .my-form input[type="checkbox"]:checked + label::before {
        background: var(--red);
    }

    .my-form input[type="checkbox"]:checked + label::after {
        left: 7px;
        top: 7px;
        width: 6px;
        height: 14px;
        border-bottom: 2px solid var(--white);
        border-right: 2px solid var(--white);
        transform: rotate(45deg);
    }


    /* FOOTER
    –––––––––––––––––––––––––––––––––––––––––––––––––– */
    footer {
        font-size: 1rem;
        text-align: right;
        backface-visibility: hidden;
    }

    footer a {
        text-decoration: none;
    }

    footer span {
        color: var(--red);
    }


    /* MQ
    –––––––––––––––––––––––––––––––––––––––––––––––––– */
    @media screen and (min-width: 600px) {
        .my-form .grid {
            display: grid;
            grid-gap: 1.5rem;
        }

        .my-form .grid-2 {
            grid-template-columns: 1fr 1fr;
        }

        .my-form .grid-3 {
            grid-template-columns: auto auto auto;
            align-items: center;
        }

        .my-form .grid > *:not(:last-child) {
            margin-bottom: 0;
        }

        .my-form .required-msg {
            display: block;
        }
    }

    @media screen and (min-width: 541px) {
        .my-form input[type="checkbox"] + label::before {
            top: 50%;
            transform: translateY(-50%);
        }

        .my-form input[type="checkbox"]:checked + label::after {
            top: 3px;
        }
    }
</style>
<form class="my-form">
    <div class="container">
        <h1>Get in touch!</h1>
        <ul>
            <li>
                <select>
                    <option selected disabled>-- Please choose an option --</option>
                    <option>Request Quote</option>
                    <option>Send Resume</option>
                    <option>Other</option>
                </select>
            </li>
            <li>
                <div class="grid grid-2">
                    <input type="text" placeholder="Name" required>
                    <input type="text" placeholder="Surname" required>
                </div>
            </li>
            <li>
                <div class="grid grid-2">
                    <input type="email" placeholder="Email" required>
                    <input type="tel" placeholder="Phone">
                </div>
            </li>
            <li>
                <textarea placeholder="Message"></textarea>
            </li>
            <li>
                <input type="checkbox" id="terms">
                <label for="terms">I have read and agreed with <a href="">the terms and conditions.</a></label>
            </li>
            <li>
                <div class="grid grid-3">
                    <div class="required-msg">REQUIRED FIELDS</div>
                    <button class="btn-grid" type="submit" disabled>
            <span class="back">
              <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/email-icon.svg" alt="">
            </span>
                        <span class="front">SUBMIT</span>
                    </button>
                    <button class="btn-grid" type="reset" disabled>
            <span class="back">
              <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/eraser-icon.svg" alt="">
            </span>
                        <span class="front">RESET</span>
                    </button>
                </div>
            </li>
        </ul>
    </div>
</form>
<footer>
    <div class="container">
        <small>Made with <span>❤</span> by <a href="http://georgemartsoukos.com/" target="_blank">George Martsoukos</a>
        </small>
    </div>
</footer>


<script>
    const checkbox = document.querySelector('.my-form input[type="checkbox"]');
    const btns = document.querySelectorAll(".my-form button");

    checkbox.addEventListener("change", function() {
        const checked = this.checked;
        for (const btn of btns) {
            checked ? (btn.disabled = false) : (btn.disabled = true);
        }
    });
</script>
endus
 secondForm--}}

{{--<style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800,900|Rubik:300,400,500,700,900');

    * {
        -webkit-font-smoothing: antialiased;
        -webkit-text-shadow: rgba(0, 0, 0, .01) 0 0 1px;
        text-shadow: rgba(0, 0, 0, .01) 0 0 1px
    }

    div {
        display: block;
        position: relative;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: 'Rubik', sans-serif;
        font-weight: 500;
        -webkit-font-smoothing: antialiased;
        -webkit-text-shadow: rgba(0, 0, 0, .01) 0 0 1px;
        text-shadow: rgba(0, 0, 0, .01) 0 0 1px
    }

    .button {
        display: inline-block;
        background: #97cbfa;
        border-radius: 5px;
        height: 48px;
        -webkit-transition: all 200ms ease;
        -moz-transition: all 200ms ease;
        -ms-transition: all 200ms ease;
        -o-transition: all 200ms ease;
        transition: all 200ms ease
    }

    .button a {
        display: block;
        font-size: 18px;
        font-weight: 400;
        line-height: 48px;
        color: #FFFFFF;
        padding-left: 35px;
        padding-right: 35px
    }

    .button:hover {
        opacity: 0.8
    }

    .contact_info {
        width: 100%;
        padding-top: 70px
    }

    .contact_info_item {
        width: calc((100% - 60px) / 3);
        height: 100px;
        border: solid 1px #e8e8e8;
        box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
        padding-left: 32px;
        padding-right: 15px
    }

    .contact_info_image {
        width: 35px;
        height: 35px;
        text-align: center
    }

    .contact_info_image img {
        max-width: 100%
    }

    .contact_info_content {
        padding-left: 17px
    }

    .contact_info_title {
        font-weight: 500
    }

    .contact_info_text {
        font-size: 12px;
        color: rgba(0, 0, 0, 0.5)
    }

    .contact_form {
        padding-top: 85px
    }

    .contact_form_container {}

    .contact_form_title {
        font-size: 30px;
        font-weight: 500;
        margin-bottom: 37px
    }

    .contact_form_inputs {
        margin-bottom: 30px
    }

    .input_field {
        width: calc((100% - 60px) / 3);
        height: 50px;
        padding-left: 25px;
        border: solid 1px #e5e5e5;
        border-radius: 5px;
        outline: none;
        color: #0e8ce4;
        -webkit-transition: all 200ms ease;
        -moz-transition: all 200ms ease;
        -ms-transition: all 200ms ease;
        -o-transition: all 200ms ease;
        transition: all 200ms ease
    }

    .input_field:focus,
    .text_field:focus {
        border-color: #b2b2b2
    }

    .input_field:hover,
    .text_field:hover {
        border-color: #b2b2b2
    }

    .input_field::-webkit-input-placeholder,
    .text_field::-webkit-input-placeholder {
        font-size: 16px;
        font-weight: 400;
        color: rgba(0, 0, 0, 0.3)
    }

    .input_field:-moz-placeholder,
    .text_field:-moz-placeholder {
        font-size: 16px;
        font-weight: 400;
        color: rgba(0, 0, 0, 0.3)
    }

    .input_field::-moz-placeholder,
    .text_field::-moz-placeholder {
        font-size: 16px;
        font-weight: 400;
        color: rgba(0, 0, 0, 0.3)
    }

    .input_field:-ms-input-placeholder,
    .text_field:-ms-input-placeholder {
        font-size: 16px;
        font-weight: 400;
        color: rgba(0, 0, 0, 0.3)
    }

    .input_field::input-placeholder,
    .text_field::input-placeholder {
        font-size: 16px;
        font-weight: 400;
        color: rgba(0, 0, 0, 0.3)
    }

    .text_field {
        width: 100%;
        height: 160px;
        padding-left: 25px;
        padding-top: 15px;
        border: solid 1px #e5e5e5;
        border-radius: 5px;
        color: #0e8ce4;
        outline: none;
        -webkit-transition: all 200ms ease;
        -moz-transition: all 200ms ease;
        -ms-transition: all 200ms ease;
        -o-transition: all 200ms ease;
        transition: all 200ms ease
    }

    .contact_submit_button {
        padding-left: 35px;
        padding-right: 35px;
        color: #FFFFFF;
        font-size: 18px;
        border: none;
        outline: none;
        cursor: pointer;
        margin-top: 24px
    }

    .panel {
        width: 100%;
        height: 50px;
        background: #fafafa;
        margin-top: 120px
    }

    @media only screen and (max-width: 991px) {
        .contact_info_item {
            width: 100%;
            margin-bottom: 30px
        }

        .contact_info_item:last-child {
            margin-bottom: 0px
        }
    }

    @media only screen and (max-width: 767px) {
        .input_field {
            margin-bottom: 30px;
            width: 100%
        }

        .input_field:last-child {
            margin-bottom: 0px
        }
    }

    @media only screen and (max-width: 575px) {
        .contact_submit_button {
            font-size: 13px;
            padding-left: 25px;
            padding-right: 25px
        }
    }
</style>
<div style="background-image: url('https://thumbs.gfycat.com/UntidySickHairstreak-size_restricted.gif')">
<div class="contact_info">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="contact_info_container d-flex flex-lg-row flex-column justify-content-between align-items-between">
                    <!-- Contact Item -->
                    <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                        <div class="contact_info_image"><img src="https://img.icons8.com/office/24/000000/iphone.png" alt=""></div>
                        <div class="contact_info_content">
                            <div class="contact_info_title">Phone</div>
                            <div class="contact_info_text">+91 9876 543 2198</div>
                        </div>
                    </div> <!-- Contact Item -->
                    <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                        <div class="contact_info_image"><img src="https://img.icons8.com/ultraviolet/24/000000/filled-message.png" alt=""></div>
                        <div class="contact_info_content">
                            <div class="contact_info_title">Email</div>
                            <div class="contact_info_text">contact@bbbootstrap.com</div>
                        </div>
                    </div> <!-- Contact Item -->
                    <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                        <div class="contact_info_image"><img src="https://img.icons8.com/ultraviolet/24/000000/map-marker.png" alt=""></div>
                        <div class="contact_info_content">
                            <div class="contact_info_title">Address</div>
                            <div class="contact_info_text">298,Menlo Park,CA,USA</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact Form -->
<div class="contact_form">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="contact_form_container">
                    <div class="contact_form_title">Get in Touch</div>
                    <form action="#" id="contact_form">
                        <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between"> <input type="text" id="contact_form_name" class="contact_form_name input_field" placeholder="Your name" required="required" data-error="Name is required."> <input type="text" id="contact_form_email" class="contact_form_email input_field" placeholder="Your email" required="required" data-error="Email is required."> <input type="text" id="contact_form_phone" class="contact_form_phone input_field" placeholder="Your phone number"> </div>
                        <div class="contact_form_text"> <textarea id="contact_form_message" class="text_field contact_form_message" name="message" rows="4" placeholder="Message" required="required" data-error="Please, write us a message."></textarea> </div>
                        <div class="contact_form_button"> <button type="submit" class="button contact_submit_button">Send Message</button> </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="panel"></div>
</div>
</div>
    --}}{{--endForm--}}{{--
--}}{{--    effect--}}{{--
    --}}{{--endef--}}
@endsection

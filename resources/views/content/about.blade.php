@extends('layout.layout')

@section('content')




{{----}}
<br><br><br><br>
        <!--Page Title-->
        <div class="page section-header text-center">
            <div class="page-title">
                <div class="wrapper"><h1 class="page-width">About Us</h1></div>
            </div>
        </div>
        <!--End Page Title-->

        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
                    <div class="text-center mb-4">
                        <h2 class="h2">Belle Multipurpose Bootstrap 4 Html Template</h2>
                        <div class="rte-setting">
                            <p><strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</strong></p>
                            <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-4 col-md-4 col-lg-4 mb-4"><img class="blur-up lazyload" data-src="assets/images/about3.jpg" src="assets/images/about3.jpg" alt="About Us" /></div>
                <div class="col-12 col-sm-4 col-md-4 col-lg-4 mb-4"><img class="blur-up lazyload" data-src="assets/images/about2.jpg" src="assets/images/about2.jpg" alt="About Us" /></div>
                <div class="col-12 col-sm-4 col-md-4 col-lg-4 mb-4"><img class="blur-up lazyload" data-src="assets/images/about3.jpg" src="assets/images/about3.jpg" alt="About Us" /></div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h2>Sed ut perspiciatis unde omnis iste natus error</h2>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain.</p>
                    <p>simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted.</p>
                    <p></p>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-4">
                    <h2 class="h2">About Annimex Web</h2>
                    <div class="rte-setting"><p><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</strong></p>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                        <p></p>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p></div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <h2 class="h2">Contact Us</h2>
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
{{----}}


<!--slide-->
<br><br>
<style>
    @import url("https://fonts.googleapis.com/css?family=Roboto:400,400i,700");



    .circle {
        border-radius: 50%;
        width: 200px;
        height: 200px;
        overflow: hidden;
        position: relative;
        border: 8px solid #423c3c;
        transform: scale(1);
        transition: transform 0.3s;
        margin: 20px;
        /***Flip card section***/
    }
    .circle__row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        align-items: center;
    }
    .circle--text {
        display: flex;
        opacity: 0;
        border-radius: 50%;
        background-color: rgba(0, 0, 0, 0.6);
        color: white;
        text-align: center;
        justify-content: center;
        align-items: center;
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        padding: 10px;
        transition: opacity 0.5s;
    }
    .circle--btn {
        display: block;
    }
    .circle:hover {
        transform: scale(1.1);
        transition: transform 0.2s;
        border-top-color:#f60257;
        border-left-color: #f60257;
        border-bottom-color:#f60257;
        border-right-color:#f60257;
        transition: transform 0.2s, border-top-color 0.18s linear, border-left-color 0.18s linear 0.1s, border-bottom-color 0.18s linear 0.2s, border-right-color 0.18s linear 0.15s;
    }
    .circle:hover .circle--text {
        opacity: 1;
    }
</style>
<div class="page section-header text-center">
    <div class="page-title">
        <div class="wrapper"><h1 class="page-width">Our Team</h1></div>
    </div>
</div>
    <div class="circle__row">
        <div class="circle">
            <img class="circle--image" src="{{asset('logo/noname1.png')}}" />
            <div class="circle--text">
                Comming Soon....</div>
        </div>
        <div class="circle">
            <img class="circle--image" src="{{asset('logo/noname.png')}}" />
            <div class="circle--text">
                Comming Soon....</div>
        </div>
        <div class="circle">
            <img class="circle--image" src="{{asset('logo/noname1.png')}}" />
            <div class="circle--text">
                Comming Soon....</div>
        </div>
    </div>
</div>
<!-- endslide   -->





















    <!--round-->
 {{--   <style>
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {}
        a,
        a:hover,
        a:focus,
        a:active {
            text-decoration: none;
            outline: none;
        }

        a,
        a:active,
        a:focus {
            color: #333;
            text-decoration: none;
            transition-timing-function: ease-in-out;
            -ms-transition-timing-function: ease-in-out;
            -moz-transition-timing-function: ease-in-out;
            -webkit-transition-timing-function: ease-in-out;
            -o-transition-timing-function: ease-in-out;
            transition-duration: .2s;
            -ms-transition-duration: .2s;
            -moz-transition-duration: .2s;
            -webkit-transition-duration: .2s;
            -o-transition-duration: .2s;
        }

        ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        img {
            max-width: 100%;
            height: auto;
        }
        span, a, a:hover {
            display: inline-block;
            text-decoration: none;
            color: inherit;
        }
        .section-head {
            margin-bottom: 60px;
        }
        .section-head h4 {
            position: relative;
            padding:0;
            color:#f60257;
            line-height: 1;
            letter-spacing:0.3px;
            font-size: 34px;
            font-weight: 700;
            text-align:center;
            text-transform:none;
            margin-bottom:30px;
        }
        .section-head h4:before {
            content: '';
            width: 60px;
            height: 3px;
            background: #f60257;
            position: absolute;
            left: 0px;
            bottom: -10px;
            right:0;
            margin:0 auto;
        }
        .section-head h4 span {
            font-weight: 700;
            padding-bottom: 5px;
            color:#2f2f2f
        }
        p.service_text{
            color:#cccccc !important;
            font-size:16px;
            line-height:28px;
            text-align:center;
        }
        .section-head p, p.awesome_line{
            color:#818181;
            font-size:16px;
            line-height:28px;
            text-align:center;
        }

        .extra-text {
            font-size:34px;
            font-weight: 700;
            color:#2f2f2f;
            margin-bottom: 25px;
            position:relative;
            text-transform: none;
        }
        .extra-text::before {
            content: '';
            width: 60px;
            height: 3px;
            background: #f60257;
            position: absolute;
            left: 0px;
            bottom: -10px;
            right: 0;
            margin: 0 auto;
        }
        .extra-text span {
            font-weight: 700;
            color:#f60257;
        }
        .item {
            background: #fff;
            text-align: center;
            padding: 30px 25px;
            -webkit-box-shadow:0 0px 25px rgba(0, 0, 0, 0.07);
            box-shadow:0 0px 25px rgba(0, 0, 0, 0.07);
            border-radius: 20px;
            border:5px solid rgba(0, 0, 0, 0.07);
            margin-bottom: 30px;
            /*-webkit-transition: all .5s ease 0;*/
            /*transition: all .5s ease 0;*/
            transition: all 0.5s ease 0s;
        }
        .item:hover{
            background: #e30b56;
            box-shadow:0 8px 20px 0px rgba(0, 0, 0, 0.2);
            /*-webkit-transition: all .5s ease 0;*/
            /*transition: all .5s ease 0;*/
            transition: all 0.5s ease 0s;
        }
        .item:hover .item, .item:hover span.icon{
            background:#fff;
            border-radius:10px;
            /*-webkit-transition: all .5s ease 0;*/
            /*transition: all .5s ease 0;*/
            transition: all 0.5s ease 0s;
        }
        .item:hover h6, .item:hover p{
            color:#fff;
            /*-webkit-transition: all .5s ease 0;*/
            /*transition: all .5s ease 0;*/
            transition: all 0.5s ease 0s;
        }
        .item .icon {
            font-size: 40px;
            margin-bottom:25px;
            color: #f60257;
            width: 90px;
            height: 90px;
            line-height: 96px;
            border-radius: 50px;
        }
        .item .feature_box_col_one{
            background:rgba(247, 198, 5, 0.20);
            color:#f60257
        }
        .item .feature_box_col_two{
            background:rgba(255, 77, 28, 0.15);
            color:#f60257
        }
        .item .feature_box_col_three{
            background:rgba(0, 147, 38, 0.15);
            color:#f60257
        }
        .item .feature_box_col_four{
            background:rgba(0, 108, 255, 0.15);
            color:#f60257
        }
        .item .feature_box_col_five{
            background:rgba(146, 39, 255, 0.15);
            color:#f60257
        }
        .item .feature_box_col_six{
            background:rgba(23, 39, 246, 0.15);
            color:#f60257
        }
        .item p{
            font-size:15px;
            line-height:26px;
        }
        .item h6 {
            margin-bottom:20px;
            color:#2f2f2f;
        }
        .mission p {
            margin-bottom: 10px;
            font-size: 15px;
            line-height: 28px;
            font-weight: 500;
        }
        .mission i {
            display: inline-block;
            width: 50px;
            height: 50px;
            line-height: 50px;
            text-align: center;
            background: #f60257;
            border-radius: 50%;
            color: #fff;
            font-size: 25px;
        }
        .mission .small-text {
            margin-left: 10px;
            font-size: 13px;
            color: #666;
        }
        .skills {
            padding-top:0px;
        }
        .skills .prog-item {
            margin-bottom: 25px;
        }
        .skills .prog-item:last-child {
            margin-bottom: 0;
        }
        .skills .prog-item p {
            font-weight: 500;
            font-size: 15px;
            margin-bottom: 10px;
        }
        .skills .prog-item .skills-progress {
            width: 100%;
            height: 10px;
            background: #e0e0e0;
            border-radius:20px;
            position: relative;
        }
        .skills .prog-item .skills-progress span {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            background: #bd486f;
            width: 10%;
            border-radius: 10px;
            -webkit-transition: all 1s;
            transition: all 1s;
        }
        .skills .prog-item .skills-progress span:after {
            content: attr(data-value);
            position: absolute;
            top: -5px;
            right: 0;
            font-size: 10px;
            font-weight:600;
            color: #fff;
            background:rgba(0, 0, 0, 0.9);
            padding: 3px 7px;
            border-radius: 30px;
        }
    </style>
    <div class="feat bg-gray pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="section-head col-sm-12">
                    <h4><span>Why Choose</span> Us?</h4>
                    <p>When you choose us, you'll feel the benefit of 10 years' experience of Web Development. Because we know the digital world and we know that how to handle it. With working knowledge of online, SEO and social media.</p>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="item"> <span class="icon feature_box_col_one"><i class="fa fa-globe"></i></span>
                        <h6>Modern Design</h6>
                        <p>We use latest technology for the latest world because we know the demand of peoples.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="item"> <span class="icon feature_box_col_two"><i class="fa fa-anchor"></i></span>
                        <h6>Creative Design</h6>
                        <p>We are always creative and and always lisen our costomers and we mix these two things and make beast design.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="item"> <span class="icon feature_box_col_three"><i class="fa fa-hourglass-half"></i></span>
                        <h6>24 x 7 User Support</h6>
                        <p>If our customer has any problem and any query we are always happy to help then.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="item"> <span class="icon feature_box_col_four"><i class="fa fa-database"></i></span>
                        <h6>Business Growth</h6>
                        <p>Everyone wants to live on top of the mountain, but all the happiness and growth occurs while you're climbing it</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="item"> <span class="icon feature_box_col_five"><i class="fa fa-upload"></i></span>
                        <h6>Market Strategy</h6>
                        <p>Holding back technology to preserve broken business models is like allowing blacksmiths to veto the internal combustion engine in order to protect their horseshoes.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="item"> <span class="icon feature_box_col_six"><i class="fa fa-camera"></i></span>
                        <h6>Affordable cost</h6>
                        <p>Love is a special word, and I use it only when I mean it. You say the word too much and it becomes cheap.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
    <!--round-->
    <!--  box  -->

    <!-- endbox  -->
@endsection

@extends('layout.layout')


@section('content')
    <br>
    <div id="page-content">
        <!--Page Title-->
        <div class="page section-header text-center">
            <div class="page-title">
                <div class="wrapper"><h1 class="page-width">Checkout</h1></div>
            </div>
        </div>
        <!--End Page Title-->
        <div>
            <div class="container-fluid pb-5" style="background: whitesmoke">
                {{--
                                <div class="py-2 text-center">
                                    <div style="color: #ff5e14;font-size:0px;">
                                        <center><img src="{{asset('logo/noname.png')}}" style="width: 80px;opacity: 50%" alt="">
                                        </center>
                                    </div>
                                    <br>
                                </div>
                --}}
                <div class="row">
                    <div class="col-lg-4">
                        <div class="your-order-payment">
                            <div class="your-order">
                                <h2 class="order-title mb-4">Your Order</h2>

                                <div class="table-responsive-sm order-table">
                                    <table class="bg-white table table-bordered table-hover text-center">
                                        <thead>
                                        <tr>
                                            <th class="text-left">Product Name</th>
                                            <th>image</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($cartItems as $item)
                                            <tr>
                                                <td class="text-left">{{ $item->name }}</td>
                                                <td style="width: 20%">
                                                    @if (File::exists(public_path("/image/products/".$item->attributes->image)))
                                                        <img src="{{asset('image/products/'.$item->attributes->image)}}"
                                                             style="width:120px" alt="NoName image"
                                                             title=""/>

                                                    @elseif(File::exists(public_path("/image/products1/image/".$item->attributes->image)))
                                                        <img
                                                            src="{{asset('image/products1/image/'.$item->attributes->image)}}"
                                                            style="width:120px" alt="NoName image" title=""/>

                                                    @elseif(File::exists(public_path("/image/cosmatics/image/".$item->attributes->image)))
                                                        <img
                                                            src="{{asset('image/cosmatics/image/'.$item->attributes->image)}}"
                                                            style="width:120px" alt="NoName image"
                                                            title=""/>
                                                    @elseif(File::exists(public_path("/storage/images/shoes/image/".$item->attributes->image)))
                                                        <img
                                                            src="{{asset('/storage/images/shoes/image/'.$item->attributes->image)}}"
                                                            style="width:120px" alt="NoName image"
                                                            title=""/>

                                                    @else
                                                        <img
                                                            src="{{asset('image/bags/image/'.$item->attributes->image)}}"
                                                            style="width:120px" alt="NoName image"
                                                            title=""/>

                                                    @endif

                                                </td>
                                                <td>${{ $item->price }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ $item->quantity  * $item->price}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot class="font-weight-600">
                                        <tr>
                                            <td colspan="4" class="text-right">Total</td>
                                            <td>
                                                <mark>${{ Cart::getTotal() }}</mark>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                            <hr/>


                        </div>
                    </div>
                    <div class="col-lg-8">
                        <h1 class="mb-3 mt-2 text-center" style="font-size: 20px">Billing address</h1>
                        <form class="needs-validation" action="{{url('checkoutstore')}}" method="post" novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">Name:</label>
                                    <input type="text" class="form-control" id="fname" name="name" placeholder="name"
                                           value="">
                                </div>

                                <div class="col-md-6 mb-3" hidden>
                                    <label for="firstName">stripeDescription:</label>
                                    <input type="text" class="form-control" id="description" name="description"
                                           placeholder="stripeDescription"
                                           value="@foreach ($cartItems as $item) | Name: {{$item->name}} | Price: {{$item->price }} | Quantity: {{$item->quantity.' ..'}}  @endforeach">

                                </div>


                                <div class="col-md-6 mb-3">
                                    <label for="lastName">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                           placeholder="email"
                                           value="">

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">address:</label>
                                    <input type="text" class="form-control" id="adr" name="address" placeholder=""
                                           value="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName">City:</label>
                                    <input type="text" class="form-control" id="city" name="city" placeholder=""
                                           value="">

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">State:</label>
                                    <input type="text" class="form-control" id="state" name="state" placeholder=""
                                           value="">

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName">Zip:</label>
                                    <input type="text" class="form-control" id="zip" name="zip" placeholder=""
                                           value="">

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">Phone:</label>
                                    <input type="text" class="form-control" id="cname" name="phone" placeholder=""
                                           value="">

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName">CardNumber:</label>
                                    <input type="number" class="form-control" id="ccnum" name="cnumber"
                                           size="10" placeholder="" value=""/>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="cc-expiration">Exp Month:</label>
                                    <input type="text" class="form-control" id="expmonth" name="ExpiryMonth"
                                           placeholder="">

                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="cc-cvv">Exp Year:</label>
                                    <input type="text" class="form-control" id="expyear" name="ExpiryYear"
                                           placeholder="">

                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="cc-cvv">CVV</label>
                                    <input type="text" class="form-control" id="cvc" name="cvc" placeholder="">

                                </div>
                                <div class="col-md-3 mb-3" hidden>
                                    <label for="cc-cvv">TotalPrice</label>
                                    <input type="text" class="form-control" value="{{ Cart::getTotal() }}" id="cvc"
                                           name="totalamount" placeholder="">

                                </div>

                            </div>
                            <hr class="mb-4">
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <br><br>






















    {{--   <div class="container">
           <div class="row">
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-3">
                   <div class="customer-box returning-customer">
                       <h3><i class="icon anm anm-user-al"></i> Returning customer? <a href="#customer-login"
                                                                                       id="customer"
                                                                                       class="text-white text-decoration-underline"
                                                                                       data-toggle="collapse">Click
                               here to login</a></h3>
                       <div id="customer-login" class="collapse customer-content">
                           <div class="customer-info">
                               <p class="coupon-text">If you have shopped with us before, please enter your details in
                                   the boxes below. If you are a new customer, please proceed to the Billing &amp;
                                   Shipping section.</p>
                               <form>
                                   <div class="row">
                                       <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                           <label for="exampleInputEmail1">Email address <span
                                                   class="required-f">*</span></label>
                                           <input type="email" class="no-margin" id="exampleInputEmail1">
                                       </div>
                                       <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                           <label for="exampleInputPassword1">Password <span
                                                   class="required-f">*</span></label>
                                           <input type="password" id="exampleInputPassword1">
                                       </div>
                                   </div>
                                   <div class="row">
                                       <div class="col-md-12">
                                           <div class="form-check width-100 margin-20px-bottom">
                                               <label class="form-check-label">
                                                   <input type="checkbox" class="form-check-input" value=""> Remember
                                                   me!
                                               </label>
                                               <a href="#" class="float-right">Forgot your password?</a>
                                           </div>
                                           <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                       </div>
                                   </div>
                               </form>
                           </div>
                       </div>
                   </div>
               </div>

               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-3">
                   <div class="customer-box customer-coupon">
                       <h3 class="font-15 xs-font-13"><i class="icon anm anm-gift-l"></i> Have a coupon? <a
                               href="#have-coupon" class="text-white text-decoration-underline" data-toggle="collapse">Click
                               here to enter your code</a></h3>
                       <div id="have-coupon" class="collapse coupon-checkout-content">
                           <div class="discount-coupon">
                               <div id="coupon" class="coupon-dec tab-pane active">
                                   <p class="margin-10px-bottom">Enter your coupon code if you have one.</p>
                                   <label class="required get" for="coupon-code"><span class="required-f">*</span>
                                       Coupon</label>
                                   <input id="coupon-code" required="" type="text" class="mb-3">
                                   <button class="coupon-btn btn" type="submit">Apply Coupon</button>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>

           <div class="row billing-fields">
               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 sm-margin-30px-bottom">
                   <div class="create-ac-content bg-light-gray padding-20px-all">
                       <form>
                           <fieldset>
                               <h2 class="login-title mb-3">Billing details</h2>
                               <div class="row">
                                   <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                       <label for="input-firstname">First Name <span
                                               class="required-f">*</span></label>
                                       <input name="firstname" value="" id="input-firstname" type="text">
                                   </div>
                                   <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                       <label for="input-lastname">Last Name <span class="required-f">*</span></label>
                                       <input name="lastname" value="" id="input-lastname" type="text">
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                       <label for="input-email">E-Mail <span class="required-f">*</span></label>
                                       <input name="email" value="" id="input-email" type="email">
                                   </div>
                                   <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                       <label for="input-telephone">Telephone <span class="required-f">*</span></label>
                                       <input name="telephone" value="" id="input-telephone" type="tel">
                                   </div>
                               </div>
                           </fieldset>

                           <fieldset>
                               <div class="row">
                                   <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                       <label for="input-company">Company</label>
                                       <input name="company" value="" id="input-company" type="text">
                                   </div>
                                   <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                       <label for="input-address-1">Address <span class="required-f">*</span></label>
                                       <input name="address_1" value="" id="input-address-1" type="text">
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                       <label for="input-address-2">Apartment <span class="required-f">*</span></label>
                                       <input name="address_2" value="" id="input-address-2" type="text">
                                   </div>
                                   <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                       <label for="input-city">City <span class="required-f">*</span></label>
                                       <input name="city" value="" id="input-city" type="text">
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                       <label for="input-postcode">Post Code <span class="required-f">*</span></label>
                                       <input name="postcode" value="" id="input-postcode" type="text">
                                   </div>
                                   <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                       <label for="input-country">Country <span class="required-f">*</span></label>
                                       <select name="country_id" id="input-country">
                                           <option value=""> --- Please Select ---</option>
                                           <option value="244">Aaland Islands</option>
                                           <option value="1">Afghanistan</option>
                                           <option value="2">Albania</option>
                                           <option value="3">Algeria</option>
                                           <option value="4">American Samoa</option>
                                           <option value="5">Andorra</option>
                                           <option value="6">Angola</option>
                                       </select>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                       <label for="input-zone">Region / State <span class="required-f">*</span></label>
                                       <select name="zone_id" id="input-zone">
                                           <option value=""> --- Please Select ---</option>
                                           <option value="3513">Aberdeen</option>
                                           <option value="3514">Aberdeenshire</option>
                                           <option value="3515">Anglesey</option>
                                           <option value="3516">Angus</option>
                                       </select>
                                   </div>
                               </div>
                           </fieldset>

                           <fieldset>
                               <div class="row">
                                   <div class="form-group form-check col-md-12 col-lg-12 col-xl-12">
                                       <label class="form-check-label padding-15px-left">
                                           <input type="checkbox" class="form-check-input" value=""><strong>Create an
                                               account ?</strong>
                                       </label>
                                   </div>
                               </div>
                           </fieldset>

                           <fieldset>
                               <div class="row">
                                   <div class="form-group col-md-12 col-lg-12 col-xl-12">
                                       <label for="input-company">Order Notes <span class="required-f">*</span></label>
                                       <textarea class="form-control resize-both" rows="3"></textarea>
                                   </div>
                               </div>
                           </fieldset>
                       </form>
                   </div>
               </div>


               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                   <div class="your-order-payment">
                       <div class="your-order">
                           <h2 class="order-title mb-4">Your Order</h2>

                           <div class="table-responsive-sm order-table">
                               <table class="bg-white table table-bordered table-hover text-center">
                                   <thead>
                                   <tr>
                                       <th class="text-left">Product Name</th>
                                       <th>image</th>
                                       <th>Price</th>
                                       <th>Qty</th>
                                       <th>Subtotal</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   @foreach ($cartItems as $item)
                                       <tr>
                                           <td class="text-left">{{ $item->name }}</td>
                                           <td><img src="/image/{{ $item->attributes->image }}" class="w-12" alt=""></td>
                                           <td>${{ $item->price }}</td>
                                           <td>{{ $item->quantity }}</td>
                                           <td>{{ $item->quantity  * $item->price}}</td>
                                       </tr>
                                   @endforeach
                                   </tbody>
                                   <tfoot class="font-weight-600">
                                   <tr>
                                       <td colspan="4" class="text-right">Total</td>
                                       <td>{{ Cart::getTotal() }}</td>
                                   </tr>
                                   </tfoot>
                               </table>
                           </div>
                       </div>

                       <hr/>

                       <div class="your-payment">
                           <h2 class="payment-title mb-3">payment method</h2>
                           <div class="payment-method">
                               <div class="payment-accordion">
                                   <div id="accordion" class="payment-section">
                                       --}}{{--       <div class="card mb-2">
                                                  <div class="card-header">
                                                      <a class="card-link" data-toggle="collapse" href="#collapseOne">Direct
                                                          Bank Transfer </a>
                                                  </div>
                                                  <div id="collapseOne" class="collapse" data-parent="#accordion">
                                                      <div class="card-body">
                                                          <p class="no-margin font-15">Make your payment directly into our
                                                              bank account. Please use your Order ID as the payment reference.
                                                              Your order won't be shipped until the funds have cleared in our
                                                              account.</p>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="card mb-2">
                                                  <div class="card-header">
                                                      <a class="collapsed card-link" data-toggle="collapse"
                                                         href="#collapseTwo">Cheque Payment</a>
                                                  </div>
                                                  <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                                      <div class="card-body">
                                                          <p class="no-margin font-15">Please send your cheque to Store Name,
                                                              Store Street, Store Town, Store State / County, Store
                                                              Postcode.</p>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="card margin-15px-bottom border-radius-none">
                                                  <div class="card-header">
                                                      <a class="collapsed card-link" data-toggle="collapse"
                                                         href="#collapseThree"> PayPal </a>
                                                  </div>
                                                  <div id="collapseThree" class="collapse" data-parent="#accordion">
                                                      <div class="card-body">
                                                          <p class="no-margin font-15">Pay via PayPal; you can pay with your
                                                              credit card if you don't have a PayPal account.</p>
                                                      </div>
                                                  </div>
                                              </div>--}}{{--
                                       <div class="card mb-2">
                                           <div class="card-header">
                                               <a class="collapsed card-link" data-toggle="collapse"
                                                  href="#collapseFour"> Payment Information </a>
                                           </div>
                                           <div id="collapseFour" class="collapse" data-parent="#accordion">
                                               <div class="card-body">
                                                   <fieldset>
                                                       <div class="row">
                                                           <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                               <label for="input-cardname">Name on Card <span
                                                                       class="required-f">*</span></label>
                                                               <input name="cardname" value="" placeholder="Card Name"
                                                                      id="input-cardname" class="form-control"
                                                                      type="text">
                                                           </div>
                                                           <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                               <label for="input-country">Credit Card Type <span
                                                                       class="required-f">*</span></label>
                                                               <select name="country_id" class="form-control">
                                                                   <option value=""> --- Please Select ---</option>
                                                                   <option value="1">American Express</option>
                                                                   <option value="2">Visa Card</option>
                                                                   <option value="3">Master Card</option>
                                                                   <option value="4">Discover Card</option>
                                                               </select>
                                                           </div>
                                                       </div>
                                                       <div class="row">
                                                           <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                               <label for="input-cardno">Credit Card Number <span
                                                                       class="required-f">*</span></label>
                                                               <input name="cardno" value=""
                                                                      placeholder="Credit Card Number"
                                                                      id="input-cardno" class="form-control"
                                                                      type="text">
                                                           </div>
                                                           <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                               <label for="input-cvv">CVV Code <span
                                                                       class="required-f">*</span></label>
                                                               <input name="cvv" value=""
                                                                      placeholder="Card Verification Number"
                                                                      id="input-cvv" class="form-control" type="text">
                                                           </div>
                                                       </div>
                                                       <div class="row">
                                                           <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                               <label>Expiration Date <span
                                                                       class="required-f">*</span></label>
                                                               <input type="date" name="exdate" class="form-control">
                                                           </div>
                                                           <div class="form-group col-md-6 col-lg-6 col-xl-6 required">
                                                               <img class="padding-25px-top xs-padding-5px-top"
                                                                    src="assets/images/payment-img.jpg" alt="card"
                                                                    title="card"/>
                                                           </div>
                                                       </div>
                                                   </fieldset>

                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>

                               <div class="order-button-payment">
                                   <button class="btn" value="Place order" type="submit">Place order</button>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   --}}













    {{--  --}}{{--checkout--}}{{--
      <div>
      <div class="container" style="background: whitesmoke">
          <div class="py-2 text-center">
              <div style="color: #ff5e14;font-size:0px;">
                  <center>  <img src="{{asset('logo/noname.png')}}" style="width: 80px;opacity: 50%" alt=""></center>
              </div><br>
          </div>

          <div class="row">
              <div class="col-md-4 order-md-2 mb-4">
                  <h4 class="d-flex justify-content-between align-items-center mb-3">
                      <span class="text-muted">Your cart</span>
                      <span class="badge badge-secondary badge-pill"> {{ Cart::getTotalQuantity()}}</span>
                  </h4>
                  <ul class="list-group mb-3">
                          @foreach ($cartItems as $item)
                      <li class="list-group-item d-flex justify-content-between lh-condensed">
                          <div>
                              <h6 class="my-0">{{ $item->name }}</h6>
                              <small class="text-muted">Brief description</small>
                          </div>
                          <span class="text-muted">{{ $item->quantity  * $item->price}}</span>
                      </li>
                          @endforeach
                              <li class="list-group-item d-flex justify-content-between">
                                                      <span>Total (USD)</span>
                                                      <strong>${{ Cart::getTotal() }}</strong>
                                                  </li>
                              --}}{{--                    <li class="list-group-item d-flex justify-content-between lh-condensed">--}}{{--
  --}}{{--                        <div>--}}{{--
  --}}{{--                            <h6 class="my-0">Second product</h6>--}}{{--
  --}}{{--                            <small class="text-muted">Brief description</small>--}}{{--
  --}}{{--                        </div>--}}{{--
  --}}{{--                        <span class="text-muted">$8</span>--}}{{--
  --}}{{--                    </li>--}}{{--
  --}}{{--                    <li class="list-group-item d-flex justify-content-between lh-condensed">--}}{{--
  --}}{{--                        <div>--}}{{--
  --}}{{--                            <h6 class="my-0">Third item</h6>--}}{{--
  --}}{{--                            <small class="text-muted">Brief description</small>--}}{{--
  --}}{{--                        </div>--}}{{--
  --}}{{--                        <span class="text-muted">$5</span>--}}{{--
  --}}{{--                    </li>--}}{{--
  --}}{{--                    <li class="list-group-item d-flex justify-content-between bg-light">--}}{{--
  --}}{{--                        <div class="text-success">--}}{{--
  --}}{{--                            <h6 class="my-0">Promo code</h6>--}}{{--
  --}}{{--                            <small>EXAMPLECODE</small>--}}{{--
  --}}{{--                        </div>--}}{{--
  --}}{{--                        <span class="text-success">-$5</span>--}}{{--
  --}}{{--                    </li>--}}{{--
  --}}{{--                    <li class="list-group-item d-flex justify-content-between">--}}{{--
  --}}{{--                        <span>Total (USD)</span>--}}{{--
  --}}{{--                        <strong>$20</strong>--}}{{--
  --}}{{--                    </li>--}}{{--
                  </ul>

                  <form class="card p-2">
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Promo code">
                          <div class="input-group-append">
                              <button type="submit" class="btn btn-secondary">Redeem</button>
                          </div>
                      </div>
                  </form>
              </div>
              <div class="col-md-8 order-md-1">
                  <h4 class="mb-3">Billing address</h4>
                  <form class="needs-validation" action="{{url('checkoutstore')}}" method="post" novalidate>
                      @csrf
                      <div class="row">
                          <div class="col-md-6 mb-3">
                              <label for="firstName">First name</label>
                              <input type="text" class="form-control"id="fname" name="name" placeholder="name" value="" required>
                              <div class="invalid-feedback">
                                  Valid first name is required.
                              </div>
                          </div>
                          <div class="col-md-6 mb-3">
                              <label for="lastName">email</label>
                              <input type="email" class="form-control"id="email" name="email" placeholder="email" value="" required>
                              <div class="invalid-feedback">
                                  Valid last name is required.
                              </div>
                          </div>
                          <div class="col-md-6 mb-3">
                              <label for="firstName">address</label>
                              <input type="text" class="form-control" id="adr" name="address" placeholder="" value="" required>
                              <div class="invalid-feedback">
                                  Valid first name is required.
                              </div>
                          </div>
                          <div class="col-md-6 mb-3">
                              <label for="lastName">city</label>
                              <input type="text" class="form-control"  id="city" name="city" placeholder="" value="" required>
                              <div class="invalid-feedback">
                                  Valid last name is required.
                              </div>
                          </div>
                          <div class="col-md-6 mb-3">
                              <label for="firstName">state</label>
                              <input type="text" class="form-control" id="state" name="state" placeholder="" value="" required>
                              <div class="invalid-feedback">
                                  Valid first name is required.
                              </div>
                          </div>
                          <div class="col-md-6 mb-3">
                              <label for="lastName">zip</label>
                              <input type="text" class="form-control" id="zip" name="zip" placeholder="" value="" required>
                              <div class="invalid-feedback">
                                  Valid last name is required.
                              </div>
                          </div>
                          <div class="col-md-6 mb-3">
                              <label for="firstName">phone</label>
                              <input type="text" class="form-control"  id="cname" name="phone" placeholder="" value="" required>
                              <div class="invalid-feedback">
                                  Valid first name is required.
                              </div>
                          </div>
                          <div class="col-md-6 mb-3">
                              <label for="lastName">cnumber</label>
                              <input type="text" class="form-control" id="ccnum" name="cnumber" placeholder="" value="" required>
                              <div class="invalid-feedback">
                                  Valid last name is required.
                              </div>
                          </div>
                      </div>





  --}}{{--                    <div class="mb-3">--}}{{--
  --}}{{--                        <label for="username">Username</label>--}}{{--
  --}}{{--                        <div class="input-group">--}}{{--
  --}}{{--                            <div class="input-group-prepend">--}}{{--
  --}}{{--                                <span class="input-group-text">@</span>--}}{{--
  --}}{{--                            </div>--}}{{--
  --}}{{--                            <input type="text" class="form-control" id="username" placeholder="Username" required>--}}{{--
  --}}{{--                            <div class="invalid-feedback" style="width: 100%;">--}}{{--
  --}}{{--                                Your username is required.--}}{{--
  --}}{{--                            </div>--}}{{--
  --}}{{--                        </div>--}}{{--
  --}}{{--                    </div>--}}{{--
  --}}{{--                    <div class="mb-3">--}}{{--
  --}}{{--                        <label for="email">Email <span class="text-muted">(Optional)</span></label>--}}{{--
  --}}{{--                        <input type="email" class="form-control" id="email" placeholder="you@example.com">--}}{{--
  --}}{{--                        <div class="invalid-feedback">--}}{{--
  --}}{{--                            Please enter a valid email address for shipping updates.--}}{{--
  --}}{{--                        </div>--}}{{--
  --}}{{--                    </div>--}}{{--

      --}}{{--                    <div class="mb-3">--}}{{--
      --}}{{--                        <label for="address">Address</label>--}}{{--
      --}}{{--                        <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>--}}{{--
      --}}{{--                        <div class="invalid-feedback">--}}{{--
      --}}{{--                            Please enter your shipping address.--}}{{--
      --}}{{--                        </div>--}}{{--
      --}}{{--                    </div>--}}{{--

      --}}{{--                    <div class="mb-3">--}}{{--
      --}}{{--                        <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>--}}{{--
      --}}{{--                        <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">--}}{{--
      --}}{{--                    </div>--}}{{--

  --}}{{--                    <div class="row">--}}{{--
  --}}{{--                        <div class="col-md-5 mb-3">--}}{{--
  --}}{{--                            <label for="country">Country</label>--}}{{--
  --}}{{--                            <input type="text" class="custom-select d-block w-100" id="country" required/>--}}{{--

  --}}{{--                        </div>--}}{{--
  --}}{{--                        <div class="col-md-4 mb-3">--}}{{--
  --}}{{--                            <label for="state">State</label>--}}{{--
  --}}{{--                            <select class="custom-select d-block w-100" id="state" required>--}}{{--
  --}}{{--                                <option value="">Choose...</option>--}}{{--
  --}}{{--                                <option>California</option>--}}{{--
  --}}{{--                            </select>--}}{{--
  --}}{{--                            <div class="invalid-feedback">--}}{{--
  --}}{{--                                Please provide a valid state.--}}{{--
  --}}{{--                            </div>--}}{{--
  --}}{{--                        </div>--}}{{--
  --}}{{--                        <div class="col-md-3 mb-3">--}}{{--
  --}}{{--                            <label for="zip">Zip</label>--}}{{--
  --}}{{--                            <input type="text" class="form-control" id="zip" placeholder="" required>--}}{{--
  --}}{{--                            <div class="invalid-feedback">--}}{{--
  --}}{{--                                Zip code required.--}}{{--
  --}}{{--                            </div>--}}{{--
  --}}{{--                        </div>--}}{{--
  --}}{{--                    </div>--}}{{--

                    --}}{{--  <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="same-address">
                          <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="save-info">
                          <label class="custom-control-label" for="save-info">Save this information for next time</label>
                      </div>
                      --}}{{--


  --}}{{--                    <h4 class="mb-3">Payment</h4>--}}{{--

  --}}{{--                    <div class="d-block my-3">--}}{{--
  --}}{{--                        <div class="custom-control custom-radio">--}}{{--
  --}}{{--                            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>--}}{{--
  --}}{{--                            <label class="custom-control-label" for="credit">Credit card</label>--}}{{--
  --}}{{--                        </div>--}}{{--
  --}}{{--                        <div class="custom-control custom-radio">--}}{{--
  --}}{{--                            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>--}}{{--
  --}}{{--                            <label class="custom-control-label" for="debit">Debit card</label>--}}{{--
  --}}{{--                        </div>--}}{{--
  --}}{{--                        <div class="custom-control custom-radio">--}}{{--
  --}}{{--                            <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>--}}{{--
  --}}{{--                            <label class="custom-control-label" for="paypal">PayPal</label>--}}{{--
  --}}{{--                        </div>--}}{{--
  --}}{{--                    </div>--}}{{--
  --}}{{--                    <div class="row">--}}{{--
  --}}{{--                        <div class="col-md-6 mb-3">--}}{{--
  --}}{{--                            <label for="cc-name">Name on card</label>--}}{{--
  --}}{{--                            <input type="text" class="form-control" id="cc-name" placeholder="" required>--}}{{--
  --}}{{--                            <small class="text-muted">Full name as displayed on card</small>--}}{{--
  --}}{{--                            <div class="invalid-feedback">--}}{{--
  --}}{{--                                Name on card is required--}}{{--
  --}}{{--                            </div>--}}{{--
  --}}{{--                        </div>--}}{{--
  --}}{{--                        <div class="col-md-6 mb-3">--}}{{--
  --}}{{--                            <label for="cc-number">Credit card number</label>--}}{{--
  --}}{{--                            <input type="text" class="form-control" id="cc-number" placeholder="" required>--}}{{--
  --}}{{--                            <div class="invalid-feedback">--}}{{--
  --}}{{--                                Credit card number is required--}}{{--
  --}}{{--                            </div>--}}{{--
  --}}{{--                        </div>--}}{{--
  --}}{{--                    </div>--}}{{--
                      <div class="row">
                          <div class="col-md-3 mb-3">
                              <label for="cc-expiration">Expiration m</label>
                              <input type="text" class="form-control" id="expmonth" name="ExpiryMonth" placeholder="" required>
                              <div class="invalid-feedback">
                                  Expiration date required
                              </div>
                          </div>
                          <div class="col-md-3 mb-3">
                              <label for="cc-cvv">Expiration Y</label>
                              <input type="text" class="form-control"  id="expyear" name="ExpiryYear" placeholder="" required>
                              <div class="invalid-feedback">
                                  Security code required
                              </div>
                          </div>
                          <div class="col-md-3 mb-3">
                              <label for="cc-cvv">CVV</label>
                              <input type="text" class="form-control" id="cvc" name="cvc"  placeholder="" required>
                              <div class="invalid-feedback">
                                  Security code required
                              </div>
                          </div>
                          <div class="col-md-3 mb-3">
                              <label for="cc-cvv">price</label>
                              <input type="show" name="totalamount" value="{{ Cart::getTotal() }}">                            <div class="invalid-feedback">
                                  Security code required
                              </div>
                          </div>

                       </div>
                      <hr class="mb-4">
                      <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
                  </form>
              </div>
          </div>

          --}}{{--    <footer class="my-5 pt-5 text-muted text-center text-small">--}}{{--
          --}}{{--        <p class="mb-1">&copy; 2017-2019 Company Name</p>--}}{{--
          --}}{{--        <ul class="list-inline">--}}{{--
          --}}{{--            <li class="list-inline-item"><a href="#">Privacy</a></li>--}}{{--
          --}}{{--            <li class="list-inline-item"><a href="#">Terms</a></li>--}}{{--
          --}}{{--            <li class="list-inline-item"><a href="#">Support</a></li>--}}{{--
          --}}{{--        </ul>--}}{{--
          --}}{{--    </footer>--}}{{--
      </div>


      </div>
      --}}{{--end checkout--}}
@endsection

@extends('app')

@section('title'){{ trans('misc.setup_recurring').' - '}}@endsection

@section('css')
    {{--<link href="{{ asset('public/plugins/iCheck/all.css')}}" rel="stylesheet" type="text/css"/>--}}
@endsection
@section('page-class', 'donation kaxsdc')
@section('data-event', 'load')
@section('header-content')
    <div class="header-content">
        <div class="header-title-wrapper container padding-55">
            <h2 class="title-site">Reccuring Donations</h2>
            <h2>Make automatic donations to your favorite campaign!</h2>
        </div>
    </div>
@endsection
@section('content')  <div class="row" style="display: flex; justify-content: center;">
@php
    /** This should be a GUID.  However, you will need to remove the “-“ from the GUID because there is a max of 32 characters that can be used */
    $_SESSION['KountSession'] = bin2hex(openssl_random_pseudo_bytes(16));
@endphp
<!-- Col MD -->
    <div class="col-md-8 margin-bottom-20">
        <!-- form start -->
        <form method="POST" action="{{url('recurring/fac/authorize')}}" enctype="multipart/form-data"
              id="formDonation">

            <input type="hidden" name="recId" id="recId">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_id" value="">
            <input type="hidden" name="_entity" value="{{ 'campaign' }}">


            <select class="form-control my-5" aria-label=".form-select-lg example" name="compaignId">
                <option value="" disabled selected>Select your campaign</option>
                @foreach($campaigns as $campaign)
                    <option value="{{$campaign->id}}">

                    </option>
                @endforeach
            </select>

            @if(\Illuminate\Support\Facades\Auth::check())
                <input type="hidden" name="_user_id"
                       value={{ \Illuminate\Support\Facades\Auth::user()->getAuthIdentifier() }}>
            @else
                <input type="hidden" name="_user_id" value="0">
            @endif
            <input type="hidden" id="campaignName" name="_campaign_name" value="">

            <div class="row radio-btn-row">

                <div class="form-group col-4 col-sm">
                    <label for="" class="btn btn-ok radio-btn">
                        <input type="radio" name="value" value="10"/>$10
                    </label>
                </div>
                <div class="form-group col-4 col-sm">
                    <label for="" class="btn btn-ok radio-btn">
                        <input type="radio" name="value" value="20"/>$20
                    </label>
                </div>
                <div class="form-group col-4 col-sm">
                    <label for="" class="btn btn-ok radio-btn">
                        <input type="radio" name="value" value="50"/>$50
                    </label>
                </div>
                <div class="form-group col-6 col-sm">
                    <label for="" class="btn btn-ok radio-btn">
                        <input type="radio" name="value" value="100"/>$100
                    </label>
                </div>

                <?php
                $max_donation_amount = number_format($settings->max_donation_amount, 0, '.', '');
                ?>

                <div class="form-group col-6 col-sm">
                    <label for="" class="btn btn-ok radio-btn">
                        <input type="radio" name="value"
                               value="<?php echo $max_donation_amount ?>"/>$<?php echo $max_donation_amount ?>
                    </label>
                </div>

            </div>

            <div class="form-group">
                <label for="">{{trans('misc.enter_your_donation')}}<i class="text-danger">*</i></label>
                <div class="donation-wrapper">
                    <i class="icon ion-social-usd"></i>

                    <input type="text"
                           class="form-control donation minAmount maxAmount"
                           placeholder="00.00"
                           autocomplete="off"
                           id="onlyNumber"
                           name="amount"
                           value="{{ old('donation') }}">
                    <span class="bsd">BSD</span>
                </div>
            </div>
            <select class="form-control my-5" aria-label=".form-select-lg" name="recurring_day">
                <option value="" disabled selected>Select your recurring day</option>
                @for($day = 1; $day <= 28; $day++)
                    <option value="{{$day}}">{{$day}}</option>
                @endfor
            </select>

            <!--        Start: Recurring Payment User Interface            -->

            <div class="row radio-btn-row-reoccuring" id="recurringoptions" style="display: none;">

                <div class="form-group col-4 col-sm">
                    <label for="" class="btn radio-btn">
                        <input type="radio" name="recurringvalue" value="10"/>$10
                    </label>
                </div>
                <div class="form-group col-4 col-sm">
                    <label for="" class="btn radio-btn">
                        <input type="radio" name="recurringvalue" value="20"/>$20
                    </label>
                </div>
                <div class="form-group col-4 col-sm">
                    <label for="" class="btn radio-btn">
                        <input type="radio" name="recurringvalue" value="50"/>$50
                    </label>
                </div>
                <div class="form-group col-6 col-sm">
                    <label for="" class="btn radio-btn">
                        <input type="radio" name="recurringvalue" value="100"/>$100
                    </label>
                </div>

                <?php
                $max_donation_amount = number_format($settings->max_donation_amount, 0, '.', '');
                ?>

                <div class="form-group col-6 col-sm">
                    <label for="" class="btn radio-btn">
                        <input type="radio" name="recurringvalue"
                               value="<?php echo $max_donation_amount ?>"/>$<?php echo $max_donation_amount ?>
                    </label>
                </div>
                <div class="form-group col-6 col-sm">
                    <div class="form-group">
                        <label for="">{{trans('misc.enter_your_donation')}}<i class="text-danger">*</i></label>
                        <div class="donation-wrapper">
                            <i class="icon ion-social-usd"></i>
                            <input type="text"
                                   class="form-control donation minAmount maxAmount"
                                   placeholder="00.00"
                                   autocomplete="off"
                                   id="recurringOnlyNumber"
                                   name="recurringamount"
                                   value="{{ old('donation') }}">
                            <span class="bsd">BSD</span>
                        </div>
                    </div>
                </div>
            </div>


            <!--        END: Recurring Payment User Interface            -->


            <div class="row">
                <div class="form-group col-6">
                    <label for="">{{trans('misc.first_name')}}<i class="text-danger">*</i></label>
                    <input type="text" class="form-control input-height-50 input-color-gray"
                           value="@if( Auth::check() ){{Auth::user()->name}}@endif" name="name">
                </div>
                <div class="form-group col-6">
                    <label for="">{{trans('misc.last_name')}}<i class="text-danger">*</i></label>
                    <input type="text" class="form-control input-height-50 input-color-gray"
                           value="@if( Auth::check() ){{Auth::user()->last_name}}@endif" name="surname">
                </div>
            </div>
            <div class="row">
                <!-- FORM GROUP -->
                <div class="form-group col-6 mobile">
                    <label>{{trans('misc.mobile')}}<i class="text-danger">*</i></label>
                    <input type="tel"
                           name="mobile"
                           max="20"
                           class="form-control input-height-50 input-color-gray onlyNumber">
                    <div class="help-block with-errors text-danger mt-2"></div>
                    <span class="valid-msg hide text-success">✓</span>
                    <span class="error-msg hide text-danger">{{trans('misc.invalid_phone')}}</span>
                </div><!-- /.form-group-->
            </div>
            {{----}}
            <div class="form-group">
                <div class="form-check">
                    <div class="custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="checkHideName" name="anonymous">
                        <label class="custom-control-label" for="checkHideName">
                            {{trans('misc.hide_name')}}
                        </label>
                    </div>
                </div>
            </div>
            {{----}}
            <div class="row">
                <div class="form-group col-6">
                    <label for="">{{ trans('auth.email') }}<i class="text-danger">*</i></label>
                    <input type="text" class="form-control input-height-50 input-color-gray"
                           value="@if( Auth::check() ){{Auth::user()->email}}@endif" name="email">
                </div>
                <div class="form-group col-6">
                    <label for="">{{ trans('misc.tax_id') }}</label>
                    <input type="text" class="form-control input-height-50 input-color-gray"
                           value="{{old('tax_id')}}" name="tax_id">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="">{{ trans('misc.street_address_1') }}<i class="text-danger">*</i></label>
                    <input type="text" class="form-control input-height-50 input-color-gray"
                           value="{{old('street_address_1')}}" name="street_address_1">
                </div>
                <div class="form-group col-6">
                    <label for="">{{ trans('misc.street_address_2') }}</label>
                    <input type="text" class="form-control input-height-50 input-color-gray"
                           value="{{old('street_address_2')}}" name="street_address_2">
                </div>
            </div>

            <div class="row form-group">
                <!-- Start -->
                <div class="col-md-6 select-box">
                    <label>{{ trans('misc.country') }}</label>
                    <select name="country"
                            class="form-control select-sort input-height-50 input-color-gray input-lg">
                        <option value="">{{trans('misc.select_one')}}</option>
                        @foreach(App\Models\Countries::orderBy('name')->get() as $country )
                            @if( Auth::check() && Auth::user()->countries_id == $country->id )
                                <option selected value="{{$country->name}}">
                                    {{ $country->name }}
                                </option>
                            @elseif($country->id === 28)
                                <option value="{{$country->id}}" selected>{{ $country->name }}</option>
                            @else
                                <option value="{{$country->id}}">{{ $country->name }}</option> @endif
                        @endforeach
                    </select>
                </div><!-- /. End-->

                <!-- Start -->
                <div class="col-md-6">
                    <label>{{ trans('misc.postal_code') }}<i class="text-danger">*</i></label>
                    <input type="text" value="{{ old('postal_code') }}" name="postal_code" id="postalCode"
                           class="form-control input-lg input-height-50 input-color-gray">
                </div><!-- /. End-->

            </div><!-- row form-control -->

        @if($settings->payment_gateway === 'FAC')

            <!-- Start -->
                <div class="form-group">
                    <label>{{ trans('misc.card_number') }}<i class="text-danger">*</i></label>
                    <input type="text" value="{{ old('card_number') }}" maxlength="16" minlength="16"
                           name="card_number"
                           class="form-control input-lg onlyNumber input-height-50 input-color-gray">
                </div><!-- /. End-->

                <div class="row form-group">
                    <!-- Start -->
                    <div class="col-md-4">
                        <label>{{ trans('misc.card_cvv') }}<i class="text-danger">*</i></label>
                        <input type="text" value="{{ old('card_cvv') }}" maxlength="4" minlength="3" name="cvv"
                               class="form-control input-lg onlyNumber input-height-50 input-color-gray">
                    </div><!-- /. End-->

                    <div class="col-md-4">
                        <label>{{ trans('misc.card_expiry_month') }}<i class="text-danger">*</i></label>
                        <select name="card_expiry_month" id="month"
                                class="form-control select-sort mr-sm-2 input-lg onlyNumber input-height-50">
                            <?php
                            for ($i = 1; $i <= 12; $i++) {
                            ?>
                            <option value="<?php echo $i > 9 ? $i : '0' . $i ?>"><?php echo $i > 9 ? $i : '0' . $i ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div><!-- /. End-->

                    <!-- Start -->
                    <div class="col-md-4">
                        <label>{{ trans('misc.card_expiry_year') }}<i class="text-danger">*</i></label>
                        <select name="card_expiry_year"
                                class="form-control select-sort mr-sm-2 input-lg onlyNumber card_expiry_year input-height-50"
                                id="year">
                            <?php
                            $nowYear = \Carbon\Carbon::now()->format('y');
                            $futureYear = $nowYear + 9;

                            for ($j = $nowYear; $j <= $futureYear; $j++) {
                            ?>
                            <option value="<?php echo $j ?>"><?php echo $j ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div><!-- /. End-->

                </div><!-- row form-control -->
        @endif
        <!-- Start -->
            <div class="form-group">
                <label>{{ trans('misc.leave_comment') }}</label>
                <input type="text" value="{{ old('comment') }}"
                       name="comment"
                       class="form-control input-lg input-height-50 input-color-gray">
            </div><!-- /. End-->
            <!-- Alert -->
            <div class="alert alert-danger display-none" id="errorDonation">
                <ul class="list-unstyled" id="showErrorsDonation"></ul>
            </div><!-- Alert -->

            <div class="box-footer text-center clearfix">
                <button type="submit" id="buttonDonation" style="width: max-content"
                        class="btn btn-lg btn-main custom-rounded input-height-50">
                    {{ trans('misc.setup_reccuring') }}
                </button>
            </div><!-- /.box-footer -->
        </form>
    </div><!-- /COL MD -->
    @endsection
    @section('javascript-donation')
        <script src="{{ asset('public/js/intl-tel-input-12.1.0/build/js/intlTelInput.js')}}"
                type="text/javascript"></script>
        <script type="text/javascript">
            var uuid = 'xxxxxxxxxxxx4xxxyxxxxxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
                var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
                return v.toString(16);
            });
            $(document).ready(function () {
                var telInput = $(".mobile input[name=mobile]"), errorMsg = $(".mobile .error-msg"), validMsg = $(".mobile .valid-msg");
                telInput.intlTelInput({
                    nationalMode: false,
                    utilsScript: '{{ asset('public/js/intl-tel-input-12.1.0/build/js/utils.js') }}',
                    initialCountry: "BS",
                    customPlaceholder: () => '12428888888'
                })
                var reset = function () {
                    telInput.removeClass("error");
                    errorMsg.addClass("hide");
                    validMsg.addClass("hide");
                };
                $("input[name=mobile]").on('change', function () {
                    reset();
                    if ($.trim(telInput.val())) {
                        if (telInput.intlTelInput("isValidNumber")) {
                            validMsg.removeClass("hide");
                        } else {
                            telInput.addClass("error");
                            errorMsg.removeClass("hide");
                        }
                    }
                })
                // on blur: validate
                telInput.blur(function () {
                    reset();
                    if ($.trim(telInput.val())) {
                        if (telInput.intlTelInput("isValidNumber")) {
                            validMsg.removeClass("hide");
                        } else {
                            telInput.addClass("error");
                            errorMsg.removeClass("hide");
                        }
                    }
                });
                $(".mobile").on('click', '.country-list', function () {
                    reset();
                    if ($.trim(telInput.val())) {
                        if (telInput.intlTelInput("isValidNumber")) {
                            validMsg.removeClass("hide");
                        } else {
                            telInput.addClass("error");
                            errorMsg.removeClass("hide");
                        }
                    }
                });
                $('.onlyNumber').keydown(function (e) {
                    // Allow: backspace, delete, tab, escape, enter and .
                    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 187]) !== -1 ||
                        // Allow: Ctrl+A, Command+A
                        (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                        // Allow: home, end, left, right, down, up
                        (e.keyCode >= 35 && e.keyCode <= 40)) {
                        // let it happen, don't do anything
                        return;
                    }
                    // Ensure that it is a number and stop the keypress
                    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                        e.preventDefault();
                    }
                });
                var location = window.location;
                var merchantId = {{ config('fac.merchant_id') }};
                // var frame = '<iframe width=1 height=1 frameborder=0 scrolling=no src="{0}"><img width=1 height=1 src="{1}"></iframe>';
                var input = '<input type="hidden" name="SessionID" id="SessionID" value="{0}" />';
                var logoHtml = location.origin + "/logo.htm?m=" + merchantId + "&s=" + uuid;
                var logoGif = location.origin + "/logo_gif.aspx?m=" + merchantId + "&s=" + uuid;
                var frameHtml = $.validator.format(frame, logoHtml, logoGif);
                var inputHtml = $.validator.format(input, uuid);
                $('#formDonation').append(inputHtml);
                $(document.body).prepend(frameHtml);
                var min = {{$settings->min_donation_amount}};
                var max = {{$settings->max_donation_amount}};
                $.validator.addMethod('minAmount', function (value, element) {
                        var trimmedValue = parseFloat(value.replace(' ', ''));
                        return trimmedValue >= min;
                    }, $.validator.format("Minimum amount is $" + min + ".")
                );
                $.validator.addMethod('maxAmount', function (value, element) {
                        var trimmedValue = parseFloat(value.replace(' ', ''));
                        return trimmedValue <= max;
                    }, $.validator.format("Maximum amount of $" + max + " exceeded.")
                );
            });
            $(document).on('input', '#onlyNumber', function (e) {
                this.value = this.value.replace(/[^\d.]+|(\.\d{2})\d*$/g, '$1')
                    .replace(/\d(?=(?:\d{3})+(?!\d))/g, "$& ");
            });
            $("#onlyNumber").keydown(function (e) {
                $(".radio-btn-row").find(".radio-btn").removeClass('active');
                if (this.value.includes('.',) && e.keyCode === 190) {
                    e.preventDefault();
                    return;
                }
                else if (!this.value.includes('.') && e.keyCode === 190) {
                    if (this.selectionStart < this.value.length - 2) {
                        e.preventDefault();
                        return;
                    }
                }
            });
            $('.onlyNumber').keydown(function (e) {
                // Allow: backspace, delete, tab, escape, enter and .
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 17, 86]) !== -1 ||
                    // Allow: Ctrl+A, Command+A
                    (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                    // Allow: home, end, left, right, down, up
                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                    // let it happen, don't do anything
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            })
            // $('input.radio-btn').iCheck('destroy');
            $('.radio-btn-row').on('click', '.radio-btn', function (e) {
                $(".radio-btn-row").find(".radio-btn").removeClass('active');
                $(this).addClass('active')
                $("#onlyNumber").val(e.target.value)
                $("#onlyNumber").valid();
            })
            $(document).on('input', '#postalCode', function (e) {
                this.value = this.value.replace(/[^a-zA-Z0-9]/, '')
            })
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script type='text/javascript'>
            var client = new ka.ClientSDK();
            client.autoLoadEvents();
        </script>


        <script>

        </script>




@endsection

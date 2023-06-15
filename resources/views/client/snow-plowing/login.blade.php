<div id="login">
    <form class="theme-form login-form needs-validation" novalidate="" action="" method="POST" id="login-form">
        @csrf
        <h4>Login</h4>
        <h6>Login to your account.</h6>
        <div class="form-group mt-5">
            <label>Email Address<span class="text-danger">*</span></label>
            <div class="input-group"><span class="input-group-text"> <i class="fa-solid fa-envelope fs-5"></i></span>
                <input class="form-control" type="email" required="" name="email" placeholder="abc@gmail.com">
            </div>
        </div>
        <div class="form-group">
            <label>Password<span class="text-danger">*</span></label>
            <div class="small-group">
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-sharp fa-solid fa-lock"></i></span>
                    <input class="form-control" type="password" name="password" required="" placeholder="Password">
                </div>
            </div>
        </div>
        <div class="form-group form-check">
            <div class="checkbox">
                <input id="remember_me" class="form-check-input" type="checkbox" name="remember_me">
                <label class="form-check-label" for="remember_me">Remember me</label>
            </div>
            <a class="link" href="{{ route('forget-password.email') }}">Forget password?</a>
        </div>
        <div class="form-group mt-4 pt-2">
            <button class="btn btn-primary btn-block w-100 fw-light" type="submit">Login</button>
        </div>
        <!-- <div class="login-social-title">
            <h5 class="fw-normal">Log in with</h5>
        </div>
        <div class="form-group">
            <ul class="login-social">
                <li><a href="{{ route('auth.google') }}" target="_blank"><i class="fab fa-google text-danger"></i></a></li>
                {{-- <li><a href="https://twitter.com" target="_blank"><i class="fab fa-apple fs-5 text-dark"></i></a></li> --}}
            </ul>
        </div> -->
        <p>Don't have an account?<a id="signup" class="ms-2" href="#">Sign Up</a></p>
    </form>
</div>

<div id="registration-form">
    <form class="theme-form login-form needs-validation" novalidate="" action="" method="POST" enctype="multipart/form-data" id="registration">
        @csrf
        <h4>Create your account </h4>
        <h6>Enter your personal details</h6>
        <div class="form-group mt-5">
            <label>Your Name<span class="text-danger">*</span></label>
            <div class="small-group">
                <div class="input-group"><span class="input-group-text"><i class="fa-solid fa-user-pen"></i></span>
                    <input class="form-control" type="text" name="first_name" required="" placeholder="First Name" value="{{old('first_name')}}">
                </div>
                <div class="input-group"><span class="input-group-text"><i class="fa-solid fa-user-pen"></i></span>
                    <input class="form-control" type="text" name="last_name" required="" placeholder="Last Name" value="{{old('last_name')}}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Password<span class="text-danger">*</span></label>
            <div class="small-group">
                <div class="input-group"><span class="input-group-text"><i class="fa-sharp fa-solid fa-lock"></i></span>
                    <input class="form-control" type="password" name="password" required="" placeholder="Password">
                </div>
                <div class="input-group"><span class="input-group-text"><i class="fa-sharp fa-solid fa-lock"></i></span>
                    <input class="form-control" type="password" name="password_confirmation" required="" placeholder="Confirm Password">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="mb-3">
                <label for="formFile" class="form-label">Upload picture</label>
                <input class="form-control ps-4" type="file" name="image" id="formFile">
            </div>
        </div>
        <div class="form-group">
            <label>Email Address<span class="text-danger">*</span></label>
            <div class="input-group"><span class="input-group-text"><i class="fa-solid fa-envelope fs-5"></i></span>
                <input class="form-control" type="email" name="email" required="" placeholder="abc@gmail.com" value="{{$email ?? old('email')}}">
            </div>
        </div>
        <div class="form-group">
        <label>Phone Number<span class="text-danger">*</span></label>
            <div class="input-group"><span class="input-group-text">+1</span>
                <input class="form-control" type="text" name="phone_number" maxlength="10" required="" placeholder="Phone Number" value="{{old('phone_number')}}">
            </div>
        </div>
        <div class="form-group">
            <label>Address<span class="text-danger">*</span></label>
            <div class="input-group"><span class="input-group-text">
                <i class="fa-regular fa-pen-to-square"></i>
            </span>
                <input id="reglocation" class="form-control" type="text" name="address" required="" placeholder="Enter address">
                <input type="hidden" name="lat" id="reglat">
                <input type="hidden" name="lng" id="reglng">
            </div>
        </div>
        <div class="form-group">
            <label>Referral link</label>
            <div class="input-group"><span class="input-group-text">
                    <i class="fa-regular fa-pen-to-square"></i>
                </span>
                <input class="form-control" type="text" name="referral_link" value="{{old('referral_link')}}" placeholder="Enter referral link">
            </div>
        </div>
        <div class="form-group form-check">
            <div class="checkbox">
                <input id="checkbox1" class="form-check-input" type="checkbox" required>
                <label class="form-check-label" for="checkbox1">I agree with <span>Terms & Policy.</span></label>
            </div>
        </div>
        <div class="form-group mt-4">
            <input name="property_id" id="property_id" type="hidden" value="{{ $order->property_id }}">
            <input name="user_ip" id="user_ip" type="hidden" value="{{ $order->user_ip }}">
            <input name="order_id" id="order_id" type="hidden" value="{{ $order->order_id }}">
            <button class="btn btn-primary btn-block w-100 fw-light" id="sign-up" type="submit">Create Account</button>
        </div>
    </form>
</div>

<script>
    function loadGoogleMapsScript() {
        var script = document.createElement("script");
        script.src = "https://maps.google.com/maps/api/js?key={{ config('google.GOOGLE_MAPS_APIKEY') }}&libraries=places";
        script.type = "text/javascript";
        script.async = true;
        script.defer = true;
        script.addEventListener('load', initializeGoogleMaps);

        document.head.appendChild(script);
    }

    function initializeGoogleMaps() {
        var input = document.getElementById('reglocation');
        var options = {
            componentRestrictions: {
                country: ["us"]
            }
        };
        var autocomplete = new google.maps.places.Autocomplete(input, options);

        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();
            document.getElementById('reglat').value = place.geometry.location.lat();
            document.getElementById('reglng').value = place.geometry.location.lng();
        });
    }

    $(document).ready(function() {
        // $('#signUp').hide();
        $('#registration-form').hide();
        $('#signup').click(function(event) {
            event.preventDefault();
            $('#login').hide();
            $('#registration-form').show();
            loadGoogleMapsScript();
        });
        $('#signin').click(function(event) {
            event.preventDefault();
            $('#login').show();
            $('#signUp').hide();
        });

        // Rest of your JavaScript code

        $('#login-form').submit(function(event) {
            event.preventDefault();
            var data = $(this).serialize() + '&summaryLogin=' + encodeURIComponent('1');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                url: "{{ route('web.login') }}",
                type: 'post',
                data: data,
                dataType: 'json',
                success: function(res) {
                    if (res && res.success === true) {
                        successMessage(res.message);
                        $('#get-summary').trigger('click');
                    } else if (res && res.success === false) {
                        errorMessage(res.message);
                    }
                },
                error: function(err) {
                    console.log(err);
                    errorMessage(err.error);
                }
            });
        });

        function extractPropertyIdFromUrl(url) {
            var regex = /\/snow-plowing\/\w+\/(\d+)/;
            var matches = url.match(regex);
            if (matches && matches.length > 1) {
                return matches[1];
            }
            return null;
        }

        $('#registration').submit(function(event) {
            event.preventDefault();
            var currentUrl = window.location.href;
            var propertyId = extractPropertyIdFromUrl(currentUrl);
            console.log(propertyId);
            var data = $(this).serialize() + '&summaryRegister=' + encodeURIComponent('1') + '&propertyId=' + encodeURIComponent(propertyId);


            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                url: "{{ route('registration') }}",
                type: 'post',
                data: data,
                dataType: 'json',
                success: function(res) {
                    console.log(res);
                    if (res && res.success === true) {
                        successMessage(res.message);
                        $('#get-summary').trigger('click');
                    } else if (res && res.success === false) {
                        errorMessage(res.message);
                    }
                },
                error: function(err) {
                    console.log(err);
                    errorMessage(err.error);
                }
            });
        });
    });
</script>

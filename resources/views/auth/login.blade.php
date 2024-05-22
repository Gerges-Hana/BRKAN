@extends('admin.layout.auth')

@section('tap-title')
    تسجيل الدخول
@endsection

@section('content-body')
    <section class="flexbox-container" style="height: 610px">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
                <div class="card border-grey border-lighten-3 m-0">
                    <div class="card-header border-0">
                        <div class="card-title text-center">
                            <img src="{{asset('/app-assets/images/logo/logo-dark.png')}}" alt="branding logo">
                        </div>
                        <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                            <span>تسجيل الدخول </span>
                        </h6>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="{{ route('login') }}" novalidate>
                                @csrf
                                <!-- <fieldset class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control input-lg  @error('email') is-invalid @enderror" id="user-name" placeholder="البريد الالكتروني "
                                           name="email" value="{{ old('email') }}" required autocomplete="email" autofocus tabindex="1"
                                           data-validation-required-message="الرجاء ادخال البريد الالكتروني.">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="form-control-position">
                                        <i class="ft-user"></i>
                                    </div>
                                    <div class="help-block font-small-3"></div>
                                </fieldset> -->



                                <fieldset class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control input-lg  @error('username') is-invalid @enderror" id="user-name" placeholder="الرجاء ادخال الاسم "
                                           name="username" value="{{ old('username') }}" required autocomplete="username" autofocus tabindex="1"
                                           data-validation-required-message="الرجاء ادخال  الاسم او اللقب.">
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="form-control-position">
                                        <i class="ft-user"></i>
                                    </div>
                                    <div class="help-block font-small-3"></div>
                                </fieldset>



                                <fieldset class="form-group position-relative has-icon-left">
                                    <input type="password" class="form-control input-lg @error('password') is-invalid @enderror" id="password" placeholder="الرقم السري " tabindex="2"
                                           required data-validation-required-message="الرجاء ادخال الرقم السري ." name="password" autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <div class="form-control-position">
                                        <i class="la la-key"></i>
                                    </div>
                                    <div class="help-block font-small-3"></div>
                                </fieldset>
                                <div class="form-group row">
                                    <div class="col-md-6 col-12 text-center text-md-left">
                                        <fieldset>
                                            <input type="checkbox" id="remember-me" class="chk-remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label for="remember-me"> تذكرني !</label>
                                        </fieldset>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-danger btn-block btn-lg"><i class="ft-unlock"></i> تسجيل دخول</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

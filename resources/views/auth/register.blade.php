@extends('layouts.app')

@section('content')
<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 m-0">
                <div class="card-content">
                  <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}" novalidate>
                      @csrf

                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" name="name" id="name" class="form-control input-lg  @error('name') is-invalid @enderror"
                        placeholder="اسم الشركة أو المستخدم" tabindex="1" required value="{{ old('name') }}" autocomplete="name" autofocus>

                        @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror

                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                      </fieldset>

                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" name="username" id="username" class="form-control input-lg @error('username') is-invalid @enderror" placeholder="اسم المستخدم"
                        tabindex="2" required value="{{ old('username') }}" autocomplete="username">

                        @error('username')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror

                        <div class="form-control-position">
                          <i class="ft-user-check"></i>
                        </div>
                      </fieldset>

                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="email" name="email" id="email" class="form-control input-lg @error('email') is-invalid @enderror" placeholder="البريد الإلكتروني"
                        tabindex="3" required value="{{ old('email') }}" autocomplete="email">

                        @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror

                        <div class="form-control-position">
                          <i class="ft-mail"></i>
                        </div>
                      </fieldset>

                      <fieldset class="form-group position-relative ">
                        <select name="user_type" id="user_type" class="form-control input-lg @error('user_type') is-invalid @enderror" required>
                          <option value="" disabled selected>اختر نوع الحساب</option>
                          <option value="user"> موظف</option>
                          <option value="company">منشأة</option>
                        </select>

                        @error('user_type')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror

                        <div class="form-control-position">
                          <i class="ft-briefcase"></i>
                        </div>
                      </fieldset>

                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="password" name="password" id="password" class="form-control input-lg @error('password') is-invalid @enderror" placeholder="كلمة المرور"
                        tabindex="4" required autocomplete="new-password">

                        @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror

                        <div class="form-control-position">
                          <i class="la la-key"></i>
                        </div>
                      </fieldset>

                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="تأكيد كلمة المرور"
                        tabindex="5" required autocomplete="new-password">

                        <div class="form-control-position">
                          <i class="la la-key"></i>
                        </div>
                      </fieldset>

                      <div class="row">
                        <div class="col-12 ">
                          <button type="submit" class="btn btn-info btn-lg btn-block"><i class="ft-user"></i> تسجيل </button>
                        </div>
                        {{-- <div class="col-12 col-sm-6 col-md-6">
                          <a href="{{route('login')}}" class="btn btn-danger btn-lg btn-block"><i class="ft-unlock"></i> دخول</a>
                        </div> --}}
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
@endsection

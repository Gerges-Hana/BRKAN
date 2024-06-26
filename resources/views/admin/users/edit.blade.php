@extends('admin.layout.master')

@section('tap-title')
    تعديل المستخدم
@endsection

@section('page-style-files')

@endsection

@section('content-header')
    <div class="content-header-left col-md-6 col-12 mb-1">
        <h3 class="content-header-title">تعديل المستخدم</h3>
    </div>
    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">الرئيسية</a>
                <li class="breadcrumb-item"><a href="/users">المستخدمين</a></li>
                <li class="breadcrumb-item active">تعديل</li>
            </ol>
        </div>
    </div>
@endsection

@section('content-body')

    <section id="html5">
        <div class="row">
            <div class="col-12">
                <div class="card p-2 ">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <!-- <div class="pull-left">
                            <h2>تعديل المستخدم {{$user->name}}</h2>
                        </div> -->
                            <!-- <div class="pull-right">

                            <a class="btn btn-primary" href="{{ route('users.index') }}"> الرجوع</a>
                        </div> -->
                        </div>
                    </div>

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>عفوًا!</strong> كانت هناك بعض المشاكل مع المدخلات الخاصة بك.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <br>


                    {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}

                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group col-12 d-flex ">
                                <strong class="col-2">الاسم:</strong>
                                {!! Form::text('name', null, array('placeholder' => 'الاسم','class' => 'form-control col-8')) !!}
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group col-12 d-flex">
                                <strong class="col-2">اسم المستخدم:</strong>
                                {!! Form::text('username', null, array('placeholder' => 'ادخال اسم المستخدم','class' => 'form-control col-8')) !!}
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group col-12 d-flex">
                                <strong class="col-2">الرقم السري:</strong>
                                {!! Form::password('password', array('placeholder' => 'الرقم السرري','class' => 'form-control col-8')) !!}
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group col-12 d-flex">
                                <strong class="col-2">تاكيد الرقم :</strong>
                                {!! Form::password('confirm-password', array('placeholder' => 'اعاده ادخال الرقم السري ','class' => 'form-control col-8')) !!}
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group col-12 d-flex">
                                <strong class="col-2">الحاله :</strong>
                                {!! Form::select('is_active', [false => 'غير مفعل', true => 'مفعل'], null, ['class' => 'form-control col-8']) !!}

                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group col-12 d-flex">
                                <strong class="col-2">الادوار :</strong>
                                {!! Form::select('roles[]', $roles,[], array('class' => 'form-control col-8','multiple')) !!}
                            </div>
                        </div>

                        <!-- <div class="col-xs-6 col-sm-6 col-md-6 text-left">

                        <button type="submit" class="btn btn-primary">تعديل +</button>
                        <a class="btn btn-secondary" href="{{ route('users.index') }}"data-toggle="tooltip" title="  رجوع">رجوع ></a>
                    </div> -->
                    </div>
                    <div class="pull-left">
                        <button type="submit" class="btn btn-primary">تعديل +</button>
                        <!-- <a class="btn btn-secondary" href="{{ route('users.index') }}"  style="margin-left: 10px;" data-toggle="tooltip" title="  رجوع">رجوع > </a> -->
                        <a class="btn btn-outline-secondary" href="{{ route('users.index') }}" style="width: 80px">
                            الرجوع <i class="fa fa-chevron-left"></i>
                        </a>
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </section>

@endsection

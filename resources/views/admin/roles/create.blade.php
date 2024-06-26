@extends('admin.layout.master')

@section('tap-title')
    انشاء دور جديد
@endsection
@section('page-style-files')

@endsection
@section('content-header')
    <div class="content-header-left col-md-6 col-12 mb-1">
        <h3 class="content-header-title">انشاء دور جديد</h3>
    </div>
    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="/roles">القواعد</a></li>
                <li class="breadcrumb-item active">انشاء دور جديد</li>
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
                        <div class="col-lg-12 margin-tb p-3">
                            <div class="pull-right">
                                <!-- <h2>انشاء دور جديد</h2> -->
                            </div>
                            <!-- <div class="pull-left">
                            <a class="btn btn-primary" href="{{ route('roles.index') }}"> الرجوع</a>
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
                    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group d-flex">
                                <strong class="col-2">الاسم:</strong>
                                {!! Form::text('name', null, array('placeholder' => 'اسم القاعده','class' => 'form-control col-8')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong class="col-2">المسؤوليات:</strong>
                                <div class="container col-8">
                                    <div class="row">
                                        @foreach($permission as $index => $value)
                                            <div class="col-md-3">
                                                <div class="form-check py-2">
                                                    <input type="checkbox" class="form-check-input" id="permission{{ $value->id }}" name="permission[]" value="{{ $value->id }}">
                                                    <label class="form-check-label" for="permission{{ $value->id }}">{{ $value->name }}</label>
                                                </div>
                                            </div>
                                            @if(($index + 1) % 4 == 0)
                                    </div>
                                    <div class="row">
                                        @endif
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                        <button type="submit" class="btn btn-primary">انشاء</button>
                        <div class="pull-left">
                            <a class="btn btn-primary" href="{{ route('roles.index') }}"> الرجوع</a>
                        </div> -->
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                        <button type="submit" class="btn btn-primary">انشاء +</button>
                        <a class="btn btn-outline-secondary" href="{{ route('roles.index') }}" style="width: 80px">
                            الرجوع <i class="fa fa-chevron-left"></i>
                        </a>
                    </div>


                </div>
                {!! Form::close() !!}


            </div>
        </div>
        </div>
    </section>

@endsection

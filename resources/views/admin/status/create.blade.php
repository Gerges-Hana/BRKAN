@extends('admin.layout.master')
@section('tap-title')
حاله توصيل جديده 
@endsection
@section('page-style-files')
@endsection
@section('content-header')
<div class="content-header-left col-md-6 col-12 mb-1">
    <h3 class="content-header-title"> حاله توصيل جديده </h3>
</div>
<div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
    <div class="breadcrumb-wrapper col-12">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/status">حاله التوصيل</a></li>
            <li class="breadcrumb-item active"> حاله توصيل جديده </li>
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
                        <!-- <div class="pull-right">
                            <h2>انشاء حاله توصيل جديده </h2>
                        </div> -->
                        <!-- <div class="pull-left">
                            <a class="btn btn-primary" href="{{ route('status.index') }}"> الرجوع</a>
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
                {!! Form::open(array('route' => 'status.store','method'=>'POST')) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group d-flex">
                            <strong class="col-2">الاسم:</strong>
                            {!! Form::text('name', null, array('placeholder' => 'اسم الحاله','class' => 'form-control col-8')) !!}
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group d-flex">
                            <strong class="col-2">الحاله:</strong>
                            {!! Form::select('is_active', ['1' => 'مفعله', '0' => 'غير مفعله'], null, ['class' => 'form-control col-8']) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                        <button type="submit" class="btn btn-primary">انشاء +</button>
                            <a class="btn btn-secondary" href="{{ route('status.index') }}" style="margin-left: 10px;">الرجوع ></a>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>

@endsection
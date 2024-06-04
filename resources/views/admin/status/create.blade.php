@extends('admin.layout.master')

@section('tap-title')
الحاله
@endsection
@section('page-style-files')

@endsection
@section('content-header')
<div class="content-header-left col-md-6 col-12 mb-1">
    <h3 class="content-header-title">الحاله</h3>
</div>
<div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
    <div class="breadcrumb-wrapper col-12">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/status">حاله التوصيل</a></li>
            <li class="breadcrumb-item active">اضافه</li>
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
                            <h2>انشاء حاله توصيل جديده </h2>
                        </div>
                        <div class="pull-left">
                            <a class="btn btn-primary" href="{{ route('status.index') }}"> الرجوع</a>
                        </div>
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
                            {!! Form::select('is_active', ['1' => 'مفعله', '' => 'غير مفعله'], null, ['class' => 'form-control col-8']) !!}
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                        <button type="submit" class="btn btn-primary">انشاء</button>
                    </div>
                </div>
                {!! Form::close() !!}


            </div>
        </div>
    </div>
</section>

@endsection
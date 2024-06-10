@extends('admin.layout.master')

@section('tap-title')
تعديل القواعد
@endsection

@section('page-style-files')

@endsection
@section('content-header')
<div class="content-header-left col-md-6 col-12 mb-1">
    <h3 class="content-header-title">تعديل الدور</h3>
</div>
<div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
    <div class="breadcrumb-wrapper col-12">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">الرئيسية</a></li>
            <li class="breadcrumb-item"><a href="/roles">القواعد</a></li>
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
                        <div class="pull-left">
                            <!-- <h2> تعديل الدور</h2> -->
                        </div>
                        <!-- <div class="pull-right">
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
                {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group d-flex">
                            <strong class="col-2">الاسم:</strong>
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control col-8')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong class="col-2">المسؤوليات:</strong>
                            <div class="container col-8">
                                <div class="row">
                                    @php
                                    $count = 0;
                                    @endphp
                                    @foreach($permission as $value)
                                    @if($count % 4 == 0)
                                </div>
                                <div class="row">
                                    @endif
                                    <div class="col-md-3">
                                        <div class="form-check py-2">
                                            <input type="checkbox" class="form-check-input" id="permission{{ $value->id }}" name="permission[]" value="{{ $value->id }}" {{ in_array($value->id, $rolePermissions) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="permission{{ $value->id }}">{{ $loop->iteration }}. {{ $value->name }}</label>
                                        </div>
                                    </div>
                                    @php
                                    $count++;
                                    @endphp
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                        
                        <a class="btn btn-secondary" href="{{ route('roles.index') }}"style="margin-right: 10px;"data-toggle="tooltip" title="  رجوع" >رجوع > </a>
                        <div class="pull-right">
                        <button type="submit" class="btn btn-primary"  >تعديل +</button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>
@endsection
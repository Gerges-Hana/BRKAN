@extends('admin.layout.master')
@section('tap-title')
عرض الحاله
@endsection
@section('page-style-files')
@endsection
@section('content-header')
<div class="content-header-left col-md-6 col-12 mb-1">
    <h3 class="content-header-title">عرض الحاله</h3>
</div>
<div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
    <div class="breadcrumb-wrapper col-12">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">الرئيسية</a></li>
            <li class="breadcrumb-item"><a href="/status">حاله التوصيل</a></li>
            <li class="breadcrumb-item active">عرض</li>
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
                        <!-- <div class="pull-right">
                            <h2> عرض الحاله </h2>
                        </div> -->
                        
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong class="col-2">الاسم:</strong>
                            <strong class="col-8">{{ $status->name }}</strong>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong class="col-2">الحاله:</strong>
                            <strong class="col-8" style="color: {{ $status->is_active ? 'green' : 'red' }}"> {{ $status->is_active ? 'مفعله' : 'غير مفعله' }}
                            </strong>
                        </div>
                    </div>
                    
                </div>
              
                <hr>
                
                        
            </div>
            <div class="pull-left">
                            <a class="btn btn-secondary" href="{{ route('status.index') }}"data-toggle="tooltip" title="  رجوع">رجوع ></a>
                        </div>
            
        </div>
    </div>
</section>
@endsection
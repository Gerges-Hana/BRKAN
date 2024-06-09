@extends('admin.layout.master')

@section('tap-title')
عرض القواعد
@endsection
@section('page-style-files')
@endsection
@section('content-header')
<div class="content-header-left col-md-6 col-12 mb-1">
    <h3 class="content-header-title">عرض الادوار </h3>
</div>
<div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
    <div class="breadcrumb-wrapper col-12">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">الرئيسية</a></li>
            <li class="breadcrumb-item"><a href="/roles">القواعد</a></li>
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
                        <div class="pull-right">
                            <!-- <h2> عرض الادوار </h2> -->
                        </div>
                        <div class="pull-left">
                            <a class="btn btn-secondary" href="{{ route('roles.index') }}"data-toggle="tooltip" title="  رجوع"> ></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong class="col-2">الاسم:</strong>
                            <strong class="col-8">{{ $role->name }}</strong>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group d-flex">
                            <strong class="col-2">المسؤوليات:</strong>
                            <div class="container col-8">
                                <div class="row py-2">
                                    @if(!empty($rolePermissions))
                                    @foreach($rolePermissions as $index => $v)
                                    <div class="col-md-3">
                                        <span>{{ $index + 1 }}-</span>
                                        <span class="badge badge-success"> {{ $v->name }}</span>
                                    </div>
                                    @if(($index + 1) % 4 == 0)
                                </div>
                                <div class="row">
                                    @endif
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
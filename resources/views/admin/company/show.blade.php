@extends('admin.layout.master')

@section('tap-title')
@endsection
عرض الشركات  

@section('page-style-files')

@endsection

@section('content-header')

    <div class="content-header-left col-md-6 col-12 mb-1">
        <h3 class="content-header-title">عرض الشركات</h3>
    </div>
    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">الرئيسية</a>
                <li class="breadcrumb-item"><a href="/users">الشركات</a></li>
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

                    <div class="row py-2">
                        <div class="col-lg-12 margin-tb">
                            <!-- <div class="pull-left">
                            <h2>عرض تفاصيل الالشركه : {{$user->name}}</h2>
                        </div> -->

                        </div>
                    </div>


                    <div class="">
                        <hr>
                        <div class="row py-0">

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group col-12">
                                    <strong class="col-4">لقب الشركه </strong>
                                    <strong class="col-8">{{ $user->name }}</strong>

                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group col-12">
                                    <strong class="col-4">اسم الشركه:</strong>
                                    <strong class="col-8">{{ $user->username }}</strong>

                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row py-0">

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group col-12">
                                    <strong class="col-4">الحاله:</strong>
                                    <strong class="col-8">{{ $user->is_active }}</strong>

                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group col-12">
                                    <strong>الادوار:</strong>

                                    @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $v)
                                            <label class="badge badge-success">{{ $v }}</label>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="pull-left">
                                    <a class="btn btn-secondary" href="{{ route('users.index') }}" style="margin-left: 10px;" data-toggle="tooltip" title="  رجوع">رجوع > </a>

                                </div>


                            </div>

                        </div>
                        <hr>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

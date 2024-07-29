@extends('admin.layout.master')

@section('tap-title')
@endsection
شركه غير مفعله

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
                <li class="breadcrumb-item"><a href="/company">الشركات</a></li>
                <li class="breadcrumb-item active"></li>
            </ol>
        </div>
    </div>
@endsection

@section('content-body')
    <section id="html5">
        <div class="row">
            <div class="col-12">
                <div class="card p-2 ">




                    <div class="">
                        <hr>
                        <div class="row py-0">


                            <div class="alert alert-success mt-4" role="alert">
                                حسابك  مفعل. يسعدنا التعامل مع  حضراتكم .
                            </div>
                            <div class="card mt-4">
                                <div class="card-header">
                                    تفاصيل الحساب
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">اسم الشركة: {{ $user->name }}</h5>
                                    <p class="card-text">البريد الإلكتروني: {{ $user->email }}</p>
                                    <a href="/home" class="btn btn-primary">العودة إلى الصفحة الرئيسية</a>
                                    <a href="/home" class="btn btn-info"> بعض الاساله عن شركتك   </a>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

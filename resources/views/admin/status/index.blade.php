@extends('admin.layout.master')
@section('tap-title')
قائمه حاله التوصيل
@endsection
@section('page-style-files')
@endsection
@section('content-header')
<div class="content-header-left col-md-6 col-12 mb-1">
    <h3 class="content-header-title">اداره حاله التوصيل </h3>
</div>
<div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
    <div class="breadcrumb-wrapper col-12">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">الرئيسية</a>
            <li class="breadcrumb-item">قائمه حاله التوصيل</li>
        </ol>
    </div>
</div>
@endsection
@section('content-body')
<section id="html5">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="row">
                    <div class="col-lg-12 margin-tb p-3">
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('status.create') }}"data-toggle="tooltip" title="انشاء حاله جديده"> انشاء حاله جديده + </a>
                        </div>
                        <!-- <div class="pull-right">
                            <h2>اداره حاله التوصيل </h2>
                        </div> -->
                    </div>
                </div>          
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                @if ($message = Session::get('error'))
                <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <table class="table table-bordered">
                    <tr>
                        <th>عدد</th>
                        <th>الاسم</th>
                        <th width="280px">الحاله</th>
                        <th width="280px">الاعدادات</th>
                    </tr>
                    @php
                    $i=0;
                    @endphp
                    @foreach ($statuses as $key => $status)
                    <tr class="">
                        <td>{{ ++$i }}</td>
                        <td>{{ $status->name }}</td>
                        <td style="color: {{ $status->is_active ? 'green' : 'red' }}">
                            {{ $status->is_active ? 'مفعله' : 'غير مفعله' }}
                        </td>
                        <td>
                            <a class="btn btn-sm btn-outline-primary " href="{{ route('status.show',$status->id) }}"><i data-toggle="tooltip" title="عرض" class="la la-eye"></i></a>
                            <a class="btn  btn-sm btn-outline-warning mx-1" href="{{ route('status.edit',$status->id) }}"><i data-toggle="tooltip" title="تعديل" class="la la-edit"></i></a>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['status.destroy', $status->id], 'style' => 'display:inline']) !!}
                            <button type="submit" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" title="حذف"><i class="la la-trash"></i></button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
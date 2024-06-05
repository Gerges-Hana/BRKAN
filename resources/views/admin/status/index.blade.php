@extends('admin.layout.master')
@section('tap-title')
الحاله
@endsection
@section('page-style-files')
@endsection
@section('content-header')
<div class="content-header-left col-md-6 col-12 mb-1">
    <h3 class="content-header-title">الحاله </h3>
</div>
<div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
    <div class="breadcrumb-wrapper col-12">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/statuse">قائمه حاله التوصيل </a></li>
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
                        <div class="pull-left">
                            <a class="btn btn-success" href="{{ route('status.create') }}"> انشاء حاله </a>
                        </div>
                        <div class="pull-right">
                            <h2>اداره حاله التوصيل </h2>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
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
                            <a class="btn btn-outline-primary " href="{{ route('status.show',$status->id) }}">عرض</a>
                            <a class="btn btn-outline-warning mx-1" href="{{ route('status.edit',$status->id) }}">تعديل</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['status.destroy', $status->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('حذف', ['class' => 'btn btn-outline-danger']) !!}
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
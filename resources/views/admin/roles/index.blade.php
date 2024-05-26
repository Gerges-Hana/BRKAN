@extends('admin.layout.master')

@section('tap-title')
التقارير
@endsection

@section('page-style-files')

@endsection

@section('content-header')
<div class="content-header-left col-md-6 col-12 mb-1">
    <h3 class="content-header-title">القواعد </h3>
</div>
<div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
    <div class="breadcrumb-wrapper col-12">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/roles">قائمه القواعد</a></li>
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
                            @can('role-create')
                            <a class="btn btn-success" href="{{ route('roles.create') }}"> انشاء دور </a>
                            @endcan
                        </div>
                        <div class="pull-right">
                            <h2>اداره القواعد و الادوار </h2>
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
                    </tr>
                    @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">عرض</a>
                            @can('role-edit')
                            <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">تعديل</a>
                            @endcan
                            @can('role-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('مسح', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </table>
                {!! $roles->render() !!}
            </div>
        </div>
    </div>
</section>
@endsection
@extends('admin.layout.master')

@section('tap-title')
قائمه القواعد
@endsection

@section('page-style-files')

@endsection

@section('content-header')
<div class="content-header-left col-md-6 col-12 mb-1">
    <h3 class="content-header-title">قائمه القواعد  </h3>
</div>
<div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
    <div class="breadcrumb-wrapper col-12">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">الرئيسية</a></li>
            <li class="breadcrumb-item">قائمه القواعد</li>
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
                            @can('role-create')
                            <a class="btn   btn-success" href="{{ route('roles.create') }}"data-toggle="tooltip" title="انشاء دور جديد"> +  </a>
                            @endcan
                        </div>
                        <div class="pull-right">
                            <!-- <h2>اداره القواعد و الادوار </h2> -->
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
                    <tr class="">
                        <td>{{ ++$i }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            <a class="btn btn-sm btn-outline-primary " href="{{ route('roles.show',$role->id) }}"><i data-toggle="tooltip" title="عرض" class="la la-eye"></i></a>
                           
                            @can('role-edit')
                            <a class="btn btn-sm btn-outline-warning " href="{{ route('roles.edit',$role->id) }}"><i data-toggle="tooltip" title="تعديل" class="la la-edit"></i></a>
                            @endcan
                            @can('role-delete')
                            <!-- {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('حذف', ['class' => 'btn btn-outline-danger']) !!}
                            {!! Form::close() !!} -->
                            {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                                     <button type="submit" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" title="حذف"><i class="la la-trash"></i> </button>
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
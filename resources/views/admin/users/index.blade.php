@extends('admin.layout.master')

@section('tap-title')
المستخدمين
@endsection

@section('page-style-files')
<link rel="stylesheet" href="{{asset('/assets/css/select2.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/tables/datatable/jquery.dataTables.min.css')}}">
@endsection

@section('content-header')
<div class="content-header-left col-md-6 col-12 mb-1">
    <h3 class="content-header-title"> المستخدمين </h3>
</div>
<div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
    <div class="breadcrumb-wrapper col-12">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">الرئيسية</a></li>
            <li class="breadcrumb-item">المستخدمين</li>
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
                        <!-- <div class="pull-right">
                            <h2>اداره المستخدمين </h2>
                        </div> -->
                        <div class="pull-right">
                            <!-- <a class="btn btn-success" href="{{ route('users.create') }}"> انشاء مستخدم جديد </a> -->
                            <a class="btn btn-success" href="{{ route('roles.create') }}" data-toggle="tooltip" title="انشاء مستخدم جديد">+ </a>

                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <form id="searchForm" class="d-flex mb-2 col-12 justify-content-between">
                

                    <div class="form-group col-3">
                        <label for="name">اسم المستخدم:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group col-3">
                        <label for="username">اسم المستخدم:</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group col-3">
                        <label for="is_active">حالة التفعيل:</label>
                        <select class="form-control" id="is_active" name="is_active">
                            <option value="">الكل</option>
                            <option value="1">مفعل</option>
                            <option value="0">غير مفعل</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary align-self-end mb-2" style="width: auto;">ابحث</button>

                </form>

                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>عدد</th>
                            <th>الاسم</th>
                            <th>اسم المستخدم</th>
                            <th>الحاله</th>
                            <th>الادوار</th>
                            <th width="280px" class="text-center">العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection

@section('page-script-files')
<script src="{{asset('/app-assets/vendors/js/tables/jquery.dataTables.min.js')}}" type="text/javascript"></script>
@endsection

@section('scripts')
<script type="text/javascript">
    $(function() {
        var table = $('.data-table').DataTable({
            "bDestroy": true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('users.data') }}",
                method: 'POST',
                dataType: "JSON",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: function (d) {
                    d.name = $('#name').val();
                    d.username = $('#username').val();
                    d.is_active = $('#is_active').val();
                }
            },
            dom: '<"top"i>rt<"bottom"lp><"clear">',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'name', name: 'name' },
                { data: 'username', name: 'username' },
                { data: 'is_active', name: 'is_active', render: function(data, type, row) {
                    var statusClass = data === 'مفعل' ? 'text-success' : 'text-danger';
                    return '<span class="' + statusClass + '">' + data + '</span>';
                }},
                { data: 'roles', name: 'roles', render: function(data, type, row) {
                    var roleLabels = '';
                    data.forEach(function(role) {
                        roleLabels += '<label class="badge badge-success">' + role + '</label> ';
                    });
                    return roleLabels;
                }},
                { data: 'action', name: 'action', orderable: false, searchable: false, render: function(data, type, row) {
                    var btn = '<td class="d-flex justify-content-between">';
                    btn += '<a class="btn btn-sm btn-outline-primary mx-1" href="/users/' + row.id + '"><i data-toggle="tooltip" title="عرض" class="la la-eye"></i></a>';
                    btn += '<a class="btn btn-sm btn-outline-warning mx-1" href="/users/' + row.id + '/edit"><i data-toggle="tooltip" title="تعديل" class="la la-edit"></i></a>';
                    // btn += '<form method="POST" action="/users/' + row.id +'" style="display:inline ">';
                    // btn += '@csrf';
                    // btn += '@method("DELETE")';
                    // // btn += '<input type="submit" class="btn btn-outline-danger mx-1" value="حذف">';
                    // btn += '<a class="btn btn-outline-warning mx-1" href="#"><i data-toggle="tooltip" title="حذف" class="la la-trash"></i></a>';


                    
                    // btn += '</form>';
                    btn += '<form method="POST" action="/users/' + row.id + '" style="display:inline" onsubmit="return confirm(\'هل أنت متأكد أنك تريد حذف هذا الطلب؟\');">';
                        btn += '@csrf';
                        btn += '@method("DELETE")';
                        btn += '<button type="submit" class="btn  btn-sm btn-outline-danger  mx-1" data-toggle="tooltip" title="حذف"><i class="la la-trash"></i></button>';
                        btn += '</form>';
                    btn += '</td>';
                    return btn;
                }},
            ]
        });

        $('#searchForm').submit(function(e) {
            e.preventDefault();
            table.draw();
        });
    });
</script>
@endsection

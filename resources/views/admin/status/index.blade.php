@extends('admin.layout.master')

@section('tap-title')
    قائمه حاله التوصيل
@endsection

@section('page-style-files')
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/tables/datatable/jquery.dataTables.min.css')}}">
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
                    <div class="card-header pb-0">
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="reload" id="reload_data_btn"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                        <div class="pull-right">
                            @can('انشاء حاله')
                                <a class="btn btn-sm btn-success" href="{{ route('status.create') }}">إضافة حاله <i class="fa fa-plus"></i></a>
                            @endcan
                        </div>
                    </div>

                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard pt-1">
                            {{-- Search --}}
                            <form id="searchForm" class="row">
                                <div class="form-group col-2">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="الاسم">
                                </div>
                                <div class="form-group col-2">
                                    <select class="form-control" id="is_active" name="is_active">
                                        <option value="">الكل</option>
                                        <option value="true">مفعل</option>
                                        <option value="false">غير مفعل</option>
                                    </select>
                                </div>
                                <div class="form-group col-2 p-0">
                                    <button type="submit" class="btn btn-sm btn-primary align-self-end mt-1" style="width: auto;">بحث <i class="fa fa-search"></i></button>
                                    <button type="button" class="btn btn-sm btn-warning align-self-end mt-1 clear-btn" hidden="true" style="width: auto; ">تفريغ <i class="fa fa-eraser"></i></button>
                                </div>
                            </form>
                            {{-- Data --}}
                            <table style="width: 99%" class="table table-bordered table-striped" id="statusTable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th width="280px">الحاله</th>
                                    <th width="280px">الاعدادات</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('page-script-files')
    <script src="{{asset('/app-assets/vendors/js/tables/jquery.dataTables.min.js')}}" type="text/javascript"></script>
@endsection

@section('scripts')
    <script>
        const reload_data_btn = $('#reload_data_btn');
        const name_field = $('#name');
        const is_active_field = $('#is_active');
        const clear_btn = $('.clear-btn');

        $(function () {
            statusDatatable();
            check_inputs();
        });

        $('#searchForm').submit(function (e) {
            e.preventDefault();
            statusDatatable();
        });
        reload_data_btn.click(statusDatatable);

        // Draw table after Clear
        clear_btn.on('click', function (e) {
            name_field.val("");
            is_active_field.val("");
            is_active_field.prop('selectedIndex', 0);
            $('#searchForm').submit();
            check_inputs();
        });
        name_field.add(is_active_field).bind("keyup change", check_inputs);

        function check_inputs() {
            if (name_field.val().length > 0 || is_active_field.children("option:selected").val() !== "")
                clear_btn.attr('hidden', false);
            else
                clear_btn.attr('hidden', true);
        }

        function statusDatatable() {
            $('#statusTable').DataTable({
                bDestroy: true,
                processing: true,
                serverSide: true,
                searching: false,
                autoWidth: false,
                order: [
                    [0, 'asc']
                ],
                paging: true,
                lengthMenu: [
                    [10, 25, 50, 100],
                    [10, 25, 50, 100]
                ],
                sPaginationType: "full_numbers",
                bStateSave: true,
                fnStateSave: function (oSettings, oData) {
                    localStorage.setItem('statusDataTable', JSON.stringify(oData));
                },
                fnStateLoad: function (oSettings) {
                    return JSON.parse(localStorage.getItem('statusDataTable'));
                },
                language: dataTablesArabicLocalization,
                ajax: {
                    url: "{{ route('status.data') }}",
                    method: 'POST',
                    dataType: "JSON",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: function (d) {
                        d.name = name_field.val();
                        d.is_active = is_active_field.val();
                    }
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {
                        data: 'is_active', name: 'is_active',
                        render: function (data, type, row) {
                            let statusName = 'غير مفعل'
                            let statusClass = 'text-danger'
                            if (row.is_active == 1) {
                                statusName = 'مفعل'
                                statusClass = 'text-success'
                            }
                            return `<span class="${statusClass}">${statusName}</span>`;
                        }
                    },
                    {
                        data: 'id', name: 'id',
                        orderable: false,
                        searchable: false,
                        render: function (data, type, row) {
                            return `<div>
                            @can("تعديل الحاله")
                            <a class="btn btn-sm btn-outline-warning" href="/status/${row.id}/edit"><i data-toggle="tooltip" title="تعديل" class="la la-edit"></i></a>
                            @endcan
                            @can("حذف الحاله")
                            <a class="btn btn-sm btn-outline-danger" href="javascript:" data-id="${row.id}"
                                url="{{url('/status/destroy')}}/${row.id}" onclick="checkHasRelations(${row.id})" id="delete_${row.id}"
                                data-toggle="tooltip" title="حذف"><i class="la la-trash"></i>
                            </a>
                            @endcan
                            </div>`;
                        }
                    },
                ]
            });
        }

        function checkHasRelations(id) {
            swal({
                title: "هل انت متأكد؟",
                text: "أنت على وشك حذف هذا العنصر!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "نعم حذف!",
                closeOnConfirm: false
            }, function () {
                swal.close();
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type: 'POST',
                    url: '{{url("/status/checkHasRelations")}}/' + id,
                    data: {},
                    success: function (res) {
                        if (res.has_relations === true) {
                            swal({
                                title: "فشل الحذف",
                                text: "هذا العنصر مرتبط بعناصر أخرى ولا يمكن حذفه!",
                                type: "error",
                            })
                        } else {
                            destroy(id);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.log(error)
                        //checkAjaxRequestStatus(xhr) //TODO
                    }
                });
            });
        }

        function destroy(id) {
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'POST',
                url: '{{url("/status/delete")}}/' + id,
                success: function (res) {
                    if (res.success === true) {
                        statusDatatable();
                        previewToastrForAjaxRequest(res.success_message);
                    } else {
                        previewToastrForAjaxRequest('', res.error_message);
                        console.log('response:', res);
                    }
                },
                error: function (xhr, status, error) {
                    console.log(error)
                    //checkAjaxRequestStatus(xhr) //TODO
                }
            });
        }
    </script>
@endsection

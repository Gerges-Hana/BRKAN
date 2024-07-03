@extends('admin.layout.master')

@section('tap-title')
    التحديثات
@endsection

@section('page-style-files')
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/tables/datatable/jquery.dataTables.min.css')}}">
@endsection

@section('content-header')
    <div class="content-header-left col-md-6 col-12 mb-1">
        <h3 class="content-header-title">التحديثات</h3>
    </div>
    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">الرئيسية</a>
                <li class="breadcrumb-item">التحديثات</li>
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
                        </div>
                    </div>

                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard pt-1">
                            {{-- Search --}}
                            <form id="searchForm" class="row">
                                <div class="form-group col-2">
                                    <input type="text" class="form-control" id="purchase_order_number" name="purchase_order_number" placeholder="رقم الطلبيه">
                                </div>
                                <div class="form-group col-2">
                                    <select class="form-control" id="statusId" name="statusId">
                                        <option value="">الكل</option>
                                        @foreach($purchaseOrderStatuses as $status)
                                            <option value="{{$status->id}}">{{$status->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-2 p-0">
                                    <button type="submit" class="btn btn-sm btn-primary align-self-end mt-1" style="width: auto;">بحث <i class="fa fa-search"></i></button>
                                    <button type="button" class="btn btn-sm btn-warning align-self-end mt-1 clear-btn" style="width: auto; ">تفريغ <i class="fa fa-eraser"></i></button>
                                </div>
                            </form>
                            {{-- Data --}}
                            <table style="width: 99%" class="table table-bordered table-striped" id="statusTable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>التحديث</th>
                                    <th width="280px">الحاله</th>
                                    <th width="280px">عن طريق</th>
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
        const purchase_order_number_field = $('#purchase_order_number');
        const statusId_field = $('#statusId');
        const clear_btn = $('.clear-btn');

        $(function () {
            purchaseOrderUpdatesDatatable();
            check_inputs();
        });

        $('#searchForm').submit(function (e) {
            e.preventDefault();
            purchaseOrderUpdatesDatatable();
        });
        reload_data_btn.click(purchaseOrderUpdatesDatatable);

        // Draw table after Clear
        clear_btn.on('click', function (e) {
            purchase_order_number_field.val("");
            statusId_field.val("");
            statusId_field.prop('selectedIndex', 0);
            $('#searchForm').submit();
            check_inputs();
        });
        purchase_order_number_field.add(statusId_field).bind("keyup change", check_inputs);

        function check_inputs() {
            if (purchase_order_number_field.val().length > 0 || statusId_field.children("option:selected").val() !== "")
                clear_btn.attr('hidden', false);
            else
                clear_btn.attr('hidden', true);
        }

        function purchaseOrderUpdatesDatatable() {
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
                    localStorage.setItem('purchaseOrderUpdatesDataTable', JSON.stringify(oData));
                },
                fnStateLoad: function (oSettings) {
                    return JSON.parse(localStorage.getItem('purchaseOrderUpdatesDataTable'));
                },
                language: dataTablesArabicLocalization,
                ajax: {
                    url: "{{ route('orderUpdates.data') }}",
                    method: 'POST',
                    dataType: "JSON",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: function (d) {
                        d.purchase_order_number = purchase_order_number_field.val();
                        d.statusId = statusId_field.val();
                    }
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {
                        data: 'id', name: 'id',
                        render: function (data, type, row) {
                            let updateMessage = '';
                            let iconClass = '';
                            switch (row.status_id) {
                                case 1:
                                    updateMessage = `تم انشاء طلبية جديده برقم: ${row.purchase_order.purchase_order_number}`;
                                    iconClass = 'ft-plus-square bg-cyan';
                                    break;
                                case 2:
                                    updateMessage = `تم إلغاء طلبية رقم: ${row.purchase_order.purchase_order_number}`;
                                    iconClass = 'ft-minus-square bg-red';
                                    break;
                                case 3:
                                    updateMessage = `تم وصول طلبية رقم: ${row.purchase_order.purchase_order_number}`;
                                    iconClass = 'fa fa-truck bg-success';
                                    break;
                                case 4:
                                    updateMessage = `تم دخول طلبية رقم: ${row.purchase_order.purchase_order_number}`;
                                    iconClass = 'fa fa-truck bg-success';
                                    break;
                                case 5:
                                    updateMessage = `تم تفريغ طلبية رقم: ${row.purchase_order.purchase_order_number}`;
                                    iconClass = 'fa fa-truck bg-success';
                                    break;
                                case 6:
                                    updateMessage = `تم انهاء طلبية رقم: ${row.purchase_order.purchase_order_number}`;
                                    iconClass = 'fa fa-truck bg-success';
                                    break;
                                default:
                                    updateMessage = '-- حالة غير معروفة --';
                                    iconClass = 'ft-info-square bg-grey';
                            }
                            let notificationHtml = `
                                <!-- <h6><i class="${iconClass} icon-bg-circle"></i> ${updateMessage}</h6>-->
                                <h5>${updateMessage}</h5>
                            `;

                            return `<div class="p-1">${notificationHtml}</div>`;
                        }
                    },
                    {
                        data: 'id', name: 'id',
                        render: function (data, type, row) {
                            return `<div class="p-1">${row.status.name}</div>`;
                        }
                    },
                    {
                        data: 'id', name: 'id',
                        render: function (data, type, row) {
                            let userName = ''
                            switch (row.status_id) {
                                case 1:
                                case 2:
                                    userName = `السائق: ${row.purchase_order.driver_name}`;
                                    break;
                                case 3:
                                    userName = `رجل الأمن`;
                                    break;
                                case 4:
                                case 5:
                                case 6:
                                    userName = `المستخدم: ${row.user.name}`;
                                    break;
                                default:
                                    userName = '-- غير معروف --';
                            }
                            return `<div class="p-1">${userName}</div>`;
                        }
                    },
                ]
            });
        }
    </script>
@endsection

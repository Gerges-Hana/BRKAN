@extends('admin.layout.master')

@section('tap-title')
    التقارير
@endsection

@section('page-style-files')
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/tables/jsgrid/jsgrid-theme.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/tables/jsgrid/jsgrid.min.css')}}">
@endsection

@section('content-header')
    <div class="content-header-left col-md-6 col-12 mb-1">
        <h3 class="content-header-title">التقارير  </h3>
    </div>
    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">الرئيسية</a></li>
                <li class="breadcrumb-item active">التقارير</li>
            </ol>
        </div>
    </div>
@endsection

@section('content-body')
    <section id="html5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <!-- <h4 class="card-title">تقارير PO </h4> -->
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <table id="OrdersTable" class="table table-striped table-bordered dataex-html5-export">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>اسم السائق</th>
                                    <th>التاريخ</th>
                                    <th>رقم الفتوره</th>
                                    <th>رقم ال po</th>
                                    <th>وقت الوصول</th>
                                    <th>وقت التحميل</th>
                                    <th>وقت الخروج</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>ايمن</td>
                                    <td>2014/05/19</td>
                                    <td>689891</td>
                                    <td>320-800</td>
                                    <td>11:40</td>
                                    <td>11:40</td>
                                    <td>11:40</td>
                                </tr>
                               



                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>اسم السائق</th>
                                    <th>التاريخ</th>
                                    <th>رقم الفتوره</th>
                                    <th>رقم ال po</th>
                                    <th>وقت الوصول</th>
                                    <th>وقت التحميل</th>
                                    <th>وقت الخروج</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('page-script-files')
    <script src="{{asset('/app-assets/js/scripts/tables/jsgrid/jsgrid.js')}}" type="text/javascript"></script>
    <script src="{{asset('/app-assets/vendors/js/tables/jsgrid/jsgrid.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/app-assets/vendors/js/tables/jsgrid/griddata.js')}}" type="text/javascript"></script>
    <script src="{{asset('/app-assets/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/app-assets/vendors/js/tables/jszip.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/app-assets/vendors/js/tables/pdfmake.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/app-assets/vendors/js/tables/vfs_fonts.js')}}" type="text/javascript"></script>
    <script src="{{asset('/app-assets/vendors/js/tables/buttons.html5.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/app-assets/vendors/js/tables/buttons.print.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/app-assets/vendors/js/tables/buttons.colVis.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/app-assets/js/scripts/tables/datatables-extensions/datatable-button/datatable-html5.js')}}" type="text/javascript"></script>
@endsection
@section('scripts')
<script type="text/javascript">
    $(function() {
        var table = $('#OrdersTable').DataTable({
            bDestroy: true,
            processing: true,
            serverSide: true,
            searching: false,
            autoWidth: false,
            order: [
                [0, 'desc']
            ],
            paging: true,
            lengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 100]
            ],
            sPaginationType: "full_numbers",
            bStateSave: true,
            fnStateSave: function(oSettings, oData) {
                localStorage.setItem('OrdersDataTables', JSON.stringify(oData));
            },
            fnStateLoad: function(oSettings) {
                return JSON.parse(localStorage.getItem('OrdersDataTables'));
            },
            language: dataTablesArabicLocalization,
            ajax: {
                url: "{{ route('reports.data') }}",
                method: 'POST',
                dataType: "JSON",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: function(d) {
                    d.purchase_order_number = $('#purchase_order_number').val();
                    d.invoice_number = $('#invoice_number').val();
                    d.driver_name = $('#driver_name').val();
                    d.rep_name = $('#rep_name').val();
                    d.driver_phone = $('#driver_phone').val();
                    d.rep_phone = $('#rep_phone').val();
                }
            },
            //dom: '<"top"i>rt<"bottom"lp><"clear">',
            columns: [{
                data: 'id',
                name: 'id'
            }, {
                data: 'purchase_order_number',
                name: 'purchase_order_number'
            }, {
                data: 'invoice_number',
                name: 'invoice_number'
            }, {
                data: 'driver_name',
                name: 'driver_name'
            }, {
                data: 'rep_name',
                name: 'rep_name'
            }, {
                data: 'driver_phone',
                name: 'driver_phone'
            }, {
                data: 'rep_phone',
                name: 'rep_phone'
            }, {
                data: 'id',
                name: 'id',
                orderable: false,
                searchable: false,

                // render: function(data, type, row) {
                //     let btn = '<div class="d-flex justify-content-between">';
                //     btn += '@can("عرض الطلبيه")<button class="btn btn-sm btn-outline-primary d-flex justify-content-between align-items-center mx-1 view-order" data-id="' + row.id + '" data-toggle="tooltip" title="عرض"><i class="la la-eye"></i></button>@endcan';
                //     btn += '@can("تعديل الطلبيه")<a class="btn btn-sm  btn-outline-warning d-flex justify-content-between align-items-center mx-1 edit-order" href="#" data-id="' + row.id + '" data-toggle="tooltip" title="تعديل"><i class="la la-edit"></i></a>@endcan';
                //     btn += '@can("تفاصيل الطلبيه")<a class="btn btn-sm btn-outline-info d-flex justify-content-between align-items-center mx-1 " href="/orders-history/' + row.id + '"  data-toggle="tooltip" title="تفاصيل"><i class="la ft-file-plus"></i></a>@endcan';
                //     btn += '@can("حذف الطلبيه")<button class="btn btn-sm btn-outline-danger d-flex justify-content-between align-items-center mx-1 delete-order" data-id="' + row.id + '" data-toggle="tooltip" title="حذف"><i class="la la-trash"></i></button>@endcan';
                //     btn += '</div>';
                //     return btn;
                // },
                // "fnCreatedCell": function(nTd, sData, oData, iRow, iCol) {
                //     $(nTd).html("");
                //     @can("عرض الطلبيه")
                //     $(nTd).append(
                //         "<a href='{{url('orders/')}}/" + oData.id + "/edit' class='btn btn-xs btn-primary'><i class='glyphicon glyphicon-edit'></i> Edit</a> "
                //     );
                //     @endcan
                // }
            }]
        });

        $('#searchForm').submit(function(e) {
            e.preventDefault();
            table.draw();
        });

      
    });

    function formatDate(date, format = 'YYYY-MM-DD HH:mm:ss') {
        return date ? moment(date).format(format) : '----';
    }
</script>
@endsection
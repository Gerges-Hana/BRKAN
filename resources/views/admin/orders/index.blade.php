@extends('admin.layout.master')

@section('tap-title')
الطلبيات
@endsection

@section('page-style-files')
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/tables/datatable/jquery.dataTables.min.css')}}">

<!-- START MODERN CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css-rtl/app.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css-rtl/custom-rtl.css')}}">
<!-- END MODERN CSS-->

@endsection

@section('content-header')
<div class="content-header-left col-md-6 col-12 mb-1">
    <h3 class="content-header-title">الطلبيات</h3>
</div>
<div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
    <div class="breadcrumb-wrapper col-12">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">الرئيسية</a>
            </li>
            <li class="breadcrumb-item active">الطلبيات
            </li>
        </ol>
    </div>
</div>
@endsection

@section('content-body')
<section id="basic">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">قائمة الطلبيات</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        </ul>
                    </div>
                </div>

                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <!-- =========================== show modal ======================================  -->
                <!-- Modal -->
                <div class="modal fade text-left" id="xlarge" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel16">تفاصيل الطلب</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="modal-body-content">
                                <!-- سيتم تحميل تفاصيل الطلب هنا بواسطة AJAX -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- =========================== edit modal ======================================  -->
                <!-- Modal for Editing Order -->
                <div class="modal fade" id="editOrderModal" tabindex="-1" role="dialog" aria-labelledby="editOrderModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editOrderModalLabel">تعديل الطلب</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="editOrderForm">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="arrival_date">تاريخ الوصول</label>
                                        <input type="datetime-local" class="form-control datetime-field" id="arrival_date" name="arrival_date">
                                    </div>
                                    <div class="form-group">
                                        <label for="canceled_at">تاريخ الإلغاء</label>
                                        <input type="datetime-local" class="form-control datetime-field" id="canceled_at" name="canceled_at">
                                    </div>
                                    <div class="form-group">
                                        <label for="arrived_at">تاريخ الوصول</label>
                                        <input type="datetime-local" class="form-control datetime-field" id="arrived_at" name="arrived_at">
                                    </div>
                                    <div class="form-group">
                                        <label for="entered_at">تاريخ الإدخال</label>
                                        <input type="datetime-local" class="form-control datetime-field" id="entered_at" name="entered_at">
                                    </div>
                                    <div class="form-group">
                                        <label for="unloaded_at">تاريخ التفريغ</label>
                                        <input type="datetime-local" class="form-control datetime-field" id="unloaded_at" name="unloaded_at">
                                    </div>
                                    <div class="form-group">
                                        <label for="left_at">تاريخ المغادرة</label>
                                        <input type="datetime-local" class="form-control datetime-field" id="left_at" name="left_at">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                                    <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- =================================================================  -->

                <div class="card-content collapse show">
                    <div class="card-body card-dashboard ">

                        <!-- <div id="basicScenario"></div> -->

                        <form id="searchForm" class="d-flex mb-2 col-12 justify-content-between">
                            <button type="submit" class="btn btn-primary align-self-end mb-2 col-2">ابحث</button>

                            <div class="form-group col-2">
                                <label for="purchase_order_number">رقم الطلبيه</label>
                                <input type="text" class="form-control" id="purchase_order_number" name="purchase_order_number">
                            </div>
                            <div class="form-group col-2">
                                <label for="invoice_number">رقم الفاتورة</label>
                                <input type="text" class="form-control" id="invoice_number" name="invoice_number">
                            </div>
                            <div class="form-group col-2">
                                <label for="driver_name">اسم السائق</label>
                                <input type="text" class="form-control" id="driver_name" name="driver_name">
                            </div>
                            <div class="form-group col-2">
                                <label for="rep_name">اسم المندوب</label>
                                <input type="text" class="form-control" id="rep_name" name="rep_name">
                            </div>
                            <div class="form-group col-2">
                                <label for="driver_phone">هاتف السائق</label>
                                <input type="text" class="form-control" id="driver_phone" name="driver_phone">
                            </div>
                        </form>

                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>عدد</th>
                                    <th>رقم الطلبية</th>
                                    <th>رقم الفاتورة</th>
                                    <th>اسم السائق</th>
                                    <th>اسم المندوب</th>
                                    <th>هاتف السائق</th>
                                    <th>هاتف المندوب</th>
                                    <th width="280px" class="text-center">العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('page-script-files')
<!-- START MODERN JS-->
<script src="{{asset('/app-assets/vendors/js/tables/jquery.dataTables.min.js')}}" type="text/javascript"></script>


<script src="{{asset('/app-assets/vendors/js/extensions/moment.min.js')}}" type="text/javascript"></script>

<script src="{{asset('/app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
<script src="{{asset('/app-assets/js/core/app.js')}}" type="text/javascript"></script>
<script src="{{asset('/app-assets/js/scripts/customizer.js')}}" type="text/javascript"></script>
<!-- END MODERN JS-->

@endsection

@section('scripts')
<script type="text/javascript">
    $(function() {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('orders.data') }}",
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
            dom: '<"top"i>rt<"bottom"lp><"clear">',
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'purchase_order_number',
                    name: 'purchase_order_number'
                },
                {
                    data: 'invoice_number',
                    name: 'invoice_number'
                },
                {
                    data: 'driver_name',
                    name: 'driver_name'
                },
                {
                    data: 'rep_name',
                    name: 'rep_name'
                },
                {
                    data: 'driver_phone',
                    name: 'driver_phone'
                },
                {
                    data: 'rep_phone',
                    name: 'rep_phone'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row) {
                        var btn = '<div class="d-flex justify-content-between">';
                        btn += '<button class="btn btn-outline-primary d-flex justify-content-between align-items-center mx-1 view-order" data-id="' + row.id + '" data-toggle="tooltip" title="عرض"><i class="la la-eye"></i></button>';
                        btn += '<a class="btn btn-outline-warning d-flex justify-content-between align-items-center mx-1 edit-order" href="#" data-id="' + row.id + '" data-toggle="tooltip" title="تعديل"><i class="la la-edit"></i></a>';
                        // btn += '<a class="btn btn-outline-info d-flex justify-content-between align-items-center mx-1 " href="/orders-history/'+ row.id +'"  data-toggle="tooltip" title="تفاصيل"><i class="la ft-file-plus"></i></a>';
                        btn += '<a class="btn btn-outline-info d-flex justify-content-between align-items-center mx-1 " href="/orders-history/'+ row.id +'"  data-toggle="tooltip" title="تفاصيل"><i class="la ft-file-plus"></i></a>';

                        btn += '<form method="POST" action="/orders/' + row.id + '" style="display:inline" onsubmit="return confirm(\'هل أنت متأكد أنك تريد حذف هذا الطلب؟\');">';
                        btn += '@csrf';
                        btn += '@method("DELETE")';
                        btn += '<button type="submit" class="btn btn-outline-danger d-flex justify-content-between align-items-center mx-1" data-toggle="tooltip" title="حذف"><i class="la la-trash"></i></button>';
                        btn += '</form>';
                        btn += '</div>';
                        return btn;
                    }
                }
            ]
        });

        $('#searchForm').submit(function(e) {
            e.preventDefault();
            table.draw();
        });

        // Event listener for viewing order details
        $(document).on('click', '.view-order', function() {
            var orderId = $(this).data('id');
            $.ajax({
                url: '/orders/' + orderId,
                method: 'GET',
                dataType: "JSON",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    console.log(data);
                    var formatDate = function(date) {
                        return date ? moment(date).format('YYYY-MM-DD HH:mm:ss') : 'N/A';
                    };
                    var details = `
                <table class="table table-bordered">
                    <tr>
                        <td><strong>رقم الطلبية</strong></td>
                        <td>${data.purchase_order_number}</td>
                        <td><strong>رقم الفاتورة</strong></td>
                        <td>${data.invoice_number}</td>
                        <td><strong>اسم السائق</strong></td>
                        <td>${data.driver_name}</td>
                        <td><strong>اسم المندوب</strong></td>
                        <td>${data.rep_name}</td>
                    </tr>
                    <tr>
                        <td><strong>هاتف السائق</strong></td>
                        <td>${data.driver_phone}</td>
                        <td><strong>هاتف المندوب</strong></td>
                        <td>${data.rep_phone}</td>
                        <td><strong>تاريخ الوصول</strong></td>
                        <td>${formatDate(data.arrival_date)}</td>
                        <td><strong>تاريخ الإلغاء</strong></td>
                        <td>${formatDate(data.canceled_at)}</td>
                    </tr>
                    <tr>
                        <td><strong>تاريخ الوصول</strong></td>
                        <td>${formatDate(data.arrived_at)}</td>
                        <td><strong>تاريخ الإدخال</strong></td>
                        <td>${formatDate(data.entered_at)}</td>
                        <td><strong>تاريخ التفريغ</strong></td>
                        <td>${formatDate(data.unloaded_at)}</td>
                        <td><strong>تاريخ المغادرة</strong></td>
                        <td>${formatDate(data.left_at)}</td>
                    </tr>
                    <tr>
                        <td><strong>تاريخ الإنشاء</strong></td>
                        <td>${formatDate(data.created_at)}</td>
                        <td><strong>تاريخ التحديث</strong></td>
                        <td>${formatDate(data.updated_at)}</td>
                        <td><strong>حالة الطلب</strong></td>
                        <td>${data.status_id}</td>
                    </tr>
                </table>
            `;
                    $('#modal-body-content').html(details);
                    $('#xlarge').modal('show');
                },
                error: function() {
                    alert('خطأ في جلب تفاصيل الطلب');
                }
            });
        });

        $(document).on('click', '.edit-order', function() {
            var orderId = $(this).data('id');

            // جلب تفاصيل الطلب
            $.ajax({
                url: '/orders/' + orderId + '/edit',
                method: 'GET',
                dataType: "JSON",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    console.log(data);

                    // إعداد الحقول في النموذج بالقيم المسترجعة من قاعدة البيانات
                    $('#arrival_date').val(data.arrival_date ? moment(data.arrival_date).format('YYYY-MM-DDTHH:mm') : '');
                    $('#canceled_at').val(data.canceled_at ? moment(data.canceled_at).format('YYYY-MM-DDTHH:mm') : '');
                    $('#arrived_at').val(data.arrived_at ? moment(data.arrived_at).format('YYYY-MM-DDTHH:mm') : '');
                    $('#entered_at').val(data.entered_at ? moment(data.entered_at).format('YYYY-MM-DDTHH:mm') : '');
                    $('#unloaded_at').val(data.unloaded_at ? moment(data.unloaded_at).format('YYYY-MM-DDTHH:mm') : '');
                    $('#left_at').val(data.left_at ? moment(data.left_at).format('YYYY-MM-DDTHH:mm') : '');

                    // تعيين معرف الطلب في النموذج لتستخدمه عند الإرسال
                    $('#editOrderForm').data('id', orderId);

                    // عرض النموذج المعدل في النافذة المنبثقة
                    $('#editOrderModal').modal('show');
                },
                error: function() {
                    alert('خطأ في جلب تفاصيل الطلب');
                }
            });
        });

        // إرسال النموذج لتحديث الطلب
        $('#editOrderForm').on('submit', function(event) {
            event.preventDefault();
            var orderId = $(this).data('id');
            var formData = $(this).serialize();

            $.ajax({
                url: '/orders/' + orderId,
                method: 'PUT',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    alert('تم تحديث الطلب بنجاح');
                    $('#editOrderModal').modal('hide');
                    // location.reload(); // تحديث الصفحة لعرض التغييرات
                    table.draw();

                },
                error: function(response) {
                    alert('خطأ في تحديث الطلب');
                }
            });
        });

    });
</script>

<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@endsection
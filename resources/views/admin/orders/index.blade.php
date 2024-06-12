@extends('admin.layout.master')

@section('tap-title')
قائمة الطلبيات
@endsection

@section('page-style-files')
<link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/tables/datatable/jquery.dataTables.min.css')}}">
@endsection

@section('content-header')
<div class="content-header-left col-md-6 col-12 mb-1">
    <h3 class="content-header-title">قائمة الطلبيات</h3>
</div>
<div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
    <div class="breadcrumb-wrapper col-12">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">الرئيسية</a>
            </li>
            <li class="breadcrumb-item active">قائمة الطلبيات
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

                <div class="card-content collapse show">
                    <div class="card-body card-dashboard ">
                        <!-- orders search -->
                        <form id="searchForm" class="d-flex mb-2 col-12 justify-content-between">
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
                            <button type="submit" class="btn btn-primary align-self-end mb-2" style="width: auto;">ابحث</button>
                        </form>

                        <!-- orders table -->
                        <div class="table-responsive">
                            <table class="table table-bordered" id="purchaseOrdersTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
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
    </div>
</section>
@endsection

@section('modals')
<!-- Order details modal -->
<div class="modal" id="showOrderDetailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel16">تفاصيل الطلب</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container mt-5">
                    <div class="row">
                        <!-- Card for بيانات الطلبيه -->
                        <div class="col-md-6">
                            <div class="card mb-3" style=" border: 1px solid rgba(0, 0, 0, .125); border-radius: .25rem;">
                                <div class="modal-header">بيانات الطلبية</div>
                                <div class="modal-body">
                                    <p><strong>رقم الطلبية: </strong><span id="modal_purchase_order_number"></span></p>
                                    <p><strong>رقم الفاتورة: </strong><span id="modal_invoice_number"></span></p>
                                    <p><strong>اسم السائق: </strong><span id="modal_driver_name"></span></p>
                                    <p><strong>اسم المندوب: </strong><span id="modal_rep_name"></span></p>
                                    <p><strong>هاتف السائق: </strong><span id="modal_driver_phone"></span></p>
                                    <p><strong>هاتف المندوب: </strong><span id="modal_rep_phone"></span></p>
                                    <p><strong>تاريخ الوصول المتوقع: </strong><span id="modal_arrival_date"></span></p>
                                </div>
                            </div>
                        </div>
                        <!-- Card for التحديثات -->
                        <div class="col-md-6">
                            <div class="card mb-3" style=" border: 1px solid rgba(0, 0, 0, .125);border-radius: .25rem;">
                                <div class="modal-header">التحديثات</div>
                                <div class="modal-body">
                                    <p><strong>حالة الطلبية: </strong><span id="modal_status"></span></p>
                                    <p><strong>وقت اخر تحديث: </strong><span id="modal_updated_at"></span></p>
                                    <p><strong>وقت الانشاء: </strong><span id="modal_created_at"></span></p>
                                    <p><strong>وقت الإلغاء: </strong><span id="modal_canceled_at"></span></p>
                                    <p><strong>وقت الوصول: </strong><span id="modal_arrived_at"></span></p>
                                    <p><strong>وقت الدخول: </strong><span id="modal_entered_at"></span></p>
                                    <p><strong>وقت التفريغ: </strong><span id="modal_unloaded_at"></span></p>
                                    <p><strong>وقت المغادرة: </strong><span id="modal_left_at"></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-body" id="modal-body-content">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit order modal -->
<div class="modal fade" id="editOrderModal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static" aria-labelledby="editOrderModalLabel" aria-hidden="true">
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
                        <label for="status_id">الحالة</label>
                        <select class="form-control" id="status_id" name="status_id">
                            <option value="0">اختر الحالة</option>
                            <option value="1" class="d-none">تم التحرك</option>
                            <option value="2" class="d-none">تم الالغاء</option>
                            <option value="3" class="d-none">تم الوصول</option>
                            <option value="4">تم الإدخال</option>
                            <option value="5">تم التحميل</option>
                            <option value="6">تم المغادرة</option>
                        </select>
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
    var table = $('#purchaseOrdersTable').DataTable({
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
            localStorage.setItem('purchaseOrdersDataTables', JSON.stringify(oData));
        },
        fnStateLoad: function(oSettings) {
            return JSON.parse(localStorage.getItem('purchaseOrdersDataTables'));
        },
        language: dataTablesArabicLocalization,
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

            render: function(data, type, row) {
                let btn = '<div class="d-flex justify-content-between">';
                btn += '<button class="btn btn-sm btn-outline-primary d-flex justify-content-between align-items-center mx-1 view-order" data-id="' + row.id + '" data-toggle="tooltip" title="عرض"><i class="la la-eye"></i></button>';
                btn += '<a class="btn btn-sm  btn-outline-warning d-flex justify-content-between align-items-center mx-1 edit-order" href="#" data-id="' + row.id + '" data-toggle="tooltip" title="تعديل"><i class="la la-edit"></i></a>';
                btn += '<a class="btn btn-sm btn-outline-info d-flex justify-content-between align-items-center mx-1 " href="/orders-history/' + row.id + '"  data-toggle="tooltip" title="تفاصيل"><i class="la ft-file-plus"></i></a>';
                btn += '<button class="btn btn-sm btn-outline-danger d-flex justify-content-between align-items-center mx-1 delete-order" data-id="' + row.id + '" data-toggle="tooltip" title="حذف"><i class="la la-trash"></i></button>';
                btn += '</div>';
                return btn;
            }
        }]
    });

    $('#searchForm').submit(function(e) {
        e.preventDefault();
        table.draw();
    });

    // =================================== show  ============================
    // Event listener for viewing order details
    $(document).on('click', '.view-order', function() {
        let orderId = $(this).data('id');
        $.ajax({
            url: '/orders/' + orderId,
            method: 'GET',
            dataType: "JSON",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                let updatedAt = formatDate(data.updated_at);
                let arrivalDate = formatDate(data.arrival_date, 'YYYY-MM-DD');
                let createdAt = '----';
                let canceledAt = '----';
                let arrivedAt = '----';
                let enteredAt = '----';
                let unloadedAt = '----';
                let leftAt = '----';
                let po_status_class = 'text-secondary';

                switch (data.status_id) {
                    case 1:
                        po_status_class = 'text-primary';
                        break;
                    case 2:
                        po_status_class = 'text-danger';
                        break;
                    case 3:
                        po_status_class = 'text-dark';
                        break;
                    case 4:
                        po_status_class = 'text-info';
                        break;
                    case 5:
                        po_status_class = 'text-warning';
                        break;
                    case 6:
                        po_status_class = 'text-success';
                        break;
                }

                data.purchase_order_update.forEach(function(update) {
                    switch (update.status_id) {
                        case 1:
                            createdAt = formatDate(update.created_at);
                            break;
                        case 2:
                            canceledAt = formatDate(update.created_at);
                            break;
                        case 3:
                            arrivedAt = formatDate(update.created_at);
                            break;
                        case 4:
                            enteredAt = formatDate(update.created_at);
                            break;
                        case 5:
                            unloadedAt = formatDate(update.created_at);
                            break;
                        case 6:
                            leftAt = formatDate(update.created_at);
                            break;
                    }
                });

                $('#modal_purchase_order_number').html(data.purchase_order_number);
                $('#modal_invoice_number').html(data.invoice_number);
                $('#modal_driver_name').html(data.driver_name);
                $('#modal_rep_name').html(data.rep_name);
                $('#modal_driver_phone').html(data.driver_phone);
                $('#modal_rep_phone').html(data.rep_phone);
                $('#modal_arrival_date').html(arrivalDate);

                $('#modal_status').html(data.status.name).removeClass().addClass(po_status_class);
                $('#modal_updated_at').html(updatedAt);
                $('#modal_created_at').html(createdAt);
                $('#modal_canceled_at').html(canceledAt);
                $('#modal_arrived_at').html(arrivedAt);
                $('#modal_entered_at').html(enteredAt);
                $('#modal_unloaded_at').html(unloadedAt);
                $('#modal_left_at').html(leftAt);

                $('#showOrderDetailsModal').modal('show');
            },
            error: function() {
                alert('خطأ في جلب تفاصيل الطلب');
            }
        });
    });

    // =================================== show  ============================

    // =================================== edit  ============================
    // Event listener for editing order status
    $(document).on('click', '.edit-order', function() {
        let orderId = $(this).data('id');
        $.ajax({
            url: '/orders/' + orderId + '/edit',
            method: 'GET',
            dataType: "JSON",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                // console.log(data.purchase_order_update);
                $('#status_id').val(data.status_id);
                // Filters for purchase_order_updates by status_id
                let entered_at_update = data.purchase_order_update.find(update => update.status_id == 4);
                let unloaded_at_update = data.purchase_order_update.find(update => update.status_id == 5);
                let left_at_update = data.purchase_order_update.find(update => update.status_id == 6);
                // Set the values based on the filtered results
                if (entered_at_update) {
                    $('#entered_at').val(moment(entered_at_update.created_at).format('YYYY-MM-DDTHH:mm'));
                }
                if (unloaded_at_update) {
                    $('#unloaded_at').val(moment(unloaded_at_update.created_at).format('YYYY-MM-DDTHH:mm'));
                }
                if (left_at_update) {
                    $('#left_at').val(moment(left_at_update.created_at).format('YYYY-MM-DDTHH:mm'));
                }
                $('#editOrderForm').data('id', orderId);
                $('#editOrderModal').modal('show');
            },
            error: function() {
                alert('خطأ في جلب تفاصيل الطلب');
            }
        });
    });
    // =================================== edit  ============================

    // =================================== update  ============================
    // إرسال النموذج لتحديث الطلب
    $('#editOrderForm').on('submit', function(event) {
        event.preventDefault();
        let orderId = $(this).data('id');
        let formData = new FormData(this);
        $.ajax({
            url: '/orders/edit/' + orderId,
            method: 'POST',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            enctype: 'multipart/form-data',
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {

                // alert(response.message);
                $('#editOrderModal').modal('hide');
                table.draw();
            },
            error: function(response) {
                alert('خطأ في تحديث الطلب');
            }
        });
    });
    // =================================== update  ============================

    // <!-- ==============================Delete=========================================== -->
    $(document).on('click', '.delete-order', function(e) {
        e.preventDefault();
        let orderId = $(this).data('id');
        let token = $('meta[name="csrf-token"]').attr('content');

        if (confirm('هل أنت متأكد أنك تريد حذف هذا الطلب؟')) {
            $.ajax({
                url: '/orders/' + orderId,
                method: 'DELETE',
                data: {
                    "_token": token,
                },
                success: function(response) {
                    if (response.success) {
                        table.draw();
                        // alert(response.success);
                    } else {
                        alert('حدث خطأ: ' + response.error);
                    }
                },
                error: function(response) {
                    alert('حدث خطأ أثناء محاولة حذف الطلبيه');
                }
            });
        }
    
    });
    // <!-- ==============================Delete=========================================== -->
    
});

    function formatDate(date, format = 'YYYY-MM-DD HH:mm:ss') {
        return date ? moment(date).format(format) : '----';
    }
</script>

<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

<script>
    document.getElementById('status_id').addEventListener('change', function() {
        const status = parseInt(this.value);
        const enteredAtField = document.getElementById('entered_at');
        const unloadedAtField = document.getElementById('unloaded_at');
        const leftAtField = document.getElementById('left_at');

        if (status === 4) {
            enteredAtField.disabled = false;
            unloadedAtField.disabled = true;
            leftAtField.disabled = true;
        } else if (status === 5) {
            enteredAtField.disabled = false;
            unloadedAtField.disabled = false;
            leftAtField.disabled = true;
        } else if (status === 6) {
            enteredAtField.disabled = false;
            unloadedAtField.disabled = false;
            leftAtField.disabled = false;
        } else {
            enteredAtField.disabled = false;
            unloadedAtField.disabled = false;
            leftAtField.disabled = false;
        }
    });

    document.getElementById('editOrderForm').addEventListener('submit', function(event) {
        const status = parseInt(document.getElementById('status_id').value);
        const enteredAtValue = document.getElementById('entered_at').value;
        const unloadedAtValue = document.getElementById('unloaded_at').value;
        const leftAtValue = document.getElementById('left_at').value;

        if (status === 4 && !enteredAtValue) {
            alert('يرجى إدخال تاريخ الإدخال.');
            event.preventDefault();
        } else if (status === 5 && (!enteredAtValue || !unloadedAtValue)) {
            alert('يرجى إدخال تاريخ الإدخال وتاريخ التفريغ.');
            event.preventDefault();
        } else if (status === 6 && (!enteredAtValue || !unloadedAtValue || !leftAtValue)) {
            alert('يرجى إدخال جميع التواريخ (الإدخال، التفريغ، والمغادرة).');
            event.preventDefault();
        }
    });
</script>
@endsection
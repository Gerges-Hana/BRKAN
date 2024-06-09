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

                <!-- =================================================================  -->

                <div class="card-content collapse show">
                    <div class="card-body card-dashboard ">

                        <!-- <div id="basicScenario"></div> -->

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
                            <button type="submit" class="btn btn-primary align-self-end mb-2 col-2">ابحث</button>

                        </form>

                        <!-- index table  -->
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
                        btn += '<a class="btn btn-outline-info d-flex justify-content-between align-items-center mx-1 " href="/orders-history/' + row.id + '"  data-toggle="tooltip" title="تفاصيل"><i class="la ft-file-plus"></i></a>';

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


        // =================================== show  ============================

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
                    console.log('show');
                    console.log(data);
                    console.log('show');
                    var formatDate = function(date) {
                        return date ? moment(date).format('YYYY-MM-DD HH:mm:ss') : 'N/A';
                    };


                    var arrivalDate = 'N/A_2';
                    var canceledAt = 'N/A_2';
                    var arrivedAt = 'N/A_2';
                    var enteredAt = 'N/A_2';
                    var unloadedAt = 'N/A_2';
                    var leftAt = 'N/A_2';
                    var po_status = 'تم الانشاء';
                    var po_status_class = 'text-secondary';

                    switch (data.status_id) {
                        case 1:
                            po_status = 'تم الارسال';
                            po_status_class = 'text-primary';

                            break;
                        case 2:
                            po_status = 'تم الالغاء';
                            po_status_class = 'text-danger';

                            break;
                        case 3:
                            po_status = 'تم الوصول';
                            po_status_class = 'text-success';

                            break;
                        case 4:
                            po_status = 'تم الدخول';
                            po_status_class = 'text-warning';

                            break;
                        case 5:
                            po_status = 'تم التحميل';
                            po_status_class = 'text-info';

                            break;
                        case 6:
                            po_status = 'تم المغادره';
                            po_status_class = 'text-dark';

                            break;
                    }



                    data.purchase_order_update.forEach(function(update) {
                        switch (update.status_id) {
                            case 1:
                                arrivalDate = formatDate(update.created_at);
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



                    var details = `
                <table class="table table-bordered">
                    <tr>
                        <td><strong>رقم الطلبية</strong></td>
                        <td>${data.purchase_order_number}</td>
                        <td><strong>رقم الفاتورة</strong></td>
                        <td>${data.invoice_number}</td>
                        <td><strong>اسم السائق</strong></td>
                        <td>${data.driver_name}</td>
                       
                    </tr>
                    <tr>
                    <td><strong>اسم المندوب</strong></td>
                        <td>${data.rep_name}</td>
                        <td><strong>هاتف السائق</strong></td>
                        <td>${data.driver_phone}</td>
                        <td><strong>هاتف المندوب</strong></td>
                        <td>${data.rep_phone}</td>

                        </tr>
                    <tr>
                        <td><strong>تاريخ الإنشاء</strong></td>
                        <td>${formatDate(data.created_at)}</td>
                        <td><strong>تاريخ التحديث</strong></td>
                        <td>${formatDate(data.updated_at)}</td>
                        <td><strong>تاريخ توقع الوصول</strong></td>
                        <td>${data.arrival_date}</td>
                     </tr>
                        
                    <tr>
                        <td><strong>حالة الطلب</strong></td>
                        <td class="${po_status_class}">${po_status}</td>
                        <td><strong>تاريخ الإلغاء</strong></td>
                        <td>${canceledAt}</td>
                        <td><strong>تاريخ الوصول</strong></td>
                        <td>${arrivedAt}</td>
                    </tr>
                    <tr>
                        <td><strong>تاريخ الإدخال</strong></td>
                        <td>${enteredAt}</td>
                        <td><strong>تاريخ التفريغ</strong></td>
                        <td>${unloadedAt}</td>
                        <td><strong>تاريخ المغادرة</strong></td>
                        <td>${leftAt}</td>
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

        // =================================== show  ============================

        // =================================== edit  ============================
        // Event listener for editing order status
        $(document).on('click', '.edit-order', function() {
            var orderId = $(this).data('id');
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

    });
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
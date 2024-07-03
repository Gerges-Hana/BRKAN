@extends('admin.layout.master')

@section('tap-title')
    قائمة الطلبيات
@endsection

@section('page-style-files')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/app-assets/vendors/css/tables/datatable/jquery.dataTables.min.css') }}">
@endsection

@section('content-header')
    <div class="content-header-left col-md-6 col-12 mb-1">
        <h3 class="content-header-title">الطلبيات</h3>
    </div>
    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">الرئيسية</a></li>
                <li class="breadcrumb-item active">الطلبيات</li>
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
                                <li><a data-action="reload" id="reload_data_btn"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard pt-1">
                            {{-- Search --}}
                            <form id="searchForm" class="row">
                                <div class="form-group col-2">
                                    <input type="text" class="form-control" id="purchase_order_number"
                                        name="purchase_order_number" placeholder="رقم الطلبيه">
                                </div>
                                <div class="form-group col-2">
                                    <input type="text" class="form-control" id="invoice_number" name="invoice_number"
                                        placeholder="رقم الفاتورة">
                                </div>
                                <div class="form-group col-2">
                                    <input type="text" class="form-control" id="driver_name" name="driver_name"
                                        placeholder="اسم السائق">
                                </div>
                                <div class="form-group col-2">
                                    <input type="text" class="form-control" id="rep_name" name="rep_name"
                                        placeholder="اسم المندوب">
                                </div>
                                <div class="form-group col-2">
                                    <input type="text" class="form-control" id="driver_phone" name="driver_phone"
                                        placeholder="هاتف السائق">
                                </div>
                                <div class="form-group col-2 p-0">
                                    <button type="submit" class="btn btn-sm btn-primary align-self-end mt-1"
                                        style="width: auto;">بحث <i class="fa fa-search"></i></button>
                                    <button type="button" class="btn btn-sm btn-warning align-self-end mt-1 clear-btn"
                                        style="width: auto;">تفريغ <i class="fa fa-eraser"></i></button>
                                </div>
                            </form>
                            {{-- Data --}}
                            <div class="table-responsive">
                                <table style="width: 99%" class="table table-bordered table-striped"
                                    id="purchaseOrdersTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>رقم الطلبية</th>
                                            <th>رقم الفاتورة</th>
                                            <th>اسم السائق</th>
                                            <th>اسم المندوب</th>
                                            <th>هاتف السائق</th>
                                            <th>هاتف المندوب</th>
                                            <th class="text-center">العمليات</th>
                                        </tr>
                                    </thead>
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
    <div class="modal" id="showOrderDetailsModal" tabindex="-1" role="dialog" data-keyboard="false"
        data-backdrop="static" aria-labelledby="myModalLabel16" aria-hidden="true">
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
                                <div class="card mb-3"
                                    style=" border: 1px solid rgba(0, 0, 0, .125); border-radius: .25rem;">
                                    <div class="modal-header">بيانات الطلبية</div>
                                    <div class="modal-body">
                                        <p><strong>رقم الطلبية: </strong><span id="modal_purchase_order_number"></span></p>
                                        <p><strong>رقم الفاتورة: </strong><span id="modal_invoice_number"></span></p>
                                        <p><strong>اسم السائق: </strong><span id="modal_driver_name"></span></p>
                                        <p><strong>اسم المندوب: </strong><span id="modal_rep_name"></span></p>
                                        <p><strong>هاتف السائق: </strong><span id="modal_driver_phone"></span></p>
                                        <p><strong>هاتف المندوب: </strong><span id="modal_rep_phone"></span></p>
                                        <p><strong>وقت الوصول المتوقع: </strong><span id="modal_arrival_date"></span></p>
                                    </div>
                                </div>
                            </div>
                            <!-- Card for التحديثات -->
                            <div class="col-md-6">
                                <div class="card mb-3"
                                    style=" border: 1px solid rgba(0, 0, 0, .125);border-radius: .25rem;">
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
    <div class="modal fade" id="editOrderModal" tabindex="-1" role="dialog" data-keyboard="false"
        data-backdrop="static" aria-labelledby="editOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editOrderModalLabel">تعديل الطلب</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <form id="editOrderForm">
                    <input type="hidden" id="orderId">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="status_id">الحالة</label>
                            <select class="form-control" id="status_id" name="status_id">
                                <option value="" selected>اختر الحالة</option>
                                <option value="4">تم الدخول</option>
                                <option value="5">تم التحميل</option>
                                <option value="6">تم المغادرة</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="entered_at">وقت الإدخال</label>
                            <input type="datetime-local" class="form-control datetime-field" id="entered_at"
                                name="entered_at" disabled>
                        </div>
                        <div class="form-group">
                            <label for="unloaded_at">وقت التفريغ</label>
                            <input type="datetime-local" class="form-control datetime-field" id="unloaded_at"
                                name="unloaded_at" disabled>
                        </div>
                        <div class="form-group">
                            <label for="left_at">وقت المغادرة</label>
                            <input type="datetime-local" class="form-control datetime-field" id="left_at"
                                name="left_at" disabled>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                        <button type="button" class="btn btn-primary" id="editOrderBtn">حفظ التعديلات</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('page-script-files')
    <script src="{{ asset('/app-assets/vendors/js/tables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/app-assets/vendors/js/extensions/moment.min.js') }}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
@endsection

@section('scripts')
    <script>
        const reload_data_btn = $('#reload_data_btn');
        const purchase_order_number_field = $('#purchase_order_number');
        const invoice_number_field = $('#invoice_number');
        const driver_name_field = $('#driver_name');
        const rep_name_field = $('#rep_name');
        const driver_phone_field = $('#driver_phone');
        const clear_btn = $('.clear-btn');

        $(function() {
            purchaseOrdersDataTable();
            check_inputs();
        });

        $('#searchForm').submit(function(e) {
            e.preventDefault();
            purchaseOrdersDataTable();
        });
        reload_data_btn.click(purchaseOrdersDataTable);

        // Draw table after Clear
        clear_btn.on('click', function(e) {
            purchase_order_number_field.val("");
            invoice_number_field.val("");
            driver_name_field.val("");
            rep_name_field.val("");
            driver_phone_field.val("");
            $('#searchForm').submit();
            check_inputs();
        });
        purchase_order_number_field.add(invoice_number_field).add(driver_name_field).add(rep_name_field).add(
            driver_phone_field).bind("keyup change", check_inputs);

        // Show PO Modal
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

                    data.purchase_order_updates.forEach(function(update) {
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

        // Edit PO Modal
        $(document).on('click', '.edit-order', function() {
            let orderId = $(this).data('id');
            $('#orderId').val(orderId)
            $.ajax({
                url: '/orders/' + orderId + '/edit',
                method: 'GET',
                dataType: "JSON",
                success: function(data) {
                    console.log(data);
                    $('#status_id').val(data.order.status_id);
                    checkSelectedOrderStatus(data.order.status_id);
                    // Filters for purchase_order_updates by status_id
                    let entered_at_update = data.order.purchase_order_updates.find(update => update
                        .status_id === 4);
                    let unloaded_at_update = data.order.purchase_order_updates.find(update => update
                        .status_id === 5);
                    let left_at_update = data.order.purchase_order_updates.find(update => update
                        .status_id === 6);
                    if (entered_at_update) {
                        $('#entered_at').val(entered_at_update.formatted_created_at);
                    } else {
                        $('#entered_at').val('');
                    }
                    if (unloaded_at_update) {
                        $('#unloaded_at').val(unloaded_at_update.formatted_created_at);
                    } else {
                        $('#unloaded_at').val('');
                    }
                    if (left_at_update) {
                        $('#left_at').val(left_at_update.formatted_created_at);
                    } else {
                        $('#left_at').val('');
                    }

                    $('#editOrderForm').data('id', orderId);
                    $('#editOrderModal').modal('show');
                },
                error: function() {
                    alert('خطأ في جلب تفاصيل الطلب');
                }
            });
        });

        // Update And validation of po
        $(document).ready(function() {
            // Initialize form validation on the editOrderForm
            $("#editOrderForm").validate({
                rules: {
                    status_id: {
                        required: true
                    },
                    entered_at: {
                        required: true,
                    },
                    unloaded_at: {
                        required: true,
                    },
                    left_at: {
                        required: true,
                    }
                },
                messages: {
                    status_id: {
                        required: "برجاء اختيار الحالة"
                    },
                    entered_at: {
                        required: "برجاء ادخال وقت الإدخال",
                    },
                    unloaded_at: {
                        required: "برجاء ادخال وقت التفريغ",
                    },
                    left_at: {
                        required: "برجاء ادخال وقت المغادرة",
                    }
                },
                errorClass: 'text-danger', // Added to make the validation messages red

                errorPlacement: function(error, element) {
                    error.insertAfter(element); // Default placement
                },
                submitHandler: function(form) {
                    // Submit the form via AJAX
                    let orderId = $('#orderId').val();
                    $.ajax({
                        url: `{{ url('/orders/edit') }}/${orderId}`,
                        method: 'POST',
                        dataType: "JSON",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: $(form).serialize(), // Serialize form data
                        success: function(res) {
                            if (res.success == true) {
                                $('#editOrderModal').modal('hide');
                                $('#editOrderForm')[0].reset();
                                purchaseOrdersDataTable();
                                previewToastrForAjaxRequest(res.success_message);
                            } else {
                                previewToastrForAjaxRequest('', res.error_message);
                            }
                        },
                        error: function() {
                            alert('خطأ في تحديث الطلب');
                        }
                    });
                    return false; // Prevent default form submission
                }
            });

            // Event listener for #editOrderBtn (if it's dynamically added)
            $(document).on('click', '#editOrderBtn', function(event) {
                $("#editOrderForm").submit();
            });
        });

        // Delete PO
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
                            purchaseOrdersDataTable();
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

        function purchaseOrdersDataTable() {
            $('#purchaseOrdersTable').DataTable({
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
                columns: [{
                        data: 'id',
                        name: 'id'
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
                        data: 'id',
                        name: 'id',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return `<div>
                            @can('عرض الطلبيه')
                            <button class="btn btn-sm btn-outline-primary view-order" data-id="${row.id}"
                                data-toggle="tooltip" title="عرض الطلبية"><i class="la la-eye"></i>
                            </button>
                            @endcan
                            @can('تعديل الطلبيه')
                            <a class="btn btn-sm btn-outline-warning edit-order" href="#" data-id="${row.id}"
                                data-toggle="tooltip" title="تعديل الطلبية"><i class="la la-edit"></i>
                            </a>
                            @endcan
                            @can('تفاصيل الطلبيه')
                            <a class="btn btn-sm btn-outline-info " href="{{ url('/orders/history/') }}/${row.id}"
                                data-toggle="tooltip" target="_blank" title="تفاصيل الطلبية"><i class="la ft-file-plus"></i>
                            </a>
                            @endcan
{{--                            @can('حذف الطلبيه') --}}
{{--                            <a class="btn btn-sm btn-outline-danger" href="javascript:" data-id="${row.id}" --}}
{{--                                url="{{url('/orders/destroy')}}/${row.id}" onclick="checkHasRelations(${row.id})" id="delete_${row.id}" --}}
{{--                                data-toggle="tooltip" title="حذف الطلبية"><i class="la la-trash"></i> --}}
{{--                            </a> --}}
{{--                            @endcan --}}
                            </div>`;
                        },
                    }
                ]
            });
        }

        function check_inputs() {
            if (purchase_order_number_field.val().length > 0 || invoice_number_field.val().length > 0 || driver_name_field
                .val().length > 0 || rep_name_field.val().length > 0 || driver_phone_field.val().length > 0)
                clear_btn.attr('hidden', false);
            else
                clear_btn.attr('hidden', true);
        }

        function formatDate(date, format = 'YYYY-MM-DD HH:mm:ss') {
            return date ? moment(date).format(format) : '----';
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
            }, function() {
                swal.close();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '{{ url('/orders/checkHasRelations') }}/' + id,
                    data: {},
                    success: function(res) {
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
                    error: function(xhr, status, error) {
                        console.log(error)
                        //checkAjaxRequestStatus(xhr) //TODO
                    }
                });
            });
        }

        function destroy(id) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: '{{ url('/orders/delete') }}/' + id,
                success: function(res) {
                    if (res.success === true) {
                        rolesDataTable();
                        previewToastrForAjaxRequest(res.success_message);
                    } else {
                        previewToastrForAjaxRequest('', res.error_message);
                        console.log('response:', res);
                    }
                },
                error: function(xhr, status, error) {
                    console.log(error)
                    //checkAjaxRequestStatus(xhr) //TODO
                }
            });
        }
    </script>

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    <script>
        document.getElementById('status_id').addEventListener('change', function() {
            checkSelectedOrderStatus(this.value)
        });

        function checkSelectedOrderStatus(status) {
            status = parseInt(status);
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
                enteredAtField.disabled = true;
                unloadedAtField.disabled = true;
                leftAtField.disabled = true;
            }
        }

        document.getElementById('editOrderForm').addEventListener('submit', function(event) {
            const status = parseInt(document.getElementById('status_id').value);
            const enteredAtValue = document.getElementById('entered_at').value;
            const unloadedAtValue = document.getElementById('unloaded_at').value;
            const leftAtValue = document.getElementById('left_at').value;

            if (status === 4 && !enteredAtValue) {
                console.log('يرجى إدخال وقت الإدخال.');
                event.preventDefault();
            } else if (status === 5 && (!enteredAtValue || !unloadedAtValue)) {
                console.log('يرجى إدخال وقت الإدخال ووقت التفريغ.');
                event.preventDefault();
            } else if (status === 6 && (!enteredAtValue || !unloadedAtValue || !leftAtValue)) {
                console.log('يرجى إدخال جميع التواريخ (الإدخال، التفريغ، والمغادرة).');
                event.preventDefault();
            }
        });
    </script>
@endsection

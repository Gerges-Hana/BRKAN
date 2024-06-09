@extends('admin.layout.master')

@section('tap-title')
المستخدمين
@endsection

@section('page-style-files')

@endsection


@section('content-header')
<div class="content-header-left col-md-6 col-12 mb-1">
    <h3 class="content-header-title">تفاصيل الطلبيات</h3>
</div>
<div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
    <div class="breadcrumb-wrapper col-12">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">الرئيسية</a>
            <li class="breadcrumb-item"><a href="/orders">الطلبيات</a>
            </li>
            <li class="breadcrumb-item active">تفاصيل الطلبيه
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
                    <!-- <h4 class="card-title">تفاصيل الطلبيات</h4> -->
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <!-- <li><a data-action="collapse"><i class="ft-minus"></i></a></li> -->
                            <!-- <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>-->
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        </ul>
                    </div>
                </div>

                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                @if ($message = Session::get('error'))
                <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <!-- ================================================================================ -->
                <div class="row">

                    <!-- Icon Tab with bottom Arrow -->
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs nav-linetriangle nav-justified" id="tab-bottom-arrow-drag">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="activeIcon22-tab1" data-toggle="tab" href="#activeIcon22" aria-controls="activeIcon22" aria-expanded="true"><i class="la la-check"></i>عرض الطلبية </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="linkIcon22-tab1" data-toggle="tab" href="#linkIcon22" aria-controls="linkIcon22" aria-expanded="false"><i class="la la-link"></i> تحديثات الطلبيه</a>
                                    </li>

                                </ul>
                                <div class="tab-content px-1 pt-1">

                                    <div role="tabpanel" class="tab-pane active show" id="activeIcon22" aria-labelledby="activeIcon22-tab1" aria-expanded="true">

                                        @php
                                        $po_status = 'تم الانشاء';
                                        $po_status_class = 'text-secondary'; // Default Bootstrap class

                                        switch ($order->status_id) {
                                        case 1:
                                        $po_status = 'تم الارسال';
                                        $po_status_class = 'text-primary';
                                        break;
                                        case 2:
                                        $po_status = 'تم الالغاء';
                                        $po_status_class = 'text-danger';
                                        break;
                                        case 3:
                                        $po_status = 'تم الوصول';
                                        $po_status_class = 'text-success';
                                        break;
                                        case 4:
                                        $po_status = 'تم الدخول';
                                        $po_status_class = 'text-warning';
                                        break;
                                        case 5:
                                        $po_status = 'تم التحميل';
                                        $po_status_class = 'text-info';
                                        break;
                                        case 6:
                                        $po_status = 'تم المغادره';
                                        $po_status_class = 'text-dark';
                                        break;
                                        }
                                        @endphp

                                        @php
                                        $arrivalDate = '__/__';
                                        $canceledAt = '__/__';
                                        $arrivedAt = '__/__';
                                        $enteredAt = '__/__';
                                        $unloadedAt = '__/__';
                                        $leftAt = '__/__';
                                        if ($order->purchase_order_update) {
                                        foreach ($order->purchase_order_update as $update) {
                                        switch ($update->status_id) {
                                        case 1:
                                        $arrivalDate = \Carbon\Carbon::parse($update->created_at)->format('Y-m-d H:i:s');
                                        break;
                                        case 2:
                                        $canceledAt = \Carbon\Carbon::parse($update->created_at)->format('Y-m-d H:i:s');
                                        break;
                                        case 3:
                                        $arrivedAt = \Carbon\Carbon::parse($update->created_at)->format('Y-m-d H:i:s');
                                        break;
                                        case 4:
                                        $enteredAt = \Carbon\Carbon::parse($update->created_at)->format('Y-m-d H:i:s');
                                        break;
                                        case 5:
                                        $unloadedAt = \Carbon\Carbon::parse($update->created_at)->format('Y-m-d H:i:s');
                                        break;
                                        case 6:
                                        $leftAt = \Carbon\Carbon::parse($update->created_at)->format('Y-m-d H:i:s');
                                        break;
                                        }
                                        }}

                                        $po_status = 'تم الانشاء';
                                        $po_status_class = 'text-secondary'; // Default Bootstrap class

                                        switch ($order->status_id) {
                                        case 1:
                                        $po_status = 'تم الارسال';
                                        $po_status_class = 'text-primary';
                                        break;
                                        case 2:
                                        $po_status = 'تم الالغاء';
                                        $po_status_class = 'text-danger';
                                        break;
                                        case 3:
                                        $po_status = 'تم الوصول';
                                        $po_status_class = 'text-success';
                                        break;
                                        case 4:
                                        $po_status = 'تم الدخول';
                                        $po_status_class = 'text-warning';
                                        break;
                                        case 5:
                                        $po_status = 'تم التحميل';
                                        $po_status_class = 'text-info';
                                        break;
                                        case 6:
                                        $po_status = 'تم المغادره';
                                        $po_status_class = 'bg-success';
                                        break;
                                        }
                                        @endphp

                                        <table class="table table-bordered">
                                            <tr>
                                                <td><strong>رقم الطلبية</strong></td>
                                                <td>{{ $order->purchase_order_number }}</td>
                                                <td><strong>رقم الفاتورة</strong></td>
                                                <td>{{ $order->invoice_number }}</td>
                                                <td><strong>اسم السائق</strong></td>
                                                <td>{{ $order->driver_name }}</td>

                                            </tr>
                                            <tr>
                                                <td><strong>اسم المندوب</strong></td>
                                                <td>{{ $order->rep_name }}</td>
                                                <td><strong>هاتف السائق</strong></td>
                                                <td>{{ $order->driver_phone }}</td>
                                                <td><strong>حالة الطلب</strong></td>
                                                <td class="{{ $po_status_class }}">{{ $po_status }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>هاتف المندوب</strong></td>
                                                <td>{{ $order->rep_phone }}</td>
                                                <td><strong>تاريخ توقع الوصول</strong></td>
                                                <td>{{ $order->arrival_date  }}</td>

                                                <td><strong>تاريخ الإنشاء</strong></td>
                                                <td>{{ $order->created_at }}</td>
                                            </tr>

                                            <tr>
                                                <td><strong>تاريخ توقع الوصول</strong></td>
                                                <td>{{ $arrivalDate }}</td>
                                                <td><strong>تاريخ الإلغاء</strong></td>
                                                <td>{{ $canceledAt }}</td>
                                                <td><strong>تاريخ الوصول</strong></td>
                                                <td>{{ $arrivedAt }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>تاريخ الإدخال</strong></td>
                                                <td>{{ $enteredAt }}</td>
                                                <td><strong>تاريخ التفريغ</strong></td>
                                                <td>{{ $unloadedAt }}</td>
                                                <td><strong>تاريخ المغادرة</strong></td>
                                                <td>{{ $leftAt }}</td>
                                            </tr>

                                        </table>


                                    </div>


                                    <div class="tab-pane" id="linkIcon22" role="tabpanel" aria-labelledby="linkIcon22-tab1" aria-expanded="false">

                                        <table class="table table-bordered">
                                            <tr>
                                                <td><strong> # </strong></td>
                                                <td><strong>رقم الطلبية</strong></td>
                                                <td><strong>رقم الفاتورة</strong></td>
                                                <td><strong>اسم المشرف </strong></td>
                                                <td><strong> الوقت </strong></td>
                                                <td><strong> الحاله </strong></td>


                                            </tr>
                                            <tr>
                                                <?php $i = 0; ?>
                                                @foreach($order->PurchaseOrderUpdate as $order)
                                                <?php
                                                $status_name = 'غير معروف';
                                                $status_color = 'black';
                                                $time_background_color = 'white';

                                                if ($order->status_id == 1) {
                                                    $status_name = 'تم الإرسال';
                                                    $status_color = 'green';
                                                    $time_background_color = 'lightgreen';
                                                } elseif ($order->status_id == 2) {
                                                    $status_name = 'تم الإلغاء';
                                                    $status_color = 'red';
                                                    $time_background_color = 'lightcoral';
                                                } elseif ($order->status_id == 3) {
                                                    $status_name = 'تم الوصول';
                                                    $status_color = 'blue';
                                                    $time_background_color = 'lightblue';
                                                } elseif ($order->status_id == 4) {
                                                    $status_name = 'تم الدخول';
                                                    $status_color = 'orange';
                                                    $time_background_color = 'lightsalmon';
                                                } elseif ($order->status_id == 5) {
                                                    $status_name = 'تم التفريغ';
                                                    $status_color = 'purple';
                                                    $time_background_color = 'plum';
                                                } elseif ($order->status_id == 6) {
                                                    $status_name = 'تم المغادرة';
                                                    $status_color = 'gray';
                                                    $time_background_color = 'lightgray';
                                                }

                                                $created_at = $order->created_at;
                                                $date = explode(' ', $created_at)[0];
                                                $time = explode(' ', $created_at)[1];
                                                ?>
                                            <tr class="">
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $order->purchaseOrder->purchase_order_number }}</td>
                                                <td>{{ $order->purchaseOrder->invoice_number }}</td>
                                                <td>{{ $order->user ? $order->user->name : '---' }}</td>


                                                <td>
                                                    <span>{{ $date }}</span>
                                                    <span style="background-color: {{ $time_background_color }};border-radius: 5px; padding: 2px ;">{{ $time }}</span>
                                                </td>
                                                <td style="color: {{ $status_color }};">{{ $status_name }}</td>


                                            </tr>
                                            @endforeach

                                            </tr>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ================================================================================ -->

            </div>
        </div>
    </div>
</section>
@endsection
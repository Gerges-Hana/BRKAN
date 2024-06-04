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
                                                <td><strong>حالة الطلب</strong></td>
                                                <td>{{ $order->status_id }}</td>
                                                <td><strong>هاتف السائق</strong></td>
                                                <td>{{ $order->driver_phone }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>هاتف المندوب</strong></td>
                                                <td>{{ $order->rep_phone }}</td>
                                                <td><strong>تاريخ الوصول</strong></td>
                                                <td>{{ $order->arrival_date  }}</td>
                                                <td><strong>تاريخ الإلغاء</strong></td>
                                                <td>{{ $order->canceled_at }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>تاريخ التحديث</strong></td>
                                                <td>{{ $order->updated_at }}</td>
                                                <td><strong>تاريخ الوصول</strong></td>
                                                <td>{{ $order->arrived_at }}</td>
                                                <td><strong>تاريخ الإدخال</strong></td>
                                                <td>{{ $order->entered_at  }}</td>
                                            </tr>
                                            <tr>

                                                <td><strong>تاريخ التفريغ</strong></td>
                                                <td>{{ $order->unloaded_at  }}</td>
                                                <td><strong>تاريخ المغادرة</strong></td>
                                                <td>{{ $order->left_at }}</td>
                                                <td><strong>تاريخ الإنشاء</strong></td>
                                                <td>{{ $order->created_at }}</td>
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
                                                @foreach ($orders as $order)
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
                                                <td>{{ $order->user->name }}</td>


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
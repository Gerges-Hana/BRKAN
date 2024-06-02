@extends('admin.layout.master')

@section('tap-title')
المستخدمين
@endsection

@section('page-style-files')

@endsection


@section('content-header')
<div class="content-header-left col-md-6 col-12 mb-1">
    <h3 class="content-header-title">الطلبيات</h3>
</div>
<div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
    <div class="breadcrumb-wrapper col-12">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/orders">الرئيسية</a>
            </li>
            <li class="breadcrumb-item active">تفاصيل الطلبيات
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
                    <h4 class="card-title">تفاصيل الطلبيات</h4>
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
                                        <a class="nav-link active" id="activeIcon22-tab1" data-toggle="tab" href="#activeIcon22" aria-controls="activeIcon22" aria-expanded="true"><i class="la la-check"></i>عرض الفاتوره </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="linkIcon22-tab1" data-toggle="tab" href="#linkIcon22" aria-controls="linkIcon22" aria-expanded="false"><i class="la la-link"></i> تفاصيل الفاتوره</a>
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

                                        <p>Chocolate bar gummies sesame snaps. Liquorice cake sesame snaps
                                            cotton candy cake sweet brownie. Cotton candy candy canes
                                            brownie. Biscuit pudding sesame snaps pudding pudding sesame
                                            snaps biscuit tiramisu.</p>


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
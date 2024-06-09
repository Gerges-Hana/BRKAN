@extends('admin.layout.master')

@section('tap-title')
    الرئيسية
@endsection

@section('page-style-files')
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/charts/morris.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/charts/chartist.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/charts/chartist-plugin-tooltip.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/css-rtl/pages/dashboard-ecommerce.css')}}">

@endsection

@section('content-body')
    <!-- Start minimal statistics section -->
    <!-- <section id="minimal-statistics">
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="primary">500</h3>
                                    <h5>كل الطلبيات </h5>
                                </div>
                                <div class="align-self-center">
                                    <i class="fa fa-users primary font-large-3 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="danger">278</h3>
                                    <h5>الطلبيات</h5>
                                </div>
                                <div class="align-self-center">
                                    <i class="fa fa-cubes danger font-large-3 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="success">278</h3>
                                    <h5>الطلبيات المكتملة</h5>
                                </div>
                                <div class="align-self-center">
                                    <i class="fa fa-check success font-large-3 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="success">278</h3>
                                    <h5>الطلبيات الملغاه</h5>
                                </div>
                                <div class="align-self-center">
                                    <i class="fa fa-check success font-large-3 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="warning">278</h3>
                                    <h5>الطلبيات القادمة</h5>
                                </div>
                                <div class="align-self-center">
                                    <i class="fa fa-truck warning font-large-3 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <h2 style="font-size: 20px;">كل الطلبات</h2>
    <section id="minimal-statistics">
    <div class="row">
        <div class="col">
            <div class="card ">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="primary">{{$allPurchaseOrder->count()}}</h3>
                                <h5>كل الطلبيات </h5>
                            </div>
                            <div class="align-self-center">
                                <!-- <i class="fa fa-users primary font-large-3 float-right"></i> -->
                                <i class="icon-basket-loaded info font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="danger">{{$countStatus3_4_5}}</h3>
                                <h5>الطلبيات غير مكتمله</h5>
                            </div>
                            <div class="align-self-center">
                                <i class="fa fa-cubes danger font-large-3 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="success">{{$countStatus6}}</h3>
                                <h5>الطلبيات المكتملة</h5>
                            </div>
                            <div class="align-self-center">
                                <i class="fa fa-check success font-large-3 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="success">{{$countStatus2}}</h3>
                                <h5>الطلبيات الملغاه</h5>
                            </div>
                            <div class="align-self-center">
                                <!-- <i class="fa fa-check success font-large-3 float-right"></i> -->
                                <i class="fa fa-times-circle text-danger font-large-3 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card"style=" width: 215.53px;height: 100.51px;">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="warning">{{$countStatus1}}</h3>
                                <h5 >الطلبيات المرسله</h5>
                            </div>
                            <div class="align-self-center">
                                <i class="fa fa-truck warning font-large-3 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



    <!-- <section id="minimal-statistics">
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="primary">156</h3>
                                    <h5>العملاء</h5>
                                </div>
                                <div class="align-self-center">
                                    <i class="fa fa-users primary font-large-3 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="danger">278</h3>
                                    <h5>الطلبيات</h5>
                                </div>
                                <div class="align-self-center">
                                    <i class="fa fa-cubes danger font-large-3 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="success">278</h3>
                                    <h5>الطلبيات المكتملة</h5>
                                </div>
                                <div class="align-self-center">
                                    <i class="fa fa-check success font-large-3 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="warning">278</h3>
                                    <h5>الطلبيات القادمة</h5>
                                </div>
                                <div class="align-self-center">
                                    <i class="fa fa-truck warning font-large-3 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <h2 style="font-size: 20px;">طلبيات اليوم</h2>
    <section id="minimal-statistics">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="primary">{{$ordersToday}}</h3>
                                <h5> طلبيات اليوم</h5>
                            </div>
                            <div class="align-self-center">
                                <!-- <i class="fa fa-users primary font-large-3 float-right"></i> -->
                                <i class="icon-basket-loaded info font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="danger">{{$ordersTodayStatus3_4_5}}</h3>
                                <h5>غير مكتمله</h5>
                            </div>
                            <div class="align-self-center">
                                <i class="fa fa-cubes danger font-large-3 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="success">{{$ordersTodayStatus6}}</h3>
                                <h5> المكتملة</h5>
                            </div>
                            <div class="align-self-center">
                                <i class="fa fa-check success font-large-3 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="success">{{$ordersTodayStatus2}}</h3>
                                <h5> الملغاه</h5>
                            </div>
                            <div class="align-self-center">
                                <!-- <i class="fa fa-check success font-large-3 float-right"></i> -->
                                <i class="fa fa-times-circle text-danger font-large-3 float-right"></i>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col" >
            <div class="card"style=" width: 215.53px;height: 100.51px;">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="warning">{{$ordersTodayStatus1}}</h3>
                                <h5>الطلبيات القادمة</h5>
                            </div>
                            <div class="align-self-center">
                                <i class="fa fa-truck warning font-large-3 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- End minimal statistics section -->

    <!-- Start Pie charts section -->
    <section id="chartjs-pie-charts">
        <div class="row">
            <!-- Simple Pie Chart -->
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Simple Pie Chart</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <canvas id="simple-pie-chart" height="400"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Simple Doughnut Chart -->
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Simple Doughnut Chart</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <canvas id="simple-doughnut-chart" height="400"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products sell and New Orders -->
        <div class="row match-height">
          <div class="col-xl-12 col-12" id="ecommerceChartView">
            <div class="card card-shadow">
              <div class="card-header card-header-transparent py-20">
                <div class="btn-group dropdown">
                  <a href="#" class="text-body dropdown-toggle blue-grey-700" data-toggle="dropdown">PRODUCTS SALES</a>
                  <div class="dropdown-menu animate" role="menu">
                    <a class="dropdown-item" href="#" role="menuitem">Sales</a>
                    <a class="dropdown-item" href="#" role="menuitem">Total sales</a>
                    <a class="dropdown-item" href="#" role="menuitem">profit</a>
                  </div>
                </div>
                <ul class="nav nav-pills nav-pills-rounded chart-action float-right btn-group" role="group">
                  <li class="nav-item"><a class="active nav-link" data-toggle="tab" href="#scoreLineToDay">Day</a></li>
                  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#scoreLineToWeek">Week</a></li>
                  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#scoreLineToMonth">Month</a></li>
                </ul>
              </div>
              <div class="widget-content tab-content bg-white p-20">
                <div class="ct-chart tab-pane active scoreLineShadow" id="scoreLineToDay"></div>
                <div class="ct-chart tab-pane scoreLineShadow" id="scoreLineToWeek"></div>
                <div class="ct-chart tab-pane scoreLineShadow" id="scoreLineToMonth"></div>
              </div>
            </div>
          </div>
        </div>
        <!--/ Products sell and New Orders -->
    </section>
    <!-- End Pie charts section -->
@endsection

@section('page-script-files')
    <script src="{{asset('/app-assets/vendors/js/charts/chart.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/app-assets/vendors/js/charts/chartist.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/app-assets/vendors/js/charts/chartist-plugin-tooltip.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/app-assets/vendors/js/timeline/horizontal-timeline.js')}}" type="text/javascript"></script>
    <script src="{{asset('/app-assets/vendors/js/charts/raphael-min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/app-assets/vendors/js/charts/morris.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/app-assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/app-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js')}}" type="text/javascript"></script>
    <script src="{{asset('/app-assets/data/jvector/visitor-data.js')}}" type="text/javascript"></script>
    <script src="{{asset('/app-assets/js/scripts/charts/chartjs/pie-doughnut/pie.js')}}" type="text/javascript"></script>
    <script src="{{asset('/app-assets/js/scripts/charts/chartjs/pie-doughnut/pie-simple.js')}}" type="text/javascript"></script>
    <script src="{{asset('/app-assets/js/scripts/charts/chartjs/pie-doughnut/doughnut.js')}}" type="text/javascript"></script>
    <script src="{{asset('/app-assets/js/scripts/charts/chartjs/pie-doughnut/doughnut-simple.js')}}" type="text/javascript"></script>
@endsection

@section('scripts')
    <!-- <script src="{{asset('/app-assets/js/scripts/pages/dashboard-sales.js')}}" type="text/javascript"></script> -->
      <script src="{{asset('/app-assets/js/scripts/pages/dashboard-ecommerce.js')}}" type="text/javascript"></script>
@endsection

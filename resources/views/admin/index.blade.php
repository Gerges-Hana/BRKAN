@extends('admin.layout.master')

@section('tap-title')
    الرئيسية
@endsection

@section('page-style-files')
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/charts/morris.css')}}">
@endsection

@section('content-body')
    <!-- Start minimal statistics section -->
    <section id="minimal-statistics">
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

    </section>
    <!-- End Pie charts section -->
@endsection

@section('page-script-files')
    <script src="{{asset('/app-assets/vendors/js/charts/chart.min.js')}}" type="text/javascript"></script>
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
    <script src="{{asset('/app-assets/js/scripts/pages/dashboard-sales.js')}}" type="text/javascript"></script>
@endsection

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
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
@endsection

@section('content-body')

<h2 style="font-size: 20px;">كل الطلبات</h2>
<section id="minimal-statistics">
    <div class="row">
        <div class="col">
            <div class="card ">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="primary">{{$allPurchaseOrder}}</h3>
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
            <div class="card" style=" width: 215.53px;height: 100.51px;">
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
            <div class="card" style=" width: 215.53px;height: 100.51px;">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="warning">{{$countStatus1}}</h3>
                                <h5>الطلبيات المرسله</h5>
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
        <div class="col">
            <div class="card" style=" width: 215.53px;height: 100.51px;">
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

<section id="chartjs-pie-charts">
    <div class="row">
        <!-- Simple Pie Chart -->
        <div class="col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">حاله الطلبيات</h4>
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
                    <h4 class="card-title">طلبيات اليوم</h4>
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
                        <a href="#" class="text-body blue-grey-700">احصائيه الطلبيات المطلوبه </a>
                        <!-- <div class="dropdown-menu animate" role="menu">
                            <a class="dropdown-item" href="#" role="menuitem">Sales</a>
                            <a class="dropdown-item" href="#" role="menuitem">Total sales</a>
                            <a class="dropdown-item" href="#" role="menuitem">profit</a>
                        </div> -->
                    </div>
                    <ul class="nav nav-pills nav-pills-rounded chart-action float-right btn-group" role="group">
                        <li class="nav-item"><a class="active nav-link" data-toggle="tab"
                                href="#scoreLineToDay">اليوم</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#scoreLineToWeek">الاسبوع</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#scoreLineToMonth">الشهر</a>
                        </li>
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
<script src="{{asset('/app-assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js')}}"
    type="text/javascript"></script>
<script src="{{asset('/app-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js')}}"
    type="text/javascript"></script>
<script src="{{asset('/app-assets/data/jvector/visitor-data.js')}}" type="text/javascript"></script>
@endsection

@section('scripts')
<!-- ==========================stare simple-pie-chart===================================== -->
<script>
    $(window).on("load", function () {
        var ctx = $("#simple-pie-chart");
        var chartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            responsiveAnimationDuration: 500,
            legend: {
                labels: {
                    fontFamily: 'Cairo',
                    fontSize: 12
                }
            },
            tooltips: {
                bodyFontFamily: 'Cairo',
                bodyFontSize: 12
            }

        };

        var chartData = {
            labels: ["تم الارسال", "تم الدخول", "تم الوصول", "تم الالغاء", "تم المغادره"],
            datasets: [{
                label: "حاله الطلبيات",
                data: [
                    '{{$countStatus1}}',
                    '{{$countStatus2}}',
                    '{{$countStatus3}}',
                    '{{$countStatus4}}',
                    '{{$countStatus5}}',
                ],
                backgroundColor: ['#00A5A8', '#626E82', '#FF7D4D', '#FF4558', '#28D094'],
            }]
        };

        var config = {
            type: 'pie',
            options: chartOptions,
            data: chartData
        };
        var pieSimpleChart = new Chart(ctx, config);
    });
</script>
<!-- ==========================end simple-pie-chart========================================== -->

<!-- ==========================start simple-doughnut-chart=================================== -->
<script>
    $(window).on("load", function () {
        var ctx = $("#simple-doughnut-chart");
        var chartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            responsiveAnimationDuration: 500,
            legend: {
                labels: {
                    fontFamily: 'Cairo',  // هنا تحدد الخط المستخدم في التسميات
                    fontSize: 12
                }
            },
            tooltips: {
                bodyFontFamily: 'Cairo',  // هنا تحدد الخط المستخدم في تلميحات الأدوات
                bodyFontSize: 12
            }
        };
        var chartData = {
            labels: [
                "الطلبيات القادمه اليوم",
                "الطلبيات الملغاه اليوم",
                "الطلبيات الواصله",
                "الطلبات المدخله اليوم",
                "الطلبات المكتمله اليوم"
            ],
            datasets: [{
                label: "طلبيه اليوم",
                data: [
                    '{{$ordersTodayStatus1}}',
                    '{{$ordersTodayStatus2}}',
                    '{{$ordersTodayStatus3}}',
                    '{{$ordersTodayStatus4}}',
                    '{{$ordersTodayStatus5}}'
                ],
                backgroundColor: ['#00A5A8', '#626E82', '#FF7D4D', '#FF4558', '#28D094'],

            }]
        };
        var config = {
            type: 'doughnut',
            options: chartOptions,
            data: chartData
        };
        var doughnutSimpleChart = new Chart(ctx, config);
    });
</script>
<!-- ==========================end simple-doughnut-chart===================================== -->

<!-- ==========================staret ecommerce ChartView==================================== -->
<script>
    $(window).on("load", function () {
        $('#recent-buyers, #new-orders').perfectScrollbar({
            wheelPropagation: true
        });
        /********************************************
         *               Monthly Sales               *
         ********************************************/
        Morris.Bar.prototype.fillForSeries = function (i) {
            var color;
            return "0-#fff-#f00:20-#000";
        };
    });
    (function (window, document, $) {
        'use strict';
        /*************************************************
         *               Score Chart                      *
         *************************************************/
        (function () {
            var scoreChart = function scoreChart(id, labelList, series1List) {
                var scoreChart = new Chartist.Line('#' + id, {
                    labels: labelList,
                    series: [series1List]
                }, {
                    lineSmooth: Chartist.Interpolation.simple({
                        divisor: 2
                    }),
                    fullWidth: true,
                    chartPadding: {
                        right: 25
                    },
                    series: {
                        "series-1": {
                            showArea: false
                        }
                    },
                    axisX: {
                        showGrid: false
                    },
                    axisY: {
                        labelInterpolationFnc: function labelInterpolationFnc(value) {
                            return value / 1000 + 'K';
                        },
                        scaleMinSpace: 40
                    },
                    plugins: [Chartist.plugins.tooltip()],
                    low: 0,
                    showPoint: false,
                    height: 300
                });

                scoreChart.on('created', function (data) {
                    var defs = data.svg.querySelector('defs') || data.svg.elem('defs');
                    var width = data.svg.width();
                    var height = data.svg.height();

                    var filter = defs.elem('filter', {
                        x: 0,
                        y: "-10%",
                        id: 'shadow' + id
                    }, '', true);

                    filter.elem('feGaussianBlur', {
                        in: "SourceAlpha",
                        stdDeviation: "24",
                        result: 'offsetBlur'
                    });
                    filter.elem('feOffset', {
                        dx: "0",
                        dy: "32"
                    });

                    filter.elem('feBlend', {
                        in: "SourceGraphic",
                        mode: "multiply"
                    });

                    defs.elem('linearGradient', {
                        id: id + '-gradient',
                        x1: 0,
                        y1: 0,
                        x2: 1,
                        y2: 0
                    }).elem('stop', {
                        offset: 0,
                        'stop-color': 'rgba(22, 141, 238, 1)'
                    }).parent().elem('stop', {
                        offset: 1,
                        'stop-color': 'rgba(98, 188, 246, 1)'
                    });

                    return defs;
                }).on('draw', function (data) {
                    if (data.type === 'line') {
                        data.element.attr({
                            filter: 'url(#shadow' + id + ')'
                        });
                    } else if (data.type === 'point') {

                        var parent = new Chartist.Svg(data.element._node.parentNode);
                        parent.elem('line', {
                            x1: data.x,
                            y1: data.y,
                            x2: data.x + 0.01,
                            y2: data.y,
                            "class": 'ct-point-content'
                        });
                    }
                    if (data.type === 'line' || data.type == 'area') {
                        data.element.animate({
                            d: {
                                begin: 1000 * data.index,
                                dur: 1000,
                                from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                                to: data.path.clone().stringify(),
                                easing: Chartist.Svg.Easing.easeOutQuint
                            }
                        });
                    }
                });
            };

            var DayLabelList = ["اليوم", "الامس", "من 3 ايام", "من 4 ايام", "من 5 ايام", "من 6 ايام", "من 7 ايام", "من 8 ايام"];

            var DaySeries1List = {
                name: "series-1",
                data: ['{{$day_1}}', '{{$day_2}}', '{{$day_3}}', '{{$day_4}}', '{{$day_5}}', '{{$day_6}}', '{{$day_7}}', '{{$day_8}}']
            };

            var WeekLabelList = ["الاسبوع الحالي ", "الاسبوع السابق", "  من ثالث اسبوع ", "من رابع اسبوع  ", "من خامس اسبوع ", "من سادس اسبوع ", "من سابع اسبوع ", " من ثامن اسبوع "];

            var WeekSeries1List = {
                name: "series-1",
                data: ['{{$week_1}}', '{{$week_2}}', '{{$week_3}}', '{{$week_4}}', '{{$week_5}}', '{{$week_6}}', '{{$week_7}}', '{{$week_8}}']
            };
            var MonthLabelList = [
                "يناير",
                "فبراير",
                "مارس",
                "أبريل",
                "مايو",
                "يونيو",
                "يوليو",
                "أغسطس",
                "سبتمبر",
                "أكتوبر",
                "نوفمبر",
                "ديسمبر"
            ];
            var MonthSeries1List = {
                name: "series-1",
                data: ['{{$month_1}}', '{{$month_2}}', '{{$month_3}}', '{{$month_4}}', '{{$month_5}}', '{{$month_6}}', '{{$month_7}}', '{{$month_8}}', '{{$month_9}}', '{{$month_10}}', '{{$month_11}}', '{{$month_12}}']
            };
            var createChart = function createChart(button) {
                var btn = button || $("#ecommerceChartView .chart-action").find(".active");

                var chartId = btn.attr("href");
                switch (chartId) {
                    case "#scoreLineToDay":
                        scoreChart("scoreLineToDay", DayLabelList, DaySeries1List);
                        break;
                    case "#scoreLineToWeek":
                        scoreChart("scoreLineToWeek", WeekLabelList, WeekSeries1List);
                        break;
                    case "#scoreLineToMonth":
                        scoreChart("scoreLineToMonth", MonthLabelList, MonthSeries1List);
                        break;
                }
            };
            createChart();
            $(".chart-action li a").on("click", function () {
                createChart($(this));
            });
        })();

        /*************************************************
         *               Cost Revenue Stats               *
         *************************************************/
        new Chartist.Line('#cost-revenue', {
            labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
            series: [
                [{
                    meta: 'Revenue',
                    value: 5
                },
                {
                    meta: 'Revenue',
                    value: 3
                },
                {
                    meta: 'Revenue',
                    value: 6
                },
                {
                    meta: 'Revenue',
                    value: 3
                },
                {
                    meta: 'Revenue',
                    value: 8
                },
                {
                    meta: 'Revenue',
                    value: 5
                },
                {
                    meta: 'Revenue',
                    value: 8
                },
                {
                    meta: 'Revenue',
                    value: 12
                },
                {
                    meta: 'Revenue',
                    value: 7
                },
                {
                    meta: 'Revenue',
                    value: 14
                },

                ]
            ]
        }, {
            low: 0,
            high: 18,
            fullWidth: true,
            showArea: true,
            showPoint: true,
            showLabel: false,
            axisX: {
                showGrid: false,
                showLabel: false,
                offset: 0
            },
            axisY: {
                showGrid: false,
                showLabel: false,
                offset: 0
            },
            chartPadding: 0,
            plugins: [
                Chartist.plugins.tooltip()
            ]
        }).on('draw', function (data) {
            if (data.type === 'area') {
                data.element.attr({
                    'style': 'fill: #28D094; fill-opacity: 0.2'
                });
            }
            if (data.type === 'line') {
                data.element.attr({
                    'style': 'fill: transparent; stroke: #28D094; stroke-width: 4px;'
                });
            }
            if (data.type === 'point') {
                var circle = new Chartist.Svg('circle', {
                    cx: [data.x],
                    cy: [data.y],
                    r: [7],
                }, 'ct-area-circle');
                data.element.replace(circle);
            }
        });
    })(window, document, jQuery);
</script>
<!-- ==========================end ecommerce ChartView======================================= -->
@endsection
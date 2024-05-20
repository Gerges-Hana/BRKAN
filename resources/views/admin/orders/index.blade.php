@extends('admin.layout.master')

@section('tap-title')
    الطلبيات
@endsection

@section('page-style-files')
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/tables/jsgrid/jsgrid-theme.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/app-assets/vendors/css/tables/jsgrid/jsgrid.min.css')}}">
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
                        <a class="heading-elements-toggle"><i
                                class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard ">

                            <div id="basicScenario"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('page-script-files')
    <script src="{{asset('/app-assets/js/scripts/tables/jsgrid/jsgrid.js')}}" type="text/javascript"></script>
    <script src="{{asset('/app-assets/vendors/js/tables/jsgrid/jsgrid.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/app-assets/vendors/js/tables/jsgrid/griddata.js')}}" type="text/javascript"></script>
    <script src="{{asset('/app-assets/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/app-assets/vendors/js/tables/jszip.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/app-assets/vendors/js/tables/pdfmake.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/app-assets/vendors/js/tables/vfs_fonts.js')}}" type="text/javascript"></script>
    <script src="{{asset('/app-assets/vendors/js/tables/buttons.html5.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/app-assets/vendors/js/tables/buttons.print.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/app-assets/vendors/js/tables/buttons.colVis.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/app-assets/js/scripts/tables/datatables-extensions/datatable-button/datatable-html5.js')}}" type="text/javascript"></script>
@endsection

@extends('admin.layout.master')

@section('tap-title')
@endsection
طلب فحص منشأة
@section('page-style-files')
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css-rtl/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css-rtl/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css-rtl/plugins/forms/wizard.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css-rtl/plugins/pickers/daterange/daterange.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style-rtl.css">
    <!-- END Custom CSS-->
@endsection

@section('content-header')
    <div class="content-header-left col-md-6 col-12 mb-1">
        <h3 class="content-header-title">طلب فحص منشأة </h3>
    </div>
    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">الرئيسية</a>
                <li class="breadcrumb-item"><a href="/company">الشركات</a></li>
                <li class="breadcrumb-item active">طلب فحص منشأة</li>
            </ol>
        </div>
    </div>
@endsection

@section('content-body')
    <section id="html5">
        <div class="row">
            <div class="col-12">
                <div class="card p-2 ">
                    <p>فحص منشأة لاكتشاف التحديات التي تواجه الموارد البشرية لديكم والفرص المهدرة لتحسين الانتاجية في العمل
                        وزيادة الربحية لمنشأتكم</p>
                </div>

                <!-- Form wizard with step validation section start -->
                <section id="validation">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">طلب فحص منشأة</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form action="{{route('companies.store.report')}}" method="POST" class="steps-validation wizard-circle"enctype="multipart/form-data">
                                            @csrf
                                           
                                            <!-- Step 1 -->
                                            <h6>Step 1</h6>
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="emailAddress5">
                                                                البريد الالكتروني :                                                                <span class="danger">*</span>
                                                            </label>
                                                            <input type="text" class="form-control required"
                                                                id="emailAddress5" name="email">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="lastName3">
                                                                اسم المنشأة :
                                                                <span class="danger">*</span>
                                                            </label>
                                                            <input type="text" class="form-control required"
                                                                id="lastName3" name="company_name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="firstName3">
                                                                اسم المسؤول :

                                                                <span class="danger">*</span>
                                                            </label>
                                                            <input type="text" class="form-control required"
                                                                id="firstName3" name="representative_name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="location">
                                                                المسمى الوظيفي :
                                                                <span class="danger">*</span>
                                                            </label>
                                                            <input type="text" class="form-control required"
                                                                id="emailAddress5" name="job_title">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="phoneNumber3">الجوال :</label>
                                                            <input type="tel" class="form-control" id="phoneNumber3"
                                                                name="phone_number">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </fieldset>
                                            <!-- Step 2 -->
                                            <h6>Step 2</h6>
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="proposalTitle3">
                                                                الرجاء تجهيز المعلومات من وزارة الموارد البشرية
                                                                الدخول على موقع وزارة الموارد البشرية
                                                                <span class="danger">*</span>
                                                            </label>
                                                            <br>
                                                            <br>
                                                            <a href="https://drive.google.com/file/d/18Jw_hOk3iyIHEZUWU5oG2uwXtbG0-FCh/view">الشاشات المطلوبة</a>
                                                            {{-- <input type="text" class="form-control required"
                                                                id="proposalTitle3" name="proposalTitle"> --}}
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="emailAddress6">
                                                                الرجاء ارفاق الشاشات المطلوبة
                                                                
                                                                <span class="danger">*</span>
                                                            </label>
                                                            <input type="file" class="form-control required"
                                                                id="emailAddress6" name="required_screens">
                                                        </div>



                                                        


                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="videoUrl3">نموذج سرية المعلومات
                                                                الرجاء تحميل النموذج وتعبئته والتوقيع والختم ثم ارفاقه </label>
                                                                <br>
                                                                <br>
                                                           <a href="https://docs.google.com/document/d/1Km3d9qoJmTAHaON3qEBaSTXp6f7wURtq/edit">تحميل النموذج</a>
                                                                {{-- <input type="file" class="form-control" id="videoUrl3"
                                                                name="gg"> --}}
                                                        </div>


                                                        <div class="form-group">
                                                            <label for="jobTitle5">
                                                                ارفاق نموذج سرية المعلومات                                                                <span class="danger">*</span>
                                                            </label>
                                                            <input type="file" class="form-control required"
                                                                id="jobTitle5" name="confidentiality_form">
                                                        </div>


                                                        
                                                    </div>



                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="shortDescription3">Short Description :</label>
                                                            <textarea name="description" id="shortDescription3" rows="4" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Form wizard with step validation section end -->

            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="../../../app-assets/vendors/js/extensions/jquery.steps.min.js" type="text/javascript"></script>
    <script src="../../../app-assets/vendors/js/pickers/dateTime/moment-with-locales.min.js" type="text/javascript">
    </script>
    <script src="../../../app-assets/vendors/js/pickers/daterange/daterangepicker.js" type="text/javascript"></script>
    <script src="../../../app-assets/vendors/js/forms/validation/jquery.validate.min.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->

    <!-- BEGIN PAGE LEVEL JS-->
    <script src="../../../app-assets/js/scripts/forms/wizard-steps.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
@endsection

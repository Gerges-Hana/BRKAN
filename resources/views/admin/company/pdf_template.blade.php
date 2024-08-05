@extends('admin.layout.master')

@section('page-style-files')
    <style>
        @media print {
            #print_Button {
                display: none;
            }
        }
    </style>
    <style>
        body {
            font-family: 'Amiri', serif;
            direction: rtl;
            text-align: justify;
            margin: 50px;
            line-height: 2;
            /* لضبط المسافة بين الأسطر */
        }

        h1 {
            text-align: center;
        }

        p,
        ol,
        ul {
            margin-bottom: 20px;
            line-height: 2;

        }

        ol,
        ul {
            padding-right: 20px;
            /* لضبط المسافة البادئة للقوائم */
        }
    </style>
@endsection
@section('tap-title')
    طلب فحص منشأة
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
    <!-- row -->
    <div class="row row-sm">
        <div class="col-md-12 col-xl-12">
            <div class=" main-content-body-invoice" id="print">
                <div id="pag1">
                    <div class="card card-invoice ">
                        <img src="{{ asset('assets/image/header.png') }}" class="w-100" alt="Logo">
                        <div class="card-body ">
                            <div class=" mg-t-20 px-4">
                                <p class="text-center font-weight-bold">اتفاقية عدم إفشاء الأسرار وعدم المنافسة</p>
                                <br>
                                @php
                                use Carbon\Carbon;
                            @endphp
                            
                            <p class="font-weight-bold">إنه في يوم الأحد الموافق {{ Carbon::parse($company->created_at)->format('j/n/Y') }}م</p>
                            
                                {{-- <p class="font-weight-bold">إنه في يوم الأحد الموافق {{ Carbon::parse($company->created_at)->format('j/n/Y') }}م</p> --}}
                                <br>
                                <p class="font-weight-bold">تم الاتفاق بين كلا من:</p>


                                <p>1) خبير التوطين للاستشارات برقم ترخيص (8560) ويشار إليه في هذه الاتفاقية   خبير التوطين للاستشارات        (الطرف
                                    الأول)</p>
                                <p>2) شركة برقم السجل ( {{$company->commercial}}) ويشار إليها في هذه الاتفاقية {{$company->company_name}}        (الطرف الثاني)</p>

                                <p>بما أن خبير التوطين للاستشارات يقوم بتقديم خدمات تتضمن معلومات وأسرار تجارية وأمور تعتبر
                                    حيوية وهامة لعملها تخص الموظفين وبيانات
                                    {{-- </p>
                                <p> --}}
                                    الحاسب الآلي والأنظمة والإجراءات وباقي المعلومات ذات الصلة بالشركة فيما يخص الموارد
                                    البشرية, والتي تشتمل على معلومات تخص الموظفين
                                    {{-- </p>
                                <p> --}}
                                    السعوديين وغير السعوديين.</p>


                                <p>وتعتبر جميع هذه المعلومات سرية وذات قيمة عالية لكونها معلومات حساسة تخص نشاط المجموعة,
                                    وبما أن الطرف الأول بحكم عمله مع
                                    {{-- </p>
                                <p> --}}
                                    الطرف الثاني وبحكم مهامه يطلع على تلك الأسرار والمعلومات لذا يجب أن تكون طي الكتمان
                                    والمحافظة على سريتها وحسن الاستخدام الجيد

                                    {{-- </p>
                                <p> --}}
                                    للمعلومات.</p>
                                <br>
                                <p class="font-weight-bold">لذا فقد تم الاتفاق بين الطرفين وهما في كامل الأهلية المعتبرة
                                    شرعا وقانونا على الآتي:</p>
                                <br>

                                <p>اولا : التمهيد أعلاه جزء لا يتجزأ من هذه الاتفاقية ومكملا ومفسرا لها.</p>
                                <p>
                                <p>ثانيا : لا يحق للطرف الأول بشكل مباشر أو غير مباشر نشر أو إفشاء أو البوح أو النسخ وذلك
                                    لمصلحته الخاصة أو لمصلحة أي شخص آخر
                                    {{-- </p>
                                <p> --}}
                                    سواء أفراد أو شركات أو أي أسرار تجارية أو معلومات اطلع عليها الطرف الأول بحكم
                                    عمله مع الطرف الثاني سواء المذكورة بالتفصيل في المقدمة
                                    {{-- </p>
                                <p> --}}
                                    أعلاه أو أي معلومات تخص أعمال المجموعة.
                                    {{-- </p> --}}
                                </p>
                                <p>ثالثا : لا يجوز للطرف الأول استخدام المعلومات السرية إلا بمقدار الحاجة لأداء مهامه المتفق
                                    عليها من الطرف الثاني فقط.</p>

                            </div>
                        </div>
                        <img src="{{ asset('assets/image/footer.png') }}" class="w-100" alt="Logo">
                    </div>
                </div>
                <div id="pag2">
                    <div class="card card-invoice ">
                        <img src="{{ asset('assets/image/header.png') }}" class="w-100" alt="Logo">
                        <div class="card-body p-4">
                            <div class=" mg-t-20 p-4">
                                <p>
                                    رابعاً: يلتزم الطرف الأول بعدم الكشف عن تلك المعلومات أو نسخها أو تعميمها على الغير أو
                                    بيعها أو إقراضها أو تغييرها أو إتلافها وتدميرها ما لم
                                    {{-- </p>

                                <p> --}}
                                    يسمح له بذلك فعليا الطرف الثاني (يتحمل الطرف الأول وعلى مسؤوليته أي أضرار تنتج عن نشر
                                    هذه المعلومات الخاصة بالطرف الثاني لأي جهة
                                    {{-- </p>
                                <p> --}}
                                    كانت دون موافقته)</p>
                                <br>
                                <br>
                                <br>
                                <p>خامساً: يلتزم الطرف الأول بحماية الرقم السري الخاص باستخدام نظام المجموعة الإلكتروني أو
                                    أي أرقام سرية خاصة به تمكنه من الوصول إلى
                                    {{-- </p>
                                <p> --}}
                                    المعلومات وعدم الكشف عنها لأي شخص أو جهة أخرى (يتحمل الطرف الأول وعلى مسؤوليته أي أضرار
                                    تنتج عن نشر هذه المعلومات الخاصة
                                    {{-- </p>
                                <p> --}}
                                    بالطرف الثاني لأي جهة كانت دون موافقته)</p>
                                <br>
                                <p><br>
                                    سادساً: يقر الطرفان بأنهما اطلعا اطلاعاً جيداً على شروط هذه الاتفاقية ويلتزما بتنفيذ
                                    جميع
                                    بنودها بحسن نية.</p>
                                <p class="text-center font-weight-bold" style="text-align: center;">وعلى ذلك تم الاتفاق</p>
                                <br><br>
                                <div class="container">
                                    <div class="d-flex col-12">
                                        <div class="col-6">

                                            <div class="flote-left  mx-4">
                                                <p>الطرف الاول</p>
                                                <p>خبير التوطين للاستشارات</p>
                                                <p>الرئيس التنفيذي</p>
                                                <p>الاسم: عابد عقاد</p>
                                                <p>التوقيع: tawteen</p>
                                            </div>
                                        </div>
                                        <div class="col-6">

                                            <div class="flote-left  mx-4">
                                                <p>الطرف الثاني</p>
                                                <p>شركة</p>
                                                <p>الاسم:</p>
                                                <p>التوقيع:</p>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <img src="{{ asset('assets/image/footer.png') }}" class="w-100" alt="Logo">
                        </div>
                    </div>




                </div>
            </div><!-- COL-END -->
            <div class="  ">
                <button class="btn btn-danger  float-left mt-3 mr-2" id="print_Button" onclick="printDiv()"> <i
                        class="mdi mdi-printer ml-1"></i>طباعة</button>

                <a href="{{ url('/') }}" class="btn btn-primary btn   float-left mt-3 mr-2">رجوع</a>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <!--Internal  Chart.bundle js -->
    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>


    <script type="text/javascript">
        // function printDiv() {
        //     var printContents = document.getElementById('print').innerHTML;
        //     var originalContents = document.body.innerHTML;
        //     document.body.innerHTML = printContents;
        //     window.print();
        //     document.body.innerHTML = originalContents;
        //     location.reload();
        // }



        function printDiv() {
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;

            // التأكد من تحميل الصور
            var images = document.images;
            var loadedImages = 0;
            var totalImages = images.length;

            function checkLoaded() {
                loadedImages++;
                if (loadedImages === totalImages) {
                    window.print();
                    document.body.innerHTML = originalContents;
                    location.reload();
                }
            }

            for (var i = 0; i < totalImages; i++) {
                if (images[i].complete) {
                    checkLoaded();
                } else {
                    images[i].onload = checkLoaded;
                    images[i].onerror = checkLoaded; // لتجنب تعليق العملية إذا تعذرت تحميل الصورة
                }
            }
        }
    </script>
@endsection

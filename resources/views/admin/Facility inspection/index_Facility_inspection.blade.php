@extends('admin.layout.master')

@section('tap-title')
    طلب فحص منشأة
@endsection
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
        <h3 class="content-header-title">فحص منشأة كبرى </h3>
    </div>
    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">الرئيسية</a>
                <li class="breadcrumb-item"><a href="/company">الشركات</a></li>
                <li class="breadcrumb-item active">فحص منشأة كبرى </li>
            </ol>
        </div>
    </div>
@endsection

@section('content-body')
    <div class="row match-height">


        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-tooltip"> اسم الشركه : uu</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
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
                        {{-- <div class="card-text">
              <p>This form shows tooltips on hover to provide useful information
                while user is filling the form. Use data attributes like
                toggle <code>data-toggle</code>, trigger <code>data-trigger</code>,
                placement <code>data-placement</code>, title <code>data-title</code>                        to show tooltips on form controls.</p>
            </div> --}}
                        <form class="form">
                            <div class="form-body">



                                <div class="form-group">
                                    <label>أهداف رفع النطاق</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="goals[]" id="goal1"
                                            value="التخلص من النطاق الاحمر">
                                        <label class="form-check-label" for="goal1">
                                            التخلص من النطاق الاحمر
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="goals[]" id="goal2"
                                            value="التوسع في النشاط ( رفع رصيد التأشيرات )">
                                        <label class="form-check-label" for="goal2">
                                            التوسع في النشاط ( رفع رصيد التأشيرات )
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="goals[]" id="goal3"
                                            value="تكاليف التوطين عالية">
                                        <label class="form-check-label" for="goal3">
                                            تكاليف التوطين عالية
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="activitySelect">النشاط :</label>
                                    <select id="activitySelect" class="form-control">
                                        <option value="">اختيار</option>
                                        <option value="الإنتاج الزراعي والحيواني وخدماتها واندية الفروسية">الإنتاج الزراعي
                                            والحيواني وخدماتها واندية الفروسية</option>
                                        <option value="المواد الهيدروكربونية وعملياتها">المواد الهيدروكربونية وعملياتها
                                        </option>
                                        <option value="الصناعات">الصناعات</option>
                                        <option value="مقاولات التشييد والبناء والنظافة">مقاولات التشييد والبناء والنظافة
                                        </option>
                                        <option value="التشغيل والصيانة">التشغيل والصيانة</option>
                                        <option value="الجملة والتجزئة">الجملة والتجزئة</option>
                                        <option value="مطاعم مع الخدمة لا تشمل مطاعم الوجبات السريعة">مطاعم مع الخدمة لا
                                            تشمل مطاعم الوجبات السريعة</option>
                                        <option value="مطاعم خدمة سريعة ومحلات الإيس كريم">مطاعم خدمة سريعة ومحلات الإيس
                                            كريم</option>
                                        <option value="المقاهي ومحلات تقديم المشروبات">المقاهي ومحلات تقديم المشروبات
                                        </option>
                                        <option value="التموين والاعاشة">التموين والاعاشة</option>
                                        <option value="السلع النسائية، بيع الهواتف المحمولة وصيانتها">السلع النسائية، بيع
                                            الهواتف المحمولة وصيانتها</option>
                                        <option value="النقل البري والتخزين">النقل البري والتخزين</option>
                                        <option value="النقل البحري والجوي">النقل البحري والجوي</option>
                                        <option value="المؤسسات المالية">المؤسسات المالية</option>
                                        <option value="خدمات الأعمال">خدمات الأعمال</option>
                                        <option value="الخدمات الاجتماعية">الخدمات الاجتماعية</option>
                                        <option value="الخدمات الشخصية">الخدمات الشخصية</option>
                                        <option value="التعليم العالي">التعليم العالي</option>
                                        <option value="مدارس البنات ورياض الأطفال والحضانات">مدارس البنات ورياض الأطفال
                                            والحضانات</option>
                                        <option value="المدارس الأجنبية">المدارس الأجنبية</option>
                                        <option value="المختبرات والخدمات الصحية">المختبرات والخدمات الصحية</option>
                                        <option value="الإيواء والترفيه والسياحة">الإيواء والترفيه والسياحة</option>
                                        <option value="السلع الأساسية والمحروقات">السلع الأساسية والمحروقات</option>
                                        <option value="مدارس البنين ومجمعات البنين والبنات">مدارس البنين ومجمعات البنين
                                            والبنات</option>
                                        <option value="حراسات امنية ومكاتب التوظيف الاهلية">حراسات امنية ومكاتب التوظيف
                                            الاهلية</option>
                                        <option value="حلول الاتصالات">حلول الاتصالات</option>
                                        <option value="أنشطة البريد">أنشطة البريد</option>
                                        <option value="البنية التحتية لتقنية المعلومات">البنية التحتية لتقنية المعلومات
                                        </option>
                                        <option value="البنية التحتية للاتصالات">البنية التحتية للاتصالات</option>
                                        <option value="التشغيل والصيانة للاتصالات">التشغيل والصيانة للاتصالات</option>
                                        <option value="التشغيل والصيانة لتقنية المعلومات">التشغيل والصيانة لتقنية المعلومات
                                        </option>
                                        <option value="حلول تقنية المعلومات">حلول تقنية المعلومات</option>
                                        <option value="الكيانات المجمعة">الكيانات المجمعة</option>
                                        <option value="تعدين المعادن الفلزية والاحجار الكريمة">تعدين المعادن الفلزية
                                            والاحجار الكريمة</option>
                                        <option value="تعدين المعادن غير الفلزية والصناعية">تعدين المعادن غير الفلزية
                                            والصناعية</option>
                                        <option value="تعدين مواد البناء">تعدين مواد البناء</option>
                                        <option value="الطاقة والمياه وخدماتها">الطاقة والمياه وخدماتها</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="issueinput1">عدد العملاء المستمرين : </label>
                                    <input type="text" id="issueinput1" class="form-control"
                                        placeholder="issue title" name="issuetitle" data-toggle="tooltip"
                                        data-trigger="hover" data-placement="top" data-title="Issue Title">
                                </div>
                                <div class="form-group">
                                    <label for="issueinput1">عدد العملاء المنقطعين : </label>
                                    <input type="text" id="issueinput1" class="form-control"
                                        placeholder="issue title" name="issuetitle" data-toggle="tooltip"
                                        data-trigger="hover" data-placement="top" data-title="Issue Title">
                                </div>

                                <div class="form-group">
                                    <label for="issueinput1">عدد العملاء المستمرين في النظام : </label>
                                    <input type="text" id="issueinput1" class="form-control"
                                        placeholder="issue title" name="issuetitle" data-toggle="tooltip"
                                        data-trigger="hover" data-placement="top" data-title="Issue Title">
                                </div>
                                <div class="form-group">
                                    <label for="issueinput1"> عدد العملاء المنقطعين في النظام : </label>
                                    <input type="text" id="issueinput1" class="form-control"
                                        placeholder="issue title" name="issuetitle" data-toggle="tooltip"
                                        data-trigger="hover" data-placement="top" data-title="Issue Title">
                                </div>





                                <div class="form-group">
                                    <label for="activitySelect">النشاط :</label>
                                    <select id="activitySelect" class="form-control">
                                        <option value="اختيار قطاع">اختيار قطاع</option>
                                        <option value="بيع الجملة و التجزئة">بيع الجملة و التجزئة</option>
                                        <option value="بيع المواد الغذائية">بيع المواد الغذائية</option>
                                        <option value="بيع قطع غيار السيارات">بيع قطع غيار السيارات</option>
                                        <option value="بيع اجهزة وقطع الحاسب الالي">بيع اجهزة وقطع الحاسب الالي</option>
                                        <option value="بيع الملابس">بيع الملابس</option>
                                        <option value="بيع الملبوسات الجاهزة">بيع الملبوسات الجاهزة</option>
                                        <option value="بيع وشراء الذهب والمجوهرات">بيع وشراء الذهب والمجوهرات</option>
                                        <option value="بيع وشراء الاراضي والعقارات">بيع وشراء الاراضي والعقارات</option>
                                        <option value="بيع وشراء السيارات">بيع وشراء السيارات</option>
                                        <option value="مكاتب تخليص جمركي">مكاتب تخليص جمركي</option>
                                        <option value="مكاتب ترجمة">مكاتب ترجمة</option>
                                        <option value="مكاتب توريد العمالة">مكاتب توريد العمالة</option>
                                        <option value="مكاتب تسليف اموال">مكاتب تسليف اموال</option>
                                        <option value="مكاتب تاجير معدات">مكاتب تاجير معدات</option>
                                        <option value="مكاتب سفر وسياحة">مكاتب سفر وسياحة</option>
                                        <option value="محلات بيع العود والعطور">محلات بيع العود والعطور</option>
                                        <option value="محلات بيع الطيور والحيوانات">محلات بيع الطيور والحيوانات</option>
                                        <option value="محلات بيع الحلويات">محلات بيع الحلويات</option>
                                        <option value="محلات بيع الفاكهة والخضار">محلات بيع الفاكهة والخضار</option>
                                        <option value="محلات بيع الاحذية">محلات بيع الاحذية</option>
                                        <option value="محلات بيع العاب الاطفال">محلات بيع العاب الاطفال</option>
                                        <option value="محلات بيع المكسرات والبقوليات">محلات بيع المكسرات والبقوليات
                                        </option>
                                        <option value="محلات بيع القرطاسية">محلات بيع القرطاسية</option>
                                        <option value="محلات بيع الحقائب">محلات بيع الحقائب</option>
                                        <option value="محلات بيع مواد البناء">محلات بيع مواد البناء</option>
                                        <option value="محلات بيع الاجهزة الكهربائية">محلات بيع الاجهزة الكهربائية</option>
                                        <option value="محلات بيع اللحوم">محلات بيع اللحوم</option>
                                        <option value="محلات بيع الكتب">محلات بيع الكتب</option>
                                        <option value="محلات بيع الخردوات">محلات بيع الخردوات</option>
                                        <option value="محلات بيع الاسماك">محلات بيع الاسماك</option>
                                        <option value="محلات بيع الخيام وملحقاتها">محلات بيع الخيام وملحقاتها</option>
                                        <option value="محلات بيع الزهور">محلات بيع الزهور</option>
                                        <option value="محلات بيع الملابس الداخلية">محلات بيع الملابس الداخلية</option>
                                        <option value="محلات بيع المنظفات">محلات بيع المنظفات</option>
                                        <option value="محلات بيع الالبان">محلات بيع الالبان</option>
                                        <option value="محلات بيع الزيوت والشحوم">محلات بيع الزيوت والشحوم</option>
                                        <option value="محلات بيع المواد الكيميائية">محلات بيع المواد الكيميائية</option>
                                        <option value="محلات بيع المجوهرات والاكسسوارات">محلات بيع المجوهرات والاكسسوارات
                                        </option>
                                        <option value="محلات بيع السجاد والموكيت">محلات بيع السجاد والموكيت</option>
                                        <option value="محلات بيع الستائر">محلات بيع الستائر</option>
                                        <option value="محلات بيع الدواجن">محلات بيع الدواجن</option>
                                        <option value="محلات بيع الزهور الطبيعية">محلات بيع الزهور الطبيعية</option>
                                        <option value="محلات بيع الساعات">محلات بيع الساعات</option>
                                        <option value="محلات بيع الاجهزة المنزلية">محلات بيع الاجهزة المنزلية</option>
                                        <option value="محلات بيع المفروشات">محلات بيع المفروشات</option>
                                        <option value="محلات بيع الحواسيب">محلات بيع الحواسيب</option>
                                        <option value="محلات بيع الدراجات">محلات بيع الدراجات</option>
                                        <option value="محلات بيع الالعاب الالكترونية">محلات بيع الالعاب الالكترونية
                                        </option>
                                        <option value="محلات بيع الزجاج والالمنيوم">محلات بيع الزجاج والالمنيوم</option>
                                        <option value="محلات بيع الاثاث">محلات بيع الاثاث</option>
                                        <option value="محلات بيع التمور">محلات بيع التمور</option>
                                        <option value="محلات بيع الفضة">محلات بيع الفضة</option>
                                        <option value="محلات بيع الكماليات">محلات بيع الكماليات</option>
                                        <option value="محلات بيع الورود">محلات بيع الورود</option>
                                        <option value="محلات بيع الخضار">محلات بيع الخضار</option>
                                        <option value="محلات بيع العسل">محلات بيع العسل</option>
                                        <option value="محلات بيع اللحوم والدواجن">محلات بيع اللحوم والدواجن</option>
                                        <option value="محلات بيع البيض">محلات بيع البيض</option>
                                        <option value="محلات بيع الزيوت">محلات بيع الزيوت</option>
                                        <option value="محلات بيع الورود والنباتات">محلات بيع الورود والنباتات</option>
                                        <option value="محلات بيع المواد الصحية">محلات بيع المواد الصحية</option>
                                        <option value="محلات بيع المواد الكهربائية">محلات بيع المواد الكهربائية</option>
                                        <option value="محلات بيع المنتجات الطبية">محلات بيع المنتجات الطبية</option>
                                        <option value="محلات بيع المنتجات النسائية">محلات بيع المنتجات النسائية</option>
                                        <option value="محلات بيع الاواني المنزلية">محلات بيع الاواني المنزلية</option>
                                        <option value="محلات بيع الالعاب">محلات بيع الالعاب</option>
                                        <option value="محلات بيع المواد الصيدلانية">محلات بيع المواد الصيدلانية</option>
                                        <option value="محلات بيع المواد الغذائية بالجملة">محلات بيع المواد الغذائية بالجملة
                                        </option>
                                        <option value="محلات بيع الاثاث المنزلي">محلات بيع الاثاث المنزلي</option>
                                        <option value="محلات بيع ادوات الصيد">محلات بيع ادوات الصيد</option>
                                        <option value="محلات بيع التوابل والبهارات">محلات بيع التوابل والبهارات</option>
                                        <option value="محلات بيع الالعاب النارية">محلات بيع الالعاب النارية</option>
                                        <option value="محلات بيع السجاد">محلات بيع السجاد</option>
                                        <option value="محلات بيع الفواكه المجففة">محلات بيع الفواكه المجففة</option>
                                        <option value="محلات بيع الكماليات والاكسسوارات">محلات بيع الكماليات والاكسسوارات
                                        </option>
                                        <option value="محلات بيع المعدات الزراعية">محلات بيع المعدات الزراعية</option>
                                        <option value="محلات بيع مواد التجميل">محلات بيع مواد التجميل</option>
                                        <option value="محلات بيع المنتجات الطبيعية">محلات بيع المنتجات الطبيعية</option>
                                        <option value="محلات بيع المواد العضوية">محلات بيع المواد العضوية</option>
                                        <option value="محلات بيع السلع المستعملة">محلات بيع السلع المستعملة</option>
                                        <option value="محلات بيع المنظفات والكيماويات">محلات بيع المنظفات والكيماويات
                                        </option>
                                        <option value="محلات بيع منتجات البحر">محلات بيع منتجات البحر</option>
                                        <option value="محلات بيع العطور">محلات بيع العطور</option>
                                        <option value="محلات بيع مستحضرات التجميل">محلات بيع مستحضرات التجميل</option>
                                        <option value="محلات بيع السجاد والمفروشات">محلات بيع السجاد والمفروشات</option>
                                        <option value="محلات بيع الاجهزة الكهربائية المنزلية">محلات بيع الاجهزة الكهربائية
                                            المنزلية</option>
                                        <option value="محلات بيع المواد المنزلية">محلات بيع المواد المنزلية</option>
                                        <option value="محلات بيع مستلزمات الاطفال">محلات بيع مستلزمات الاطفال</option>
                                        <option value="محلات بيع المواد الغذائية المعلبة">محلات بيع المواد الغذائية المعلبة
                                        </option>


                                    </select>
                                </div>



                                <div class="form-group">
                                    <label for="issueinput1"> عدد العملاء المستمرين : </label>
                                    <input type="text" id="issueinput1" class="form-control"
                                        placeholder="issue title" name="issuetitle" data-toggle="tooltip"
                                        data-trigger="hover" data-placement="top" data-title="Issue Title">
                                </div>

                                <div class="form-group">
                                    <label for="issueinput1"> عدد العملاء المنقطعين : </label>
                                    <input type="text" id="issueinput1" class="form-control"
                                        placeholder="issue title" name="issuetitle" data-toggle="tooltip"
                                        data-trigger="hover" data-placement="top" data-title="Issue Title">
                                </div>
                                <div class="form-group">
                                    <label for="issueinput1"> عدد العملاء المستمرين في النظام : </label>
                                    <input type="text" id="issueinput1" class="form-control"
                                        placeholder="issue title" name="issuetitle" data-toggle="tooltip"
                                        data-trigger="hover" data-placement="top" data-title="Issue Title">
                                </div>
                                <div class="form-group">
                                    <label for="issueinput1"> عدد العملاء المنقطعين في النظام : </label>
                                    <input type="text" id="issueinput1" class="form-control"
                                        placeholder="issue title" name="issuetitle" data-toggle="tooltip"
                                        data-trigger="hover" data-placement="top" data-title="Issue Title">
                                </div>


                                {{-- --------------------------------------------------------------------------------  --}}

                                <div class="form-group">
                                    <label for="activitySelect">النشاط :</label>
                                    <select id="activitySelect" class="form-control">
                                        <option value="">اختيار</option>
                                        <option value="الإنتاج الزراعي والحيواني وخدماتها واندية الفروسية">الإنتاج الزراعي
                                            والحيواني وخدماتها واندية الفروسية</option>
                                        <option value="المواد الهيدروكربونية وعملياتها">المواد الهيدروكربونية وعملياتها
                                        </option>
                                        <option value="الصناعات">الصناعات</option>
                                        <option value="مقاولات التشييد والبناء والنظافة">مقاولات التشييد والبناء والنظافة
                                        </option>
                                        <option value="التشغيل والصيانة">التشغيل والصيانة</option>
                                        <option value="الجملة والتجزئة">الجملة والتجزئة</option>
                                        <option value="مطاعم مع الخدمة لا تشمل مطاعم الوجبات السريعة">مطاعم مع الخدمة لا
                                            تشمل مطاعم الوجبات السريعة</option>
                                        <option value="مطاعم خدمة سريعة ومحلات الإيس كريم">مطاعم خدمة سريعة ومحلات الإيس
                                            كريم</option>
                                        <option value="المقاهي ومحلات تقديم المشروبات">المقاهي ومحلات تقديم المشروبات
                                        </option>
                                        <option value="التموين والاعاشة">التموين والاعاشة</option>
                                        <option value="السلع النسائية، بيع الهواتف المحمولة وصيانتها">السلع النسائية، بيع
                                            الهواتف المحمولة وصيانتها</option>
                                        <option value="النقل البري والتخزين">النقل البري والتخزين</option>
                                        <option value="النقل البحري والجوي">النقل البحري والجوي</option>
                                        <option value="المؤسسات المالية">المؤسسات المالية</option>
                                        <option value="خدمات الأعمال">خدمات الأعمال</option>
                                        <option value="الخدمات الاجتماعية">الخدمات الاجتماعية</option>
                                        <option value="الخدمات الشخصية">الخدمات الشخصية</option>
                                        <option value="التعليم العالي">التعليم العالي</option>
                                        <option value="مدارس البنات ورياض الأطفال والحضانات">مدارس البنات ورياض الأطفال
                                            والحضانات</option>
                                        <option value="المدارس الأجنبية">المدارس الأجنبية</option>
                                        <option value="المختبرات والخدمات الصحية">المختبرات والخدمات الصحية</option>
                                        <option value="الإيواء والترفيه والسياحة">الإيواء والترفيه والسياحة</option>
                                        <option value="السلع الأساسية والمحروقات">السلع الأساسية والمحروقات</option>
                                        <option value="مدارس البنين ومجمعات البنين والبنات">مدارس البنين ومجمعات البنين
                                            والبنات</option>
                                        <option value="حراسات امنية ومكاتب التوظيف الاهلية">حراسات امنية ومكاتب التوظيف
                                            الاهلية</option>
                                        <option value="حلول الاتصالات">حلول الاتصالات</option>
                                        <option value="أنشطة البريد">أنشطة البريد</option>
                                        <option value="البنية التحتية لتقنية المعلومات">البنية التحتية لتقنية المعلومات
                                        </option>
                                        <option value="البنية التحتية للاتصالات">البنية التحتية للاتصالات</option>
                                        <option value="التشغيل والصيانة للاتصالات">التشغيل والصيانة للاتصالات</option>
                                        <option value="التشغيل والصيانة لتقنية المعلومات">التشغيل والصيانة لتقنية المعلومات
                                        </option>
                                        <option value="حلول تقنية المعلومات">حلول تقنية المعلومات</option>
                                        <option value="الكيانات المجمعة">الكيانات المجمعة</option>
                                        <option value="تعدين المعادن الفلزية والاحجار الكريمة">تعدين المعادن الفلزية
                                            والاحجار الكريمة</option>
                                        <option value="تعدين المعادن غير الفلزية والصناعية">تعدين المعادن غير الفلزية
                                            والصناعية</option>
                                        <option value="تعدين مواد البناء">تعدين مواد البناء</option>
                                        <option value="الطاقة والمياه وخدماتها">الطاقة والمياه وخدماتها</option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="issueinput1"> عدد العملاء المستمرين : </label>
                                    <input type="text" id="issueinput1" class="form-control"
                                        placeholder="issue title" name="issuetitle" data-toggle="tooltip"
                                        data-trigger="hover" data-placement="top" data-title="Issue Title">
                                </div>
                                <div class="form-group">
                                    <label for="issueinput1"> عدد العملاء المنقطعين : </label>
                                    <input type="text" id="issueinput1" class="form-control"
                                        placeholder="issue title" name="issuetitle" data-toggle="tooltip"
                                        data-trigger="hover" data-placement="top" data-title="Issue Title">
                                </div>
                                <div class="form-group">
                                    <label for="issueinput1"> عدد العملاء المستمرين في النظام :</label>
                                    <input type="text" id="issueinput1" class="form-control"
                                        placeholder="issue title" name="issuetitle" data-toggle="tooltip"
                                        data-trigger="hover" data-placement="top" data-title="Issue Title">
                                </div>
                                <div class="form-group">
                                    <label for="issueinput1"> عدد العملاء المنقطعين في النظام :</label>
                                    <input type="text" id="issueinput1" class="form-control"
                                        placeholder="issue title" name="issuetitle" data-toggle="tooltip"
                                        data-trigger="hover" data-placement="top" data-title="Issue Title">
                                </div>




                                {{-- --------------------------------------------------------------------------------  --}}



                                {{-- --------------------------------------------------------------------------------  --}}

                                <div class="form-group">
                                    <label for="activitySelect">النشاط :</label>
                                    <select id="activitySelect" class="form-control">
                                        <option value="">اختيار</option>
                                        <option value="الإنتاج الزراعي والحيواني وخدماتها واندية الفروسية">الإنتاج الزراعي
                                            والحيواني وخدماتها واندية الفروسية</option>
                                        <option value="المواد الهيدروكربونية وعملياتها">المواد الهيدروكربونية وعملياتها
                                        </option>
                                        <option value="الصناعات">الصناعات</option>
                                        <option value="مقاولات التشييد والبناء والنظافة">مقاولات التشييد والبناء والنظافة
                                        </option>
                                        <option value="التشغيل والصيانة">التشغيل والصيانة</option>
                                        <option value="الجملة والتجزئة">الجملة والتجزئة</option>
                                        <option value="مطاعم مع الخدمة لا تشمل مطاعم الوجبات السريعة">مطاعم مع الخدمة لا
                                            تشمل مطاعم الوجبات السريعة</option>
                                        <option value="مطاعم خدمة سريعة ومحلات الإيس كريم">مطاعم خدمة سريعة ومحلات الإيس
                                            كريم</option>
                                        <option value="المقاهي ومحلات تقديم المشروبات">المقاهي ومحلات تقديم المشروبات
                                        </option>
                                        <option value="التموين والاعاشة">التموين والاعاشة</option>
                                        <option value="السلع النسائية، بيع الهواتف المحمولة وصيانتها">السلع النسائية، بيع
                                            الهواتف المحمولة وصيانتها</option>
                                        <option value="النقل البري والتخزين">النقل البري والتخزين</option>
                                        <option value="النقل البحري والجوي">النقل البحري والجوي</option>
                                        <option value="المؤسسات المالية">المؤسسات المالية</option>
                                        <option value="خدمات الأعمال">خدمات الأعمال</option>
                                        <option value="الخدمات الاجتماعية">الخدمات الاجتماعية</option>
                                        <option value="الخدمات الشخصية">الخدمات الشخصية</option>
                                        <option value="التعليم العالي">التعليم العالي</option>
                                        <option value="مدارس البنات ورياض الأطفال والحضانات">مدارس البنات ورياض الأطفال
                                            والحضانات</option>
                                        <option value="المدارس الأجنبية">المدارس الأجنبية</option>
                                        <option value="المختبرات والخدمات الصحية">المختبرات والخدمات الصحية</option>
                                        <option value="الإيواء والترفيه والسياحة">الإيواء والترفيه والسياحة</option>
                                        <option value="السلع الأساسية والمحروقات">السلع الأساسية والمحروقات</option>
                                        <option value="مدارس البنين ومجمعات البنين والبنات">مدارس البنين ومجمعات البنين
                                            والبنات</option>
                                        <option value="حراسات امنية ومكاتب التوظيف الاهلية">حراسات امنية ومكاتب التوظيف
                                            الاهلية</option>
                                        <option value="حلول الاتصالات">حلول الاتصالات</option>
                                        <option value="أنشطة البريد">أنشطة البريد</option>
                                        <option value="البنية التحتية لتقنية المعلومات">البنية التحتية لتقنية المعلومات
                                        </option>
                                        <option value="البنية التحتية للاتصالات">البنية التحتية للاتصالات</option>
                                        <option value="التشغيل والصيانة للاتصالات">التشغيل والصيانة للاتصالات</option>
                                        <option value="التشغيل والصيانة لتقنية المعلومات">التشغيل والصيانة لتقنية المعلومات
                                        </option>
                                        <option value="حلول تقنية المعلومات">حلول تقنية المعلومات</option>
                                        <option value="الكيانات المجمعة">الكيانات المجمعة</option>
                                        <option value="تعدين المعادن الفلزية والاحجار الكريمة">تعدين المعادن الفلزية
                                            والاحجار الكريمة</option>
                                        <option value="تعدين المعادن غير الفلزية والصناعية">تعدين المعادن غير الفلزية
                                            والصناعية</option>
                                        <option value="تعدين مواد البناء">تعدين مواد البناء</option>
                                        <option value="الطاقة والمياه وخدماتها">الطاقة والمياه وخدماتها</option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="issueinput1"> عدد العملاء المستمرين : </label>
                                    <input type="text" id="issueinput1" class="form-control"
                                        placeholder="issue title" name="issuetitle" data-toggle="tooltip"
                                        data-trigger="hover" data-placement="top" data-title="Issue Title">
                                </div>
                                <div class="form-group">
                                    <label for="issueinput1"> عدد العملاء المنقطعين : </label>
                                    <input type="text" id="issueinput1" class="form-control"
                                        placeholder="issue title" name="issuetitle" data-toggle="tooltip"
                                        data-trigger="hover" data-placement="top" data-title="Issue Title">
                                </div>
                                <div class="form-group">
                                    <label for="issueinput1"> عدد العملاء المستمرين في النظام :</label>
                                    <input type="text" id="issueinput1" class="form-control"
                                        placeholder="issue title" name="issuetitle" data-toggle="tooltip"
                                        data-trigger="hover" data-placement="top" data-title="Issue Title">
                                </div>
                                <div class="form-group">
                                    <label for="issueinput1"> عدد العملاء المنقطعين في النظام :</label>
                                    <input type="text" id="issueinput1" class="form-control"
                                        placeholder="issue title" name="issuetitle" data-toggle="tooltip"
                                        data-trigger="hover" data-placement="top" data-title="Issue Title">
                                </div>




                                {{-- --------------------------------------------------------------------------------  --}}


                                {{-- --------------------------------------------------------------------------------  --}}

                                <div class="form-group">
                                    <label for="activitySelect">النشاط :</label>
                                    <select id="activitySelect" class="form-control">
                                        <option value="">اختيار</option>
                                        <option value="الإنتاج الزراعي والحيواني وخدماتها واندية الفروسية">الإنتاج الزراعي
                                            والحيواني وخدماتها واندية الفروسية</option>
                                        <option value="المواد الهيدروكربونية وعملياتها">المواد الهيدروكربونية وعملياتها
                                        </option>
                                        <option value="الصناعات">الصناعات</option>
                                        <option value="مقاولات التشييد والبناء والنظافة">مقاولات التشييد والبناء والنظافة
                                        </option>
                                        <option value="التشغيل والصيانة">التشغيل والصيانة</option>
                                        <option value="الجملة والتجزئة">الجملة والتجزئة</option>
                                        <option value="مطاعم مع الخدمة لا تشمل مطاعم الوجبات السريعة">مطاعم مع الخدمة لا
                                            تشمل مطاعم الوجبات السريعة</option>
                                        <option value="مطاعم خدمة سريعة ومحلات الإيس كريم">مطاعم خدمة سريعة ومحلات الإيس
                                            كريم</option>
                                        <option value="المقاهي ومحلات تقديم المشروبات">المقاهي ومحلات تقديم المشروبات
                                        </option>
                                        <option value="التموين والاعاشة">التموين والاعاشة</option>
                                        <option value="السلع النسائية، بيع الهواتف المحمولة وصيانتها">السلع النسائية، بيع
                                            الهواتف المحمولة وصيانتها</option>
                                        <option value="النقل البري والتخزين">النقل البري والتخزين</option>
                                        <option value="النقل البحري والجوي">النقل البحري والجوي</option>
                                        <option value="المؤسسات المالية">المؤسسات المالية</option>
                                        <option value="خدمات الأعمال">خدمات الأعمال</option>
                                        <option value="الخدمات الاجتماعية">الخدمات الاجتماعية</option>
                                        <option value="الخدمات الشخصية">الخدمات الشخصية</option>
                                        <option value="التعليم العالي">التعليم العالي</option>
                                        <option value="مدارس البنات ورياض الأطفال والحضانات">مدارس البنات ورياض الأطفال
                                            والحضانات</option>
                                        <option value="المدارس الأجنبية">المدارس الأجنبية</option>
                                        <option value="المختبرات والخدمات الصحية">المختبرات والخدمات الصحية</option>
                                        <option value="الإيواء والترفيه والسياحة">الإيواء والترفيه والسياحة</option>
                                        <option value="السلع الأساسية والمحروقات">السلع الأساسية والمحروقات</option>
                                        <option value="مدارس البنين ومجمعات البنين والبنات">مدارس البنين ومجمعات البنين
                                            والبنات</option>
                                        <option value="حراسات امنية ومكاتب التوظيف الاهلية">حراسات امنية ومكاتب التوظيف
                                            الاهلية</option>
                                        <option value="حلول الاتصالات">حلول الاتصالات</option>
                                        <option value="أنشطة البريد">أنشطة البريد</option>
                                        <option value="البنية التحتية لتقنية المعلومات">البنية التحتية لتقنية المعلومات
                                        </option>
                                        <option value="البنية التحتية للاتصالات">البنية التحتية للاتصالات</option>
                                        <option value="التشغيل والصيانة للاتصالات">التشغيل والصيانة للاتصالات</option>
                                        <option value="التشغيل والصيانة لتقنية المعلومات">التشغيل والصيانة لتقنية المعلومات
                                        </option>
                                        <option value="حلول تقنية المعلومات">حلول تقنية المعلومات</option>
                                        <option value="الكيانات المجمعة">الكيانات المجمعة</option>
                                        <option value="تعدين المعادن الفلزية والاحجار الكريمة">تعدين المعادن الفلزية
                                            والاحجار الكريمة</option>
                                        <option value="تعدين المعادن غير الفلزية والصناعية">تعدين المعادن غير الفلزية
                                            والصناعية</option>
                                        <option value="تعدين مواد البناء">تعدين مواد البناء</option>
                                        <option value="الطاقة والمياه وخدماتها">الطاقة والمياه وخدماتها</option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="issueinput1"> عدد العملاء المستمرين : </label>
                                    <input type="text" id="issueinput1" class="form-control"
                                        placeholder="issue title" name="issuetitle" data-toggle="tooltip"
                                        data-trigger="hover" data-placement="top" data-title="Issue Title">
                                </div>
                                <div class="form-group">
                                    <label for="issueinput1"> عدد العملاء المنقطعين : </label>
                                    <input type="text" id="issueinput1" class="form-control"
                                        placeholder="issue title" name="issuetitle" data-toggle="tooltip"
                                        data-trigger="hover" data-placement="top" data-title="Issue Title">
                                </div>
                                <div class="form-group">
                                    <label for="issueinput1"> عدد العملاء المستمرين في النظام :</label>
                                    <input type="text" id="issueinput1" class="form-control"
                                        placeholder="issue title" name="issuetitle" data-toggle="tooltip"
                                        data-trigger="hover" data-placement="top" data-title="Issue Title">
                                </div>
                                <div class="form-group">
                                    <label for="issueinput1"> عدد العملاء المنقطعين في النظام :</label>
                                    <input type="text" id="issueinput1" class="form-control"
                                        placeholder="issue title" name="issuetitle" data-toggle="tooltip"
                                        data-trigger="hover" data-placement="top" data-title="Issue Title">
                                </div>




                                {{-- --------------------------------------------------------------------------------  --}}





                                <div class="form-group">
                                    <label for="issueinput1"> عدد العملاء المنقطعين المحتمل اعادتهم ( أن وجد ) :</label>
                                    <input type="text" id="issueinput1" class="form-control"
                                        placeholder="issue title" name="issuetitle" data-toggle="tooltip"
                                        data-trigger="hover" data-placement="top" data-title="Issue Title">
                                </div>



                                <div class="form-group">
                                    <label for="issueinput1"> عدد العملاء المستمرين المحتمل فقدهم :</label>
                                    <input type="text" id="issueinput1" class="form-control"
                                        placeholder="issue title" name="issuetitle" data-toggle="tooltip"
                                        data-trigger="hover" data-placement="top" data-title="Issue Title">
                                </div>

                                <div class="form-group">
                                    <label for="issueinput1"> عدد العملاء المستفيدين من الخدمة :</label>
                                    <input type="text" id="issueinput1" class="form-control"
                                        placeholder="issue title" name="issuetitle" data-toggle="tooltip"
                                        data-trigger="hover" data-placement="top" data-title="Issue Title">
                                </div>

                                {{-- ============================ yes or no ===================================== --}}
                                <div class="form-group">
                                    <label for="activitySelect"> في حالة وجود عاملين عن بعد هل لديكم اشتراك مع مقدمي الخدمة
                                        :</label>
                                    <select id="activitySelect" class="form-control">
                                        <option value="">اختيار</option>

                                        <option value=" yes "> نعم</option>
                                        <option value=" no "> لا</option>
                                        <option value=" notyet "> لا اعلم</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="issueinput1"> كم نسبة التسرب الوظيفي</label>
                                    <input type="text" id="issueinput1" class="form-control"
                                        placeholder="issue title" name="issuetitle" data-toggle="tooltip"
                                        data-trigger="hover" data-placement="top" data-title="Issue Title">
                                </div>
                                {{-- -------------------------------------------------  --}}
                                <div class="form-group">
                                    <label for="activitySelect"> * دعم صندوق الموارد البشرية</label>
                                    <label for="activitySelect"> هل يوجد حساب تمويل :</label>
                                    <select id="activitySelect" class="form-control">
                                        <option value="">اختيار</option>

                                        <option value=" yes "> نعم</option>
                                        <option value=" no "> لا</option>
                                        <option value=" notyet "> لا اعلم</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="issueinput1"> عدد المنشآت التي تم اصدارها في السنة السابقة من 01/01 الى
                                        31/12 :</label>
                                    <input type="text" id="issueinput1" class="form-control"
                                        placeholder="issue title" name="issuetitle" data-toggle="tooltip"
                                        data-trigger="hover" data-placement="top" data-title="Issue Title">
                                </div>

                                <div class="form-group">
                                    <label for="issueinput1"> عدد المنشآت المستفيدة من التمويل في السنة السابقة من 01/01
                                        الى 31/12 :
                                    </label>
                                    <input type="text" id="issueinput1" class="form-control"
                                        placeholder="issue title" name="issuetitle" data-toggle="tooltip"
                                        data-trigger="hover" data-placement="top" data-title="Issue Title">
                                </div>


                                {{-- -------------------------------------------------  --}}
                                <div class="form-group">
                                    <label for="activitySelect"> مستفيد من خدمة اجير ( مستأجر ) :</label>
                                    <select id="activitySelect" class="form-control">
                                        <option value="">اختيار</option>

                                        <option value=" yes "> نعم</option>
                                        <option value=" no "> لا</option>
                                        <option value=" notyet "> لا اعلم</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="issueinput1">عدد العمالة المستأجرة :
                                    </label>
                                    <input type="text" id="issueinput1" class="form-control"
                                        placeholder="issue title" name="issuetitle" data-toggle="tooltip"
                                        data-trigger="hover" data-placement="top" data-title="Issue Title">
                                </div>



                                {{-- -------------------------------------------------  --}}
                                <div class="form-group">
                                    <label for="activitySelect"> مسجل في تمهير لكل الانشطة :</label>
                                    <select id="activitySelect" class="form-control">
                                        <option value="">اختيار</option>

                                        <option value=" yes "> نعم</option>
                                        <option value=" no "> لا</option>
                                        <option value=" notyet "> لا اعلم</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="issueinput1">نسبة الالتزام بتوثيق العقود لكل الانشطة :

                                    </label>
                                    <input type="text" id="issueinput1" class="form-control"
                                        placeholder="issue title" name="issuetitle" data-toggle="tooltip"
                                        data-trigger="hover" data-placement="top" data-title="Issue Title">
                                </div>
                                <div class="form-group">
                                    <label for="issueinput1">
                                        برنامج حماية الأجور لكل الانشطة ( نسبة الالتزام ):

                                    </label>
                                    <input type="text" id="issueinput1" class="form-control"
                                        placeholder="issue title" name="issuetitle" data-toggle="tooltip"
                                        data-trigger="hover" data-placement="top" data-title="Issue Title">
                                </div>




                                {{-- -------------------------------------------------  --}}
                                <div class="form-group">
                                    <label for="activitySelect"> شهادة امتثال لكل الانشطة :</label>
                                    <select id="activitySelect" class="form-control">
                                        <option value="">اختيار</option>

                                        <option value=" yes "> نعم</option>
                                        <option value=" no "> لا</option>
                                        <option value=" notyet "> لا اعلم</option>
                                    </select>
                                </div>






                                {{-- -------------------------------------------------  --}}
                                <div class="form-group">
                                    <label for="activitySelect"> لائحة تنظيم العمل لكل الانشطة :
                                    </label>
                                    <select id="activitySelect" class="form-control">
                                        <option value="">اختيار</option>

                                        <option value=" yes "> نعم</option>
                                        <option value=" no "> لا</option>
                                        <option value=" notyet "> لا اعلم</option>
                                    </select>
                                </div>

                                {{-- -------------------------------------------------  --}}
                                <div class="form-group">
                                    <label for="activitySelect">
                                        هل لديكم احتياج لخدمة تدريب العاملين لتحقيق نسبة الاتزام 12.5% للمنشآت التي فيها
                                        اجمالي العمالة اكثر من 50 عامل :
                                    </label>
                                    <select id="activitySelect" class="form-control">
                                        <option value="">اختيار</option>

                                        <option value=" yes "> نعم</option>
                                        <option value=" no "> لا</option>
                                        <option value=" notyet "> لا اعلم</option>
                                    </select>
                                </div>



                                <div class="form-group">
                                    <label for="issueinput1">الوظائف الأساسية لكل الأنشطة:</label><br>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-cogs"></i></span>
                                        </div>
                                        <input type="text" id="issueinput1" class="form-control"
                                            placeholder="issue title" name="issuetitle" data-toggle="tooltip"
                                            data-trigger="hover" data-placement="top" data-title="Issue Title">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-cogs"></i></span>
                                        </div>
                                        <input type="text" id="issueinput2" class="form-control"
                                            placeholder="issue title" name="issuetitle" data-toggle="tooltip"
                                            data-trigger="hover" data-placement="top" data-title="Issue Title">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-cogs"></i></span>
                                        </div>
                                        <input type="text" id="issueinput3" class="form-control"
                                            placeholder="issue title" name="issuetitle" data-toggle="tooltip"
                                            data-trigger="hover" data-placement="top" data-title="Issue Title">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-cogs"></i></span>
                                        </div>
                                        <input type="text" id="issueinput4" class="form-control"
                                            placeholder="issue title" name="issuetitle" data-toggle="tooltip"
                                            data-trigger="hover" data-placement="top" data-title="Issue Title">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-cogs"></i></span>
                                        </div>
                                        <input type="text" id="issueinput5" class="form-control"
                                            placeholder="issue title" name="issuetitle" data-toggle="tooltip"
                                            data-trigger="hover" data-placement="top" data-title="Issue Title">
                                    </div>
                                </div>


                                {{-- -------------------------------------------------  --}}
                                <div class="form-group">
                                    <label for="activitySelect"> فرص وظيفية كل الأنشطة :
                                    </label>
                                    <select id="activitySelect" class="form-control">
                                        <option value="">اختيار</option>

                                        <option value=" yes "> نعم</option>
                                        <option value=" no "> لا</option>
                                        <option value=" notyet "> لا اعلم</option>
                                    </select>
                                </div>


                                <br>
                                <div class="form-group">
                                    <label>الفرص الوظيفية موجهة لــ:</label><br>

                                    <div class="form-check">
                                        <input type="checkbox" id="saudiCheckbox" class="form-check-input"
                                            name="jobOpportunities[]" value="saudi">
                                        <label class="form-check-label" for="saudiCheckbox">
                                            <i class="fas fa-user-tie"></i> سعوديين
                                        </label>
                                    </div>
                                    <br>
                                    <div class="form-check">
                                        <input type="checkbox" id="expatCheckbox" class="form-check-input"
                                            name="jobOpportunities[]" value="expat">
                                        <label class="form-check-label" for="expatCheckbox">
                                            <i class="fas fa-globe"></i> وافدين
                                        </label>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="issueinput1">
                                        الزيادة المتوقعة في عدد / السعوديين لكل الانشطة :
                                    </label>
                                    <input type="text" id="issueinput1" class="form-control"
                                        placeholder="issue title" name="issuetitle" data-toggle="tooltip"
                                        data-trigger="hover" data-placement="top" data-title="Issue Title">
                                </div>


                                <div class="form-group">
                                    <label for="issueinput1">
                                        الزيادة المتوقعة في عدد / الوافدين لكل الانشطة :
                                    </label>
                                    <input type="text" id="issueinput1" class="form-control"
                                        placeholder="issue title" name="issuetitle" data-toggle="tooltip"
                                        data-trigger="hover" data-placement="top" data-title="Issue Title">
                                </div>


                                <div class="form-group">
                                    <label for="issueinput1">
                                        الموارد البشرية ودعم الاستقطاب
                                    </label>

                                </div>

                                {{-- -------------------------------------------------  --}}
                                <div class="form-group">
                                    <label for="activitySelect">
                                        هل لديكم احتياج للإستقطاب محلياً أو دولياً
                                    </label>
                                    <select id="activitySelect" class="form-control">
                                        <option value="">اختيار</option>

                                        <option value=" yes "> نعم</option>
                                        <option value=" no "> لا</option>
                                        <option value=" notyet "> لا اعلم</option>
                                    </select>
                                </div>



                                <div class="form-group">
                                    <label for="issueinput1">
                                        عدد السعوديين
                                    </label>
                                    <input type="text" id="issueinput1" class="form-control"
                                        placeholder="issue title" name="issuetitle" data-toggle="tooltip"
                                        data-trigger="hover" data-placement="top" data-title="Issue Title">
                                </div>


                                <div class="form-group">
                                    <label for="issueinput1">
                                        عدد الوافدين
                                    </label>
                                    <input type="text" id="issueinput1" class="form-control"
                                        placeholder="issue title" name="issuetitle" data-toggle="tooltip"
                                        data-trigger="hover" data-placement="top" data-title="Issue Title">
                                </div>


                                {{-- -------------------------------------------------  --}}
                                <div class="form-group">
                                    <label for="activitySelect">
                                        هل لديكم نظام لادارة الموارد البشرية
                                    </label>
                                    <select id="activitySelect" class="form-control">
                                        <option value="">اختيار</option>

                                        <option value=" yes "> نعم</option>
                                        <option value=" no "> لا</option>
                                        <option value=" notyet "> لا اعلم</option>
                                    </select>
                                </div>

                                {{-- -------------------------------------------------  --}}
                                <div class="form-group">
                                    <label for="activitySelect">
                                        هل لديكم احتياج للتسهيلات المالية للتوسع
                                    </label>
                                    <select id="activitySelect" class="form-control">
                                        <option value="">اختيار</option>

                                        <option value=" yes "> نعم</option>
                                        <option value=" no "> لا</option>
                                        <option value=" notyet "> لا اعلم</option>
                                    </select>
                                </div>



                                <div class="form-group">
                                    <label for="issueinput1">
                                        أفضل الحلول والأقل تكلفة للوفاء بمتطلبات التوطين للانتقال من النطاق الحالي الى نطاق
                                        أعلى او المحافظة على النطاق المرتفع
                                    </label>

                                </div>







                            
                                <div class="form-group">
                                    <label for="issueinput8">ملاحظات</label>
                                    <textarea id="issueinput8" rows="5" class="form-control" name="comments" placeholder="ملاحظات"
                                        data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Comments"></textarea>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="button" class="btn btn-warning mr-1">
                                    <i class="ft-x"></i> Cancel
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="la la-check-square-o"></i> Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-icons">Timesheet</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
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
                        <div class="card-text">
                            <p>This form shows the use of icons with form controls. Define
                                the position of the icon using <code>has-icon-left</code> or <code>has-icon-right</code>
                                class. Use <code>icon-*</code> class to define the icon for the form control. See Icons
                                sections for the list of icons you can use. </p>
                        </div>
                        <form class="form">
                            <div class="form-body">
                                <div class="form-group">
                                    <label for="timesheetinput1">Employee Name</label>
                                    <div class="position-relative has-icon-left">
                                        <input type="text" id="timesheetinput1" class="form-control"
                                            placeholder="employee name" name="employeename">
                                        <div class="form-control-position">
                                            <i class="ft-user"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="timesheetinput2">Project Name</label>
                                    <div class="position-relative has-icon-left">
                                        <input type="text" id="timesheetinput2" class="form-control"
                                            placeholder="project name" name="projectname">
                                        <div class="form-control-position">
                                            <i class="la la-briefcase"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="timesheetinput3">Date</label>
                                    <div class="position-relative has-icon-left">
                                        <input type="date" id="timesheetinput3" class="form-control" name="date">
                                        <div class="form-control-position">
                                            <i class="ft-message-square"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Rate Per Hour</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Rate Per Hour"
                                            aria-label="Amount (to the nearest dollar)" name="rateperhour">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="timesheetinput5">Start Time</label>
                                            <div class="position-relative has-icon-left">
                                                <input type="time" id="timesheetinput5" class="form-control"
                                                    name="starttime">
                                                <div class="form-control-position">
                                                    <i class="ft-clock"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="timesheetinput6">End Time</label>
                                            <div class="position-relative has-icon-left">
                                                <input type="time" id="timesheetinput6" class="form-control"
                                                    name="endtime">
                                                <div class="form-control-position">
                                                    <i class="ft-clock"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="timesheetinput7">Notes</label>
                                    <div class="position-relative has-icon-left">
                                        <textarea id="timesheetinput7" rows="5" class="form-control" name="notes" placeholder="notes"></textarea>
                                        <div class="form-control-position">
                                            <i class="ft-file"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions right">
                                <button type="button" class="btn btn-warning mr-1">
                                    <i class="ft-x"></i> Cancel
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="la la-check-square-o"></i> Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

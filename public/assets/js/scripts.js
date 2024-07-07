let dataTablesArabicLocalization = {
    "sEmptyTable": "ليست هناك بيانات متاحة في الجدول",
    "sLoadingRecords": "جارٍ التحميل...",
    "sProcessing": "جارٍ التحميل...",
    "sLengthMenu": "أظهر _MENU_ مدخلات",
    "sZeroRecords": "لم يعثر على أية سجلات",
    "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
    "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
    "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
    "sInfoPostFix": "",
    "sSearch": "ابحث:",
    "sUrl": "",
    "oPaginate": {
        "sFirst": "الأول",
        "sPrevious": "السابق",
        "sNext": "التالي",
        "sLast": "الأخير"
    },
    "oAria": {
        "sSortAscending": ": تفعيل لترتيب العمود تصاعدياً",
        "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
    }
};


//////////////////////////////////////// without setTimeout ///////////////////////////////////////
document.addEventListener("DOMContentLoaded", function() {
    var loader = document.getElementById("loader");
    var content = document.getElementById("content");

    window.addEventListener("load", function() {
        loader.style.display = "none";
        content.style.display = "block";
    });
});

////////////////////////////////////////  setTimeout ///////////////////////////////////////
// document.addEventListener("DOMContentLoaded", function() {
//     var loader = document.getElementById("loader");
//     var content = document.getElementById("content");

//     function hideLoader() {
//         loader.style.display = "none";
//         content.style.display = "block";
//     }

//     window.addEventListener("load", function() {
//         setTimeout(hideLoader, 3000); 
//     });

   
//     setTimeout(hideLoader, 3000);
// });





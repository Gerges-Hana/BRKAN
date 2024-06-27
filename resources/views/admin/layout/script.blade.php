<!-- BEGIN VENDOR JS-->
<script src="{{asset('/app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->

<!-- BEGIN OTHER JS-->
<script src='{{asset("/assets/js/sweetalert.min.js")}}' type="text/javascript"></script>
<script src='{{asset("/assets/js/jquery.sweet-alert.custom.js")}}' type="text/javascript"></script>
<script src='{{asset("/app-assets/vendors/js/extensions/toastr.min.js")}}' type="text/javascript"></script>
<script src='{{asset("/app-assets/js/scripts/extensions/toastr.js")}}' type="text/javascript"></script>
<!-- END OTHER JS-->

<!-- BEGIN PAGE VENDOR JS-->
@yield('page-script-files')
<!-- END PAGE VENDOR JS-->

<!-- BEGIN MODERN JS-->
<script src="{{asset('/app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
<script src="{{asset('/app-assets/js/core/app.js')}}" type="text/javascript"></script>
<script src="{{asset('/app-assets/js/scripts/customizer.js')}}" type="text/javascript"></script>
<!-- END MODERN JS-->

<!-- Custom JS-->
<script src="{{asset('/assets/js/scripts.js')}}" type="text/javascript"></script>
<script>
    const toastr_config = {
        positionClass: 'toast-top-center',
        containerId: 'toast-top-center',
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
        timeOut: 2000
    };

    $(document).ready(function () {
        // Preview Toastr Success Message
        @if (Session::has('success_message'))
        toastr.success('', '{{Session::get('success_message')}}', toastr_config)
        {{ Session::forget('success_message') }}
        @endif
        // Preview Toastr Warning Message
        @if (Session::has('warning_message'))
        toastr.warning('', '{{Session::get('warning_message')}}', toastr_config)
        {{ Session::forget('warning_message') }}
        @endif
        // Preview Toastr Error Message
        @if (Session::has('error_message'))
        toastr.error('', '{{Session::get('error_message')}}', toastr_config)
        {{ Session::forget('error_message') }}
        @endif

        fetchNotifications();
    });

    function previewToastrForAjaxRequest(success_message = '', error_message = '') {
        if (success_message !== '')
            toastr.success('', success_message, toastr_config)
        if (error_message !== '')
            toastr.error('', error_message, toastr_config)
    }

    function fetchNotifications() {
        $.ajax({
            url: '{{ route('fetch.notifications') }}',
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response && response.length > 0) {
                    updateOrderCount(response.length);
                    $('#newOrderCount').text(response.newCount + ' جديدة');
                    displayNotifications(response);
                }
            },
            error: function (xhr, status, error) {
                console.error('Failed to fetch order notifications:', error);
            }
        });
    }

    function updateOrderCount(count) {
        $('#orderCount').text(count);
    }

    function displayNotifications(response) {
        $('#notificationList').empty();
        response.forEach(function (notification) {
            var statusMessage = '';
            var iconClass = '';
            switch (notification.status_id) {
                case 1:
                    statusMessage = 'تم انشاء طالبيه جديده';
                    iconClass = 'ft-plus-square bg-cyan';
                    break;
                case 2:
                    statusMessage = 'تم إلغاء الطلبية';
                    iconClass = 'ft-minus-square bg-red';
                    break;
                case 3:
                    statusMessage = 'تم وصول الطلبيه';
                    iconClass = 'fa fa-truck bg-success';
                    break;
                default:
                    statusMessage = 'حالة غير معروفة';
                    iconClass = 'ft-info-square bg-grey';
            }
            var notificationHtml = '<a href="{{ url('/orders-history/') }}/' + notification.id + '" class="media">';
            notificationHtml += '<div class="media-left align-self-center"><i class="' + iconClass +
                ' icon-bg-circle"></i></div>';
            notificationHtml += '<div class="media-body">';
            notificationHtml += '<h6 class="media-heading">' + statusMessage + '</h6>';
            notificationHtml += '<p class="notification-text font-small-3 text-muted">رقم الطالبيه: ' +
                notification.purchase_order_number + ' بواسطة ' + notification.driver_name + '</p>';
            notificationHtml += '</div></a>';


            $('#notificationList').append(notificationHtml);
        });
    }

    setInterval(fetchNotifications, 5000);
</script>
@yield('scripts')

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
            
            method: 'GET',
            success: function (res) {
                $('#notificationsCount').html(res.notifications.length);
                displayNotifications(res.notifications);
            },
            error: function (xhr, status, error) {
                console.error('Failed to fetch order notifications:', error);
            }
        });
    }

    function displayNotifications(notifications) {
        $('#notificationList').html('');
        notifications.forEach(function (notification) {
            let statusMessage = '';
            let iconClass = '';
            switch (notification.status_id) {
                case 1:
                    statusMessage = 'تم انشاء طلبية جديده';
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
            let notificationHtml = `
            <a data-id="${notification.id}" class="media notification-item">
                <div class="media-left align-self-center"><i class="${iconClass} icon-bg-circle"></i></div>
                    <div class="media-body">
                        <h6 class="media-heading">${statusMessage}</h6>
                        <p class="notification-text font-small-3 text-muted">رقم الطالبيه: ' ${notification.purchase_order.purchase_order_number} ' بواسطة ' ${notification.purchase_order.driver_name} '</p>
                    </div>
                </div>
            </a>`;

            $('#notificationList').append(notificationHtml);
        });
        if (notifications.length === 0)
            $('#notificationList').html(`<p class="mt-1 text-center font-size-small">لا يوجد تحديثات جديدة</p>`);
    }

    $(document).on('click', '.notification-item', function (e) {
        e.preventDefault();
        const id = $(this).attr('data-id');
        $.ajax({
            method: 'POST',
            dataType: "JSON",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {id},
            success: function (res) {
                if (res.success == true) {
                    fetchNotifications();
                    previewToastrForAjaxRequest(res.success_message);
                } else {
                    previewToastrForAjaxRequest('', res.error_message);
                }
            },
            error: function () {
            }
        });
    })
    // setInterval(fetchNotifications, 5000);
</script> 

@yield('scripts')


<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>طلبات الشراء</title>
    {{-- <style>
        body {
            font-family: 'Noto Sans Arabic', sans-serif;
            line-height: 1.6;
        }
        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .invoice-header h1 {
            margin: 0;
            font-size: 24px;
        }
        .invoice-info {
            text-align: left;
            margin-bottom: 20px;
        }
        .invoice-info p {
            margin: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        table th {
            background-color: #f2f2f2;
        }
    </style> --}}
</head>
<body dir="rtl">
    <div class="invoice-header">
        <h1>طلبات الشراء</h1>
    </div>
    <div class="invoice-info">
        <p>التاريخ: {{ \Carbon\Carbon::now()->format('Y-m-d') }}</p>
        <p>X-ERA : اسم شركتك</p>
        <p>طابع الملف: طلبات الشراء</p>
    </div>
    <table>
        <thead>
            <tr>
                <th>الرقم</th>
                <th>الجهاز المميز</th>
                <th>رقم طلب الشراء</th>
                <th>رقم الفاتورة</th>
                <th>اسم السائق</th>
                <th>اسم المندوب</th>
                <th>هاتف السائق</th>
                <th>هاتف المندوب</th>
                <th>تاريخ الوصول</th>
                <th>حالة الطلب</th>
                <th>المستخدم الأخير</th>
                <th>تاريخ الإنشاء</th>
                <th>تاريخ التحديث</th>
            </tr>
        </thead>
        <tbody>
            @foreach($purchaseOrders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->device_unique_key }}</td>
                    <td>{{ $order->purchase_order_number }}</td>
                    <td>{{ $order->invoice_number }}</td>
                    <td>{{ $order->driver_name }}</td>
                    <td>{{ $order->rep_name }}</td>
                    <td>{{ $order->driver_phone }}</td>
                    <td>{{ $order->rep_phone }}</td>
                    <td>{{ $order->arrival_date }}</td>
                    <td>{{ $order->status_id }}</td>
                    <td>{{ $order->last_update_user_id }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

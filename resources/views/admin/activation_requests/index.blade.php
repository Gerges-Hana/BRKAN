@extends('admin.layout.master')

@section('tap-title')
@endsection
طلبات التفعيل

@section('page-style-files')
@endsection

@section('content-header')
    <div class="content-header-left col-md-6 col-12 mb-1">
        <h3 class="content-header-title">عرض طلبات التفعيل</h3>
    </div>
    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">الرئيسية</a>
                <li class="breadcrumb-item"><a href="/company">طلبات التفعيل</a></li>
                <li class="breadcrumb-item active"></li>
            </ol>
        </div>
    </div>
@endsection

@section('content-body')
<div class="container">
    <h1>طلبات التفعيل</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>الرقم</th>
                <th>اسم المستخدم</th>
                <th>البريد الإلكتروني</th>
                <th>إجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($activationRequests as $request)
                <tr>
                    <td>{{ $request->id }}</td>
                    <td>{{ $request->user->name }}</td>
                    <td>{{ $request->user->email }}</td>
                    <td>
                        <form action="{{ route('admin.activation_requests.approve', $request->id) }}" method="POST">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-success">تفعيل</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

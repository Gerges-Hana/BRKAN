@extends('admin.layout.master')

@section('tap-title')
@endsection
شركه غير مفعله

@section('page-style-files')
@endsection

@section('content-header')
    <div class="content-header-left col-md-6 col-12 mb-1">
        <h3 class="content-header-title">عرض الشركات</h3>
    </div>
    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">الرئيسية</a>
                <li class="breadcrumb-item"><a href="/company">الشركات</a></li>
                <li class="breadcrumb-item active"></li>
            </ol>
        </div>
    </div>
@endsection

@section('content-body')
    <section id="html5">
        <div class="row">
            <div class="col-12">
                <div class="card p-2 ">




                    <div class="">
                        <hr>
                        <div class="row py-0">


                            <div class="alert alert-danger mt-4" role="alert">
                                حسابك غير مفعل. يرجى التواصل مع الدعم لتفعيل الحساب.
                            </div>
                            <div class="card mt-4">
                                <div class="card-header">
                                    تفاصيل الحساب
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">اسم الشركة: {{ $user->name }}</h5>
                                    <p class="card-text">البريد الإلكتروني: {{ $user->email }}</p>

                                    @if (session('success'))
                                        <div class="alert alert-success mt-4" role="alert">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    @if (session('error'))
                                        <div class="alert alert-danger mt-4" role="alert">
                                            {{ session('error') }}
                                        </div>
                                    @endif

                                    <form action="{{ route('activate.account') }}" method="POST" id="activationForm">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        @if (!session('success') && !session('error'))
                                            <button type="submit" id="activateAccountBtn" class="btn btn-primary">تفعيل
                                                الحساب</button>
                                        @endif
                                    </form>


                                    {{-- <form action="{{ route('companies.create.report') }}" method="get" id="activationForm"> --}}
                                        {{-- @csrf --}}
                                        {{-- <input type="hidden" name="user_id" value="{{ $user->id }}"> --}}
                                        @if (!session('success') && !session('error'))
                                            <a href={{ route('companies.create.report') }} id="activateCompanyBtn" class="btn btn-primary text-light">طلب تفعيل
                                                </a>
                                        @endif
                                    {{-- </form> --}}




                                    <!-- Message and script -->
                                    <p id="activationMessage" class="mt-3" style="display: none;">جارٍ تفعيل الحساب...</p>

                                </div>
                            </div>

                        </div>
                        <!-- Displaying success or info messages -->
                        @if (session('success') && session('not_active'))
                            <div class="alert alert-info mt-4">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('info') && !session('not_active'))
                            <div class="alert alert-info mt-4">
                                {{ session('info') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger mt-4">
                                {{ session('error') }}
                            </div>
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </section>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('activationForm');
            const activateButton = document.getElementById('activateAccountBtn');
            const activationMessage = document.getElementById('activationMessage');

            form.addEventListener('submit', function(event) {
                // Disable the button
                activateButton.disabled = true;

                // Hide the button
                activateButton.style.display = 'none';

                // Show the activation message
                activationMessage.style.display = 'block';

                // Optionally, prevent form submission if you want to handle it manually via AJAX
                // event.preventDefault();
            });

            // Optional: Check if the message should be displayed based on a server-side flag
            if ({{ session('message') ? 'true' : 'false' }}) {
                activationMessage.style.display = 'block';
                activateButton.style.display = 'none'; // Hide the button if the message should be displayed
            }
        });
    </script>
@endsection

@extends('admin.layout.master')

@section('tap-title')
المستخدمين
@endsection

@section('page-style-files')



@endsection

@section('content-header')
<div class="content-header-left col-md-6 col-12 mb-1">
    <h3 class="content-header-title">المستخدمين</h3>
</div>
<div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
    <div class="breadcrumb-wrapper col-12">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/users">المستخدمين</a></li>
        </ol>
    </div>
</div>
@endsection


@section('content-body')
<section id="html5">
    <div class="row">
        <div class="col-12">
            <div class="card p-2 ">
                <div class="row py-2">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <h2>اداره المستخدمين </h2>
                        </div>
                        <div class="pull-left">
                            <a class="btn btn-success" href="{{ route('users.create') }}"> انشاء مستخدم جديد  </a>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>

                @endif


                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>username</th>
                        <th>is_active</th>
                        <th>Roles</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($data as $key => $user)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <!-- <td>{{ $user->is_active }}</td> -->
                        <td>
                            @if ($user->is_active)
                            <span style="color: green;">مفعل</span>
                            @else
                            <span style="color: red;">غير مفعل</span>
                            @endif
                        </td>

                        <td>
                            @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                            @endforeach
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </table>


                {!! $data->render() !!}


            </div>
        </div>
    </div>
</section>

@endsection
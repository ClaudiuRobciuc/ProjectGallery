@extends('layout.admin')

@section('content')
    <h1 class="page-title">Manage Users</h1>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="{{ route('admin.index') }}">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                <div class="clearfix">&nbsp;</div>
                <div class="clearfix">&nbsp;</div>
                <div class="portlet-body">
                    @if(count($users)>=1)
                    <table class="table table-striped table-bordered table-hover" id="view-users">
                        <thead>
                            <tr>
                                <th width="15%"> First Name </th>
                                <th width="15%"> Last Name </th>
                                <th width="15%"> Email </th>
                                <th width="10%"> Signup Date </th>
                                <th width="10%"> Role </th>
                                <th width="20%"> Actions </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td width="10%">{{$user->first_name}} </td>
                                <td width="10%">{{$user->last_name}} </td>
                                <td width="10%">{{$user->email}} </td>
                                <td width="10%">{{$user->created_at}} </td>
                                <td width="10%">{{strtoupper($user->getRole())}} </td>
                                <td width="10%">
                                        <a href="{{route('admin.user.edit', ['id' => $user->id])}}"  class="btn btn-primary"><i class="fa fa-edit"></i> Edit </a>
                                        @if($user->getRole() != 'admin')
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'role' => 'form' ,
                                                'class' => 'form-horizontal form-validate-jquery',
                                                'id' => 'deleteuser',
                                                'url' => route('admin.user.destroy', ['id' => $user->id])
                                            ])
                                            !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'id' => 'submitEdit']) !!}
                                            {!! Form::close() !!}
                                        @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="clearfix"></div>
                    @endif
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
@stop

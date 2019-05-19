@extends('layout.app')

@section('content')
    <h1 class="page-title">Update Details</h1>
    <div class="container" style="align:center; height:650px; overflow:scroll;">
        <div class="col-xs-12">
            <div class="portlet light portlet-fit portlet-form ">
                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                    {!! Form::open([
                            'method' => 'POST',
                            'role' => 'form' ,
                            'class' => 'form-horizontal form-validate-jquery',
                            'id' => 'user',
                            'url' => route('frontpage.user.update', ['id' => Crypt::encrypt($user->id)])
                        ])
                    !!}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-3">First Name<span class="required"> * </span></label>
                                <div class="col-md-4">
                                    {!! Form::text(
                                            'first_name',
                                            old('first_name') ? old('first_name') : $user->first_name,
                                            ['class' => 'form-control', 'placeholder' => 'First Name', 'required' => 'true']
                                        )
                                    !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Last Name<span class="required"> * </span></label>
                                <div class="col-md-4">
                                    {!! Form::text(
                                            'last_name',
                                            old('last_name') ? old('last_name') : $user->last_name,
                                            ['class' => 'form-control', 'placeholder' => 'Last Name', 'required' => 'true']
                                        )
                                    !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Phone Number<span class="required"> * </span></label>
                                <div class="col-md-4">
                                    {!! Form::text(
                                            'phone_number',
                                            old('phone_number') ? old('phone_number') : ($user->phone_number),
                                            ['class' => 'form-control', 'placeholder' => 'Phone Number', 'required' => 'true']
                                        )
                                    !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Street<span class="required"> * </span></label>
                                <div class="col-md-4">
                                    {!! Form::text(
                                            'street',
                                            old('street') ? old('street') : ($user->street),
                                            ['class' => 'form-control', 'placeholder' => 'Street', 'required' => 'true']
                                        )
                                    !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Postcode<span class="required"> * </span></label>
                                <div class="col-md-4">
                                    {!! Form::text(
                                            'postal_code',
                                            old('postpostal_codecode') ? old('postal_code') : ($user->postal_code),
                                            ['class' => 'form-control', 'placeholder' => 'Postcode', 'required' => 'true']
                                        )
                                    !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">City<span class="required"> * </span></label>
                                <div class="col-md-4">
                                    {!! Form::text(
                                            'city',
                                            old('city') ? old('city') : ($user->city),
                                            ['class' => 'form-control', 'placeholder' => 'City', 'required' => 'true']
                                        )
                                    !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Country<span class="required"> * </span></label>
                                <div class="col-md-4">
                                    {!! Form::select(
                                            'country_id',
                                            $countries,
                                            isset($user->country_id) ? $user->country_id : '57',
                                            ['class' => 'form-control', 'required' => 'true']
                                        )
                                    !!}
                                </div>
                            </div>
                            
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        {!! Form::submit('Update User', ['class' => 'btn btn-primary', 'id' => 'submitEdit']) !!}
                                        <a href="{{ route('admin.user.index') }}" class="btn btn btn-danger">Cancel</a>
                                    </div>
                                </div>
                            </div>
                            
                    {!! Form::close() !!}
                    <!-- END FORM-->
                </div>
            </div>
        </div>
    </div>
@stop
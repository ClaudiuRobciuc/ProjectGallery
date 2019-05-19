@extends('layout.admin')

@section('content')
    <h1 class="page-title">Manage Carts</h1>
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
                    @if(Cart::content()->count() >= 1)
                    <table class="table table-striped table-bordered table-hover" id="view-users">
                        <thead>
                            <tr>
                                <th width="15%"> Image </th>
                                <th width="15%"> Last Name </th>
                                <th width="15%"> Email </th>
                                <th width="10%"> Signup Date </th>
                                <th width="10%"> Role </th>
                                <th width="20%"> Actions </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::content() as $product)
                            <tr>
                                <td width="10%"><img src="{{ url('storage/paintings/'.$product->model->image) }}" style="width:17em; height:8em;"> </td>
                                <td width="10%">{{$product->model->refference_id}} </td>
                                <td width="10%">{{$product->model->qty}} </td>
                                <td width="10%">{{$product->model->price}} </td>
                                <td width="10%">{{strtoupper($user->getRole())}} </td>
                                <td width="10%">
                                    <a href="{{route('admin.cart.show', ['id' => $cart->identifier])}}"  class="btn btn-primary"><i class="fa fa-edit"></i> View </a>
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

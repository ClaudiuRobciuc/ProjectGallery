@extends('layout.admin')

@section('content')
    <h1 class="page-title">Manage Orders</h1>
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
                   
                    @if(count($orders) >= 1)
                    <table class="table table-striped table-bordered table-hover" id="view-users">
                        <thead>
                            <tr>
                                <th width="35%"> User </th>
                                <th width="15%"> Status </th>
                                <th width="10%"> Shipping Status </th>
                                <th width="10%"> Tax </th>
                                <th width="10%"> Price </th>
                                <th width="10%"> Price TAX incl. </th>
                                <th width="20%"> Actions </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td width="10%">{{$order->user->email}} </td>
                                <td width="10%">
                                    {!! Form::select(
                                        'status',
                                        $orderStatus,
                                        isset($order->status_id) ? $order->status_id : '1',
                                        ['id' => 'status'.$order->id]
                                    )
                                    !!}
                                </td>
                                <td width="10%"> 
                                    {!! Form::select(
                                        'status',
                                        $shippingStatus,
                                        isset($order->shipping_status_id) ? $order->shipping_status_id : '',
                                        ['id' => 'shipping_status'.$order->id]
                                    )
                                    !!}
                                </td>
                                <td width="10%"> 25% </td>
                                <td width="10%">{{getWithCurrency($order->total_price)}} </td>
                                <td width="10%">{{getWithCurrency($order->taxPrice())}} </td>
                                <td width="10%">
                                    <a href="#"  class="btn btn-primary"><i class="fa fa-edit"></i> View PDF </a>
                                    <a data-id= "{{$order->id}}" href="javascript:;" id="update-btn" class="btn btn-primary"> Change Status </a>
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
    {!! Form::open([
        'method' => 'POST',
        'role' => 'form' ,
        'class' => 'form-horizontal form-validate-jquery',
        'id' => 'updateorder',
        'url' => route('admin.order.update')
    ])
    !!}
    {!! Form::hidden('orderId', '', ['id' => 'updateorder_id']) !!}
    {!! Form::hidden('status_id', '', ['id' => 'status_id']) !!}
    {!! Form::hidden('shipping_status_id', '', ['id' => 'shipping_status_id']) !!}
    {!! Form::close() !!}
@stop


@section('scripts')
<script>
    $("body").on("click", "#update-btn", function () 
    {
        id = $(this).attr('data-id');
        status = $('#status'+id).val();
        shippingStatus = $('#shipping_status'+id).val();

        $('#updateorder_id').val(id);
        $('#status_id').val(status);
        $('#shipping_status_id').val(shippingStatus);
        
        $('#updateorder').submit();
    });
    
</script>
@stop
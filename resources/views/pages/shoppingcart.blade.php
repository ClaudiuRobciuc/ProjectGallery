@extends('layout.app')

@section('content')
<table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>Product</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
 
        <tbody>
 
            @foreach(Cart::content() as $row) 
                <tr>
                    <td>
                        <p><strong>{{ $row->name }}</strong></p>
                    </td>
                    <td>{{ $row->qty }}</td>
                    <td>{{getWithCurrency($row->price)}}</td>
                    <td>{{getWithCurrency($row->total)}}</td>
                </tr>
            @endforeach
        </tbody>
        
        <tfoot>
            <tr>
                <td colspan="2">&nbsp;</td>
                <td></td>
                <td>Subtotal: {{Cart::subtotal()}} kr</td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
                <td></td>
                <td>Tax: {{getWithCurrency(Cart::tax())}} </td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
                <td></td>
                <td>Total: {{Cart::total()}} kr</td>
            </tr>
        </tfoot>
 </table>

 {!! Form::open([
    'method' => 'POST',
    'role' => 'form' ,
    'class' => 'form-horizontal form-validate-jquery',
    'id' => 'pay',
    'url' => route('frontpage.product.pay')
])
!!}

{!! Form::submit('Pay', ['class' => 'btn btn-primary', 'id' => 'add']) !!}
{!! Form::close() !!}

@endsection
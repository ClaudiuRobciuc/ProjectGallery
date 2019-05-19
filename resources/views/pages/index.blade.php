@extends('layout.app')

@section('content')
    <div class="container" style="height:800px; overflow:scroll;">
        <div class="row">
        @foreach($products as $product)
        <div class="col-sm-6 col-md-4">
            <div class="img-thumbnail">
                <img src="{{ url('storage/paintings/'.$product->image) }}" style="width:27em; height:18em;" class="img-thumbnail" alt="..." class="img-responsive">
                <div class="caption">
                    <h3>{!! $product->title !!}</h3>
                    <p class="description">{!! $product->description !!}</p>
                    <div class="clearfix">
                    <div class="pull-left price">{!! getWithCurrency($product->taxPrice()) !!}</div>
                        {!! Form::open([
                            'method' => 'POST',
                            'role' => 'form' ,
                            'class' => 'form-horizontal form-validate-jquery',
                            'id' => 'add',
                            'url' => route('frontpage.product.add', ['id' => $product->id])
                        ])
                        !!}

                        {!! Form::submit('Add to Cart', ['class' => 'btn btn-primary', 'id' => 'add']) !!}
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
        @endforeach
        </div>
    </div>
@endsection
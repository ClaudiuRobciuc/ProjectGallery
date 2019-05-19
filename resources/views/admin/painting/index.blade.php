@extends('layout.admin')

@section('content')
    <h1 class="page-title">Manage Paintings</h1>
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
                    @if(count($paintings)>=1)
                    <table class="table table-striped table-bordered table-hover" id="view-paintings">
                        <thead>
                            <tr>
                                <th width="10%"> Refference_id </th>
                                <th width="15%"> Image </th>
                                <th width="10%"> Author </th>
                                <th width="10%"> Title </th>
                                <th width="10%"> Description </th>
                                <th width="10%"> Price </th>
                                <th width="10%"> Type </th>
                                <th width="20%"> Actions </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paintings as $painting)
                            <tr>
                                <td width="10%">{{$painting->refference_id}} </td>
                                <td width="15%"><img src="{{ url('storage/paintings/'.$painting->image) }}" style="width:17em; height:8em;"></td>
                                <td width="10%">{{$painting->author}} </td>
                                <td width="10%">{{$painting->title}} </td>
                                <td width="10%">{{$painting->description}} </td>
                                <td width="10%">{{getWithCurrency($painting->price)}} </td>
                                <td width="10%">{{$painting->getType()}} </td>
                                <td width="10%">
                                        <a href="{{route('admin.painting.edit', ['id' => $painting->id])}}"  class="btn btn-primary"><i class="fa fa-edit"></i> Edit </a>
                                        {!! Form::open([
                                            'method' => 'DELETE',
                                            'role' => 'form' ,
                                            'class' => 'form-horizontal form-validate-jquery',
                                            'id' => 'deletepainting',
                                            'url' => route('admin.painting.destroy', ['id' => $painting->id])
                                        ])
                                        !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'id' => 'submitEdit']) !!}
                                        {!! Form::close() !!}
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

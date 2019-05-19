@extends('layout.admin')

@section('content')
    <h1 class="page-title">Edit Painting</h1>
    <div class="container" style="align:center">
        <div class="col-xs-12">
            <div class="portlet light portlet-fit portlet-form ">
                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                    {!! Form::open([
                            'method' => 'PUT',
                            'role' => 'form' ,
                            'class' => 'form-horizontal form-validate-jquery',
                            'id' => 'painting',
                            'files' => true,
                            'url' => route('admin.painting.update', ['id' => $painting->id])
                        ])
                    !!}
                        
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-3">Title<span class="required"> * </span></label>
                                <div class="col-md-4">
                                    {!! Form::text(
                                            'title',
                                            old('title') ? old('title') : $painting->title,
                                            ['class' => 'form-control', 'placeholder' => 'Title', 'required' => 'true']
                                        )
                                    !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Author<span class="required"> * </span></label>
                                <div class="col-md-4">
                                    {!! Form::text(
                                            'author',
                                            old('author') ? old('author') : $painting->author,
                                            ['class' => 'form-control', 'placeholder' => 'Author', 'required' => 'true']
                                        )
                                    !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Description<span class="required"> * </span></label>
                                <div class="col-md-4">
                                    {!! Form::textarea(
                                            'description',
                                            old('description') ? old('description') : $painting->description,
                                            ['class' => 'form-control', 'placeholder' => 'Description', 'required' => 'true']
                                        )
                                    !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Postcode<span class="required"> * </span></label>
                                <div class="col-md-4">
                                    {!! Form::text(
                                            'price',
                                            old('price') ? old('price') : ($painting->price),
                                            ['class' => 'form-control', 'placeholder' => 'Price', 'required' => 'true']
                                        )
                                    !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Type<span class="required"> * </span></label>
                                <div class="col-md-4">
                                    {!! Form::select(
                                            'type',
                                            $types,
                                            isset($painting->type) ? $painting->type : '1',
                                            ['class' => 'form-control', 'required' => 'true']
                                        )
                                    !!}
                                </div>
                            </div>
                            
                            <div class="form-body">
                                {{Form::file('image')}}
                            </div>

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        {!! Form::submit('Update Painting', ['class' => 'btn btn-primary', 'id' => 'submitEdit']) !!}
                                        <a href="{{ route('admin.painting.index') }}" class="btn btn btn-danger">Cancel</a>
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
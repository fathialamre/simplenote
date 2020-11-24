@extends('layouts.app')

@section('title')
{{__('pages.permissions')}}
@endsection

@section('breadcrumb')
{{ Breadcrumbs::render('permissions-edit') }}
@endsection

@section('page-title')
{{ __('forms.permissions') }} | <small>{{ __('breadcrumbs.edit') }}</small>
@endsection

@section('content')

<div class="panel panel-default panel-border-color panel-border-color-primary">
    <div class="panel-body">
        {!! Form::open(['method' => 'POST', 'route' => ['permissions.update', $permission->id]]) !!}
        
        @method('PUT')
        <div class="row">
            <div class="col col-md-6">
                <div class="form-group {{ $errors->has('name') ? "has-error": ""}}">
                    {!! Form::label('name', __('forms.name')) !!}
                    {!! Form::text('name', $permission->name , ['class' => 'form-control input-sm', 'placeholder' => __('forms.name'), 'autofocus' => 'autofocus' ]) !!}
                    
                    @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            
            <div class="col col-md-6">
                <div class="form-group {{ $errors->has('display_name') ? "has-error": ""}}">
                    {!! Form::label('display_name', __('forms.display-name')) !!}
                    {!! Form::text('display_name', $permission->display_name , ['class' => 'form-control input-sm', 'placeholder' => __('forms.display-name')]) !!}
                    
                    @if ($errors->has('display_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('display_name') }}</strong>
                    </span>
                    @endif
                </div>  
            </div>
        </div>
        <div class="row">
            <div class="col col-md-12">
            <div class="form-group">
                {!! Form::label('description', __('forms.description')) !!}
                {!! Form::text('description', $permission->description , ['class' => 'form-control input-sm', 'placeholder' => __('forms.description')]) !!}
            </div>  
            </div> 
        </div>

        <div class="row">
             <div class="col col-md-6">           
            <div class="form-group">
                {!! Form::submit(__('forms.save'), ['class' => 'btn btn-space btn-success']) !!}
                <a href="{{route('permissions.index')}}" class="btn btn-space btn-default">{{__('forms.cancel')}}</a>
            </div>
             </div>
        </div>
        {!! Form::close() !!}

</div>
</div>

@endsection
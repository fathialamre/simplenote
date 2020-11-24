@extends('layouts.app')

@push('before-styles')
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
@endpush

@section('title')
  {{__('forms.permissions')}}
@endsection

@section('breadcrumb')
    {{ Breadcrumbs::render('permissions-create') }}
@endsection

@section('page-title')
  {{ __('forms.permissions') }} | <small>{{ __('breadcrumbs.create') }}</small>
@endsection

@section('content')

    <div class="panel panel-default panel-border-color panel-border-color-primary">
            <div class="panel-body">
                {!! Form::open(['method' => 'POST', 'route' => ['permissions.store']]) !!}

                    <div class="form-group {{ $errors->has('name') ? "has-error": ""}}">
                        {!! Form::label('name', __('forms.name')) !!}
                        {!! Form::text('name','', ['class' => 'form-control input-sm', 'placeholder' => __('forms.name'), 'autofocus' => 'autofocus' ]) !!}
                        
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('display_name') ? "has-error": ""}}">
                        {!! Form::label('display_name', __('forms.display-name')) !!}
                        {!! Form::text('display_name','', ['class' => 'form-control input-sm', 'placeholder' => __('forms.display-name')]) !!}

                        @if ($errors->has('display_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('display_name') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('description', __('forms.description')) !!}
                        {!! Form::text('description','', ['class' => 'form-control input-sm', 'placeholder' => __('forms.description')]) !!}
                    </div>

                    <div class="form-group {{ $errors->has('title_ar') ? "has-error": ""}}">
                        {!! Form::label('entity_id', __('forms.entity')) !!}
                        {!! Form::select('entity_id', $entities, null, ['class' => 'form-control select2 input-sm', 'placeholder' => __('forms.entity'), 'autofocus' => 'autofocus' , 'data-live-search' => 'true']) !!}
                                        
                        @if ($errors->has('entity_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('entity_id') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        {!! Form::submit(__('forms.save'), ['class' => 'btn btn-space btn-success']) !!}
                        <a href="{{route('permissions.index')}}" class="btn btn-space btn-default">{{__('forms.cancel')}}</a>
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection

@push('after-scripts')
    <script src="{{ asset('js/bootstrap-select.min.js')}}"></script>
@endpush
    

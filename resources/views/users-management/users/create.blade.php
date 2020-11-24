@extends('layouts.app')

@section('content')
    @section('page-title')
        {{ __('forms.create-user') }}
    @endsection

    @section('breadcrumb')
        {{ Breadcrumbs::render('users-create') }}
    @endsection

    {{ Form::open(['method' => 'POST', 'route' => ['users.store']]) }}

        @csrf
        <div class="panel panel-default">
            <div class="panel-heading panel-heading-divider">{{__('forms.create-user')}}<span class="panel-subtitle">{{__('forms.from-here-we-can-add-new-user')}}</span></div>
            <div class="panel-body">

                <div class="row">
                    <div class="form-group col-md-6 xs-pt-10 {{ $errors->has('first_name') ? "has-error": ""}}">
                        <label>{{ __('forms.first_name') }}</label>
                        {{ Form::text('first_name','', ['class' => 'form-control input-sm', 'placeholder' => __('forms.first_name')]) }}

                        @if ($errors->has('first_name'))
                            <span class="help-block">
                                <small>{{ $errors->first('first_name') }}</small>
                            </span>
                        @endif
                    </div>

                    <div class="form-group col-md-6 xs-pt-10 {{ $errors->has('mid_name') ? "has-error": ""}}" >
                        <label>{{ __('forms.mid_name') }}</label>
                        {{ Form::text('mid_name','', ['class' => 'form-control input-sm', 'placeholder' => __('forms.mid_name')]) }}

                        @if ($errors->has('mid_name'))
                            <span class="help-block">
                                <small>{{ $errors->first('mid_name') }}</small>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 xs-pt-10 {{ $errors->has('last_name') ? "has-error": ""}}">
                        <label>{{ __('forms.last_name') }}</label>
                        {{ Form::text('last_name','', ['class' => 'form-control input-sm', 'placeholder' => __('forms.last_name')]) }}

                        @if ($errors->has('last_name'))
                            <span class="help-block">
                                <small>{{ $errors->first('last_name') }}</small>
                            </span>
                        @endif
                    </div>

                    <div class="form-group col-md-6 xs-pt-10 {{ $errors->has('email') ? "has-error": ""}} ">
                        <label>{{ __('forms.email') }}</label>
                        {{ Form::text('email','', ['class' => 'form-control input-sm', 'placeholder' => __('forms.email')]) }}

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <small>{{ $errors->first('email') }}</small>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 xs-pt-10 {{ $errors->has('phone') ? "has-error": ""}} ">
                        <label>{{ __('forms.phone') }}</label>
                        {{ Form::text('phone','', ['class' => 'form-control input-sm', 'placeholder' => __('forms.phone')]) }}

                        @if ($errors->has('phone'))
                            <span class="help-block">
                                <small>{{ $errors->first('phone') }}</small>
                            </span>
                        @endif
                    </div>

                    <div class="form-group col-md-6 xs-pt-10 {{ $errors->has('address') ? "has-error": ""}} ">
                        <label>{{ __('forms.address') }}</label>
                        {{ Form::text('address','', ['class' => 'form-control input-sm', 'placeholder' => __('forms.address')]) }}

                        @if ($errors->has('address'))
                            <span class="help-block">
                                <small>{{ $errors->first('address') }}</small>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 xs-pt-10 {{ $errors->has('password') ? "has-error": ""}} ">
                        <label>{{ __('forms.password') }}</label>
                        {{ Form::password('password', ['class' => 'form-control input-sm', 'placeholder' => __('forms.password')]) }}

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <small>{{ $errors->first('password') }}</small>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-6 xs-pt-10 {{ $errors->has('password') ? "has-error": ""}}">
                        <label>{{ __('forms.password_confirmation') }}</label>
                        {{ Form::password('password_confirmation', ['class' => 'form-control input-sm', 'placeholder' => __('forms.password_confirmation')]) }}
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 xs-pt-10">
                        <div class="be-checkbox">
                            {{ Form::checkbox('active',true, false, ['id'=>'user_active']) }}
                            <label for="user_active">{{__('forms.active')}}</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 xs-pt-10">
                        <button type="submit" class="btn btn-space btn-primary"> {{__('forms.save')}} <i class="mdi mdi-check"></i> </button>
                        <a href="{{ route('users.index') }}" class="btn btn-space btn-default">{{__('forms.cancel')}} <i class="mdi mdi-close"></i> </a>
                    </div>
                </div>

            </div>
        </div>
    {{ Form::close() }}

@endsection

@extends('layouts.app')

@section('content')
@section('page-title')
    {{ __('forms.edit-role') }}
@endsection
@section('breadcrumb')
    {{ Breadcrumbs::render('roles-edit') }}
@endsection
    {{ Form::open(['method' => 'POST', 'route' => ['roles.update', $role->id]]) }}
        @csrf
        @method('PUT')
        <div class="panel panel-default panel-border-color panel-border-color-primary">
            <div class="panel-heading panel-heading-divider">{{__('forms.edit-role')}}<span class="panel-subtitle">{{__('forms.from-here-we-can-add-new-role')}}</span></div>
            <div class="panel-body">

                <div class="row">
                    <div class="form-group col-md-6 xs-pt-10 {{ $errors->has('name') ? "has-error": ""}}">
                        <label>{{ __('forms.name') }}</label>
                        {{ Form::text('name',$role->name, ['class' => 'form-control input-sm', 'placeholder' => __('forms.name')]) }}

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <small>{{ $errors->first('name') }}</small>
                            </span>
                        @endif
                    </div>

                    <div class="form-group col-md-6 xs-pt-10 {{ $errors->has('display_name') ? "has-error": ""}}" >
                        <label>{{ __('forms.display-name') }}</label>
                        {{ Form::text('display_name',$role->display_name, ['class' => 'form-control input-sm', 'placeholder' => __('forms.display-name')]) }}

                        @if ($errors->has('display_name'))
                            <span class="help-block">
                                <small>{{ $errors->first('display_name') }}</small>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12 xs-pt-10 {{ $errors->has('description') ? "has-error": ""}}">
                        <label>{{ __('forms.description') }}</label>
                        {{ Form::text('description',$role->description, ['class' => 'form-control input-sm', 'placeholder' => __('forms.description')]) }}

                        @if ($errors->has('description'))
                            <span class="help-block">
                                <small>{{ $errors->first('description') }}</small>
                            </span>
                        @endif
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-md-12 xs-pt-10">
                        <div id="accordion1" class="panel-group accordion">
                            @foreach($permissions as $entity => $permission)
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion1" href="#{{ str_replace(' ', '', $entity)  }}" class="collapsed" aria-expanded="false">
                                                <i class="icon mdi mdi-chevron-down"></i>
                                                {{ $entity }}
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="{{ str_replace(' ', '', $entity)  }}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">
                                            @foreach($permission as $key => $item)
                                                <div class="form-group col-md-3">
                                                    <div class="be-checkbox">
                                                        {{ Form::checkbox('roles[]',$item->id, in_array($item->id, $permissions_roles) ? true : false, ['id'=>$item->id]) }}
                                                        <label for="{{$item->id}}">{{ $item->display_name }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @if ($errors->has('roles'))
                                <span class="help-block">
                                    <small>{{ $errors->first('roles') }}</small>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 xs-pt-10">
                        <button type="submit" class="btn btn-space btn-primary"> {{__('forms.save')}} <i class="mdi mdi-check"></i> </button>
                        <a href="{{ route('roles.index') }}" class="btn btn-space btn-default">{{__('forms.cancel')}} <i class="mdi mdi-close"></i> </a>
                    </div>
                </div>

            </div>
        </div>
    {{ Form::close() }}
@endsection

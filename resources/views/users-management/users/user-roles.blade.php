@extends('layouts.app')

@section('content')
    @section('page-title')
        {{ __('forms.user-roles') }}
    @endsection

    @section('breadcrumb')
        {{ Breadcrumbs::render('users-roles') }}
    @endsection

    {{ Form::open(['method' => 'POST', 'route' => ['update-user-roles', $user->id]]) }}

        @csrf
        <div class="panel panel-default">
            <div class="panel-heading panel-heading-divider">{{__('forms.user-roles')}}<span class="panel-subtitle">{{__('forms.from-here-we-can-edit-user-roles')}}</span></div>
            <div class="panel-body">

                <div class="row">
                    @foreach($roles as $key => $role)
                        <div class="form-group col-md-3">
                            <div class="be-checkbox">
                                {{ Form::checkbox('roles[]',$role->id, in_array($role->id, $user_roles) ? true : false, ['id'=>$role->id]) }}
                                <label for="{{$role->id}}">{{ $role->display_name }}</label>
                            </div>
                        </div>
                    @endforeach
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

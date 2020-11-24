@extends('layouts.app')

@section('content')
@section('page-title')
{{ __('forms.users') }}
@endsection

@section('breadcrumb')
{{ Breadcrumbs::render('users') }}
@endsection
<div class="row">
    <div class="col col-md-6">
        <div class="form-group">
            <a href="{{route('users.create')}}" class="btn btn-success btn-lg">{{ __('forms.create-user') }} <i class="icon mdi mdi-plus"></i></a>
        </div>
    </div>
    
    <div class="col col-md-6">
        <div class="form-group">
            {{ Form::open(['method' => 'GET', 'route' => ['users.index']]) }}
            <div class="input-group input-group-sm">
                <input type="text" class="form-control input-xs" value="{{ isset($s) ? $s : '' }}" name="s" placeholder="{{ __('forms.general-search') }}">
                <div class="input-group-btn ">
                    <a class="btn btn-default btn-sm pt-10" href="{{route('wifiAllIps.index')}}">
                        <div class="icon">
                            <i class="mdi mdi-close-circle-o icon-align"></i>
                        </div>
                    </a>
                    <button class="btn btn-default btn-sm" type="submit">
                        <div class="icon">
                            {{ __('forms.search') }}
                            <i class="mdi mdi-search"></i>
                        </div>
                    </button>
                </div>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>

@include('includes.messages')
<div class="panel panel-default panel-table panel-border-color panel-border-color-primary">
    <div class="panel-heading">{{__('forms.users-list')}}
        <div class="tools"><span class="icon mdi mdi-download"></span><span class="icon mdi mdi-more-vert"></span></div>
    </div>
    <div class="panel-body ">
        <table id="example" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th style="width:5%;">
                        <div class="be-checkbox be-checkbox-sm">
                            <input id="check1" type="checkbox">
                            <label for="check1"></label>
                        </div>
                    </th>
                    <th style="width:10%;">#{{__('forms.number')}}</th>
                    <th style="width:20%;">{{__('forms.user-name')}}</th>
                    <th style="width:22%;">{{__('forms.email')}} | {{__('forms.phone')}}</th>
                    <th style="width:15%;">{{__('forms.status')}}</th>
                    <th style="width:15%;">{{__('forms.created_at')}}</th>
                    <th style="width:10%;">{{__('forms.actions')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                
                <tr>
                    <td>
                        <div class="be-checkbox be-checkbox-sm">
                            <input id="check2" type="checkbox">
                            <label for="check2"></label>
                        </div>
                    </td>
                    <td>
                        {{ $user->id }}
                    </td>
                    
                    <td class="cell-detail">
                        <span>{{ $user->first_name }} {{ $user->mid_name }} </span>
                        <span class="cell-detail-description">{{ $user->last_name }}</span>
                    </td>
                    
                    <td>
                        <span class="badge badge-pill badge-info">
                            <i class="icon mdi mdi-email"></i>
                        </span>
                        {{ $user->email }}
                        <br>
                        <span class="badge badge-pill badge-success">
                            <i class="icon mdi mdi-phone"></i>
                        </span>
                        {{ $user->phone }}
                        <br>
                        <span class="badge badge-pill badge-danger">
                            <i class="icon mdi mdi-pin"></i>
                        </span>
                        {{ $user->address }}
                    </td>
                    
                    <td>
                        @if($user->active)
                        <span class="badge badge-pill badge-success">{{__('forms.enabled')}}</span>
                        @else
                        <span class="badge badge-pill badge-danger">{{__('forms.disabled')}}</span>
                        @endif
                    </td>
                    
                    <td>
                        <span >
                            <span class="badge badge-pill badge-warning">
                                <i class="icon mdi mdi-calendar"></i>
                                {{ \Carbon\Carbon::parse($user->created_at)->format('Y-m-d') }}
                            </span>
                        </span>
                        <br>
                        <span>
                            <span class="badge badge-pill badge-warning">
                                <i class="icon mdi mdi-time"></i>
                                {{ \Carbon\Carbon::parse($user->created_at)->format('H:i:s') }}
                            </span>
                        </span>
                    </td>
                    
                    <td class="text-right">
                        <div class="btn-group btn-hspace">
                            <button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle">{{ __('forms.actions') }}<span class="icon-dropdown mdi mdi-chevron-down"></span></button>
                            <ul role="menu" class="dropdown-menu pull-right">
                                <li><a href="{{route('users.edit', $user->id)}}">{{ __('forms.edit') }}</a></li>
                                <li><a href="{{route('user-roles', $user->id)}}">{{ __('forms.user-roles') }}</a></li>
                                <li><a class="pointer remove-record" data-csrf="{{csrf_token()}}" data-toggle="modal"  data-url="{{route('users.destroy', $user->id) }}" data-id="{{$user->id}}" data-target="#custom-width-modal">{{ __('forms.delete') }}</a></li>
                                
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
        {{ $users->appends(['s' => $s])->links() }}

@endsection

@section('modals')
@include('includes.delete-confirmation')
@endsection

@push('after-scripts')
<script src="{{ asset('js/delete-confremation.js') }}"></script>

@endpush

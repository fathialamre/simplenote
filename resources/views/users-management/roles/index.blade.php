@extends('layouts.app')

@section('content')

@section('page-title')
    {{ __('forms.roles') }}
@endsection

@section('breadcrumb')
    {{ Breadcrumbs::render('roles') }}
@endsection

<div class="form-group">
    <a href="{{route('roles.create')}}" class="btn btn-success btn-lg">{{ __('forms.create-role') }} <i class="icon mdi mdi-plus"></i></a>
</div>
@include('includes.messages')
<div class="panel panel-default panel-table  panel-border-color panel-border-color-primary">
    <div class="panel-heading">{{__('forms.roles-list')}}
        <div class="tools"><span class="icon mdi mdi-download"></span><span class="icon mdi mdi-more-vert"></span></div>
    </div>
    <div class="panel-body">
        <table id="example" class="table table-striped table-hover">
            <thead>
            <tr>
                <th style="width:10%;">#{{__('forms.number')}}</th>
                <th style="width:20%;">{{__('forms.name')}}</th>
                <th style="width:22%;">{{__('forms.display-name')}}</th>
                <th style="width:15%;">{{__('forms.details')}}</th>
                <th style="width:15%;">{{__('forms.created-at')}}</th>
                <th style="width:10%;">{{__('forms.actions')}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($roles as $index => $role)

                <tr>
                    <td>
                        {{ $role->id }}
                    </td>

                    <td>
                        <span>{{ $role->name }} </span>
                    </td>
                    <td class="cell-detail">
                        <span>{{ $role->display_name }} </span>
                        <span class="cell-detail-description">{{ $role->description }}</span>
                    </td>

                    <td>
                        <span >
                            <span class="badge badge-pill badge-info">
                                <i class="icon mdi mdi-dot-circle-alt"></i>
                                {{ $role->permissions->count()  }}
                            </span>
                        </span>
                        <br>
                        <span>
                            <span class="badge badge-pill badge-success">
                                <i class="icon mdi mdi-accounts"></i>
                                {{ $role->users->count() }}
                            </span>
                        </span>
                    </td>
                    <td>
                        <span >
                            <span class="badge badge-pill badge-warning">
                                <i class="icon mdi mdi-calendar"></i>
                                {{ \Carbon\Carbon::parse($role->created_at)->format('Y-m-d') }}
                            </span>
                        </span>

                        <span>
                            <span class="badge badge-pill badge-warning">
                                <i class="icon mdi mdi-time"></i>
                                {{ \Carbon\Carbon::parse($role->created_at)->format('H:i:s') }}
                            </span>
                        </span>
                    </td>

                    <td class="text-right">
                        <div class="btn-group btn-hspace">
                            <button type="button" data-toggle="dropdown"
                                    class="btn btn-default dropdown-toggle">{{ __('forms.actions') }}<span
                                    class="icon-dropdown mdi mdi-chevron-down"></span></button>
                            <ul role="menu" class="dropdown-menu pull-right">
                                <li><a href="{{route('roles.edit', $role->id)}}">{{ __('forms.edit') }}</a></li>
                                <li><a class="pointer remove-record" data-csrf="{{csrf_token()}}" data-toggle="modal"
                                       data-url="{{route('roles.destroy', $role->id) }}" data-id="{{$role->id}}"
                                       data-target="#custom-width-modal">{{ __('forms.delete') }}</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('modals')
    @include('includes.delete-confirmation')
@endsection

@push('after-scripts')
    <script src="{{ asset('js/delete-confremation.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                "language": {
                    "search": "{{ __('forms.search') }} : ",
                    "sLengthMenu": " {{ __('forms.display') }} _MENU_ {{ __('forms.records') }} ",
                    "emptyTable": "{{ __('forms.empty-table') }}",
                }, 

                "dom": '<"pull-right"f><"pull-left"l>tip'
            });
        } );
    </script>
@endpush

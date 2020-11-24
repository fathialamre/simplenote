@extends('layouts.app')

@section('title')
  {{__('pages.entities')}}
@endsection

@section('breadcrumb')
    {{ Breadcrumbs::render('entities') }}
@endsection

@section('page-title')
  {{ __('pages.entities') }} | <small>{{ __('pages.entities-list') }}</small>
@endsection

@section('content')
    @include('includes.messages')
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default panel-table panel-border-color panel-border-color-primary">
            <div class="panel-heading">
                <div class="tools"><span class="icon mdi mdi-download"></span><span class="icon mdi mdi-more-vert"></span></div>
                <a href="{{route('entities.create')}}" class="btn btn-success  clearfix">{{__('forms.add-entity')}}</a>
            </div>
            <br>
            <div class="panel-body">
                <table id="example" class="table table-striped table-hover table-fw-widget">
                <thead>
                    <tr>
                        <th>{{__('forms.index')}}</th>
                        <th>{{__('forms.name')}}</th>                            
                        <th>{{__('forms.display-name')}}</th>
                        <th>{{__('forms.description')}}</th>
                        <th>{{__('forms.control')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($entities as $index=>$entity)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>{{$entity->name}}</td>
                            <td>{{$entity->display_name}}</td>
                            <td>{{$entity->description}}</td>

                            <td class="text-right">
                                <div class="btn-group btn-hspace">
                                    <button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle">التحكم<span class="icon-dropdown mdi mdi-chevron-down"></span></button>
                                    <ul role="menu" class="dropdown-menu pull-right">
                                        <li>
                                            <a href="{{ route('entities.edit', $entity->id)}}" class="btn-default btn-sm"> <i class="icon mdi mdi-edit"></i> {{__('forms.edit')}}</a>
                                        </li>
                                        <li>
                                        </li>
                                        <li class="divider"></li>
                                    </ul>
                                </div>
                            </td>
                            <td>
                                <a class="btn btn-icons btn-rounded btn-danger remove-record" data-csrf="{{csrf_token()}}" data-toggle="modal" data-url="{{route('entities.destroy', $entity->id) }}" data-id="{{$entity->id}}" data-target="#custom-width-modal"><i class="mdi mdi-delete"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            </div>
        </div>
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
<form action="" method="POST" class="remove-record-model">
    <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h6 class="modal-title" id="custom-width-modalLabel">تأكيد الحذف</h6>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <div class="text-danger"><span class="modal-main-icon mdi mdi-close-circle-o"></span></div>
                        <h3>{{__('forms.warning')}}</h3>
                        <p>{{ __('forms.sure-you-want-to-delete-this-record?') }}</p>
                        <div class="xs-mt-50">
                            <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-dismiss="modal">{{ __('forms.cancel') }}</button>
                            <button type="submit" class="btn btn-danger waves-effect waves-light">{{ __('forms.delete') }}</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
</form>
@push('after-scripts')
    <script src="{{ asset('js/delete-confremation.js') }}"></script>
@endpush

{{--@push('scripts')--}}
{{--    <script src="{{asset('js/delete-confirmation.js')}}"></script>--}}
{{--@endpush--}}

{{--<div class="modal-content">--}}
{{--    <div class="modal-header">--}}
{{--        <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><span class="mdi mdi-close"></span></button>--}}
{{--    </div>--}}
{{--    <div class="modal-body">--}}
{{--        <div class="text-center">--}}
{{--            <div class="text-danger"><span class="modal-main-icon mdi mdi-close-circle-o"></span></div>--}}
{{--            <h3>Danger!</h3>--}}
{{--            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br>Fusce ultrices euismod lobortis.</p>--}}
{{--            <div class="xs-mt-50">--}}
{{--                <button type="button" data-dismiss="modal" class="btn btn-space btn-default">Cancel</button>--}}
{{--                <button type="button" data-dismiss="modal" class="btn btn-space btn-danger">Proceed</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="modal-footer"></div>--}}
{{--</div>--}}

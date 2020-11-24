@if(count($errors) > 0)


  @foreach($errors->all() as $error)
      <div role="alert" class="alert alert-contrast alert-danger alert-dismissible">
          <div class="icon"><span class="mdi mdi-close"></span></div>
          <div class="message">
              <button type="button" data-dismiss="alert" aria-label="Close" class="close">
                  <span aria-hidden="true" class="mdi mdi-close">
                  </span>
              </button>
              <strong>{{__('forms.sorry')}}</strong> {{$error}}
          </div>
      </div>
  @endforeach

@endif

@if(Session::has('message'))
 <div role="alert" class="alert alert-contrast alert-success alert-dismissible">
        <div class="icon"><span class="mdi mdi-check"></span></div>
        <div class="message">
            <button type="button" data-dismiss="alert" aria-label="Close" class="close">
                  <span aria-hidden="true" class="mdi mdi-close">
                  </span>
            </button>
            <strong>{{__('forms.good')}}</strong> {{ Session::get('message') }}
        </div>
    </div>
@endif

@if(session('success'))
    <div role="alert" class="alert alert-contrast alert-success alert-dismissible">
        <div class="icon"><span class="mdi mdi-check"></span></div>
        <div class="message">
            <button type="button" data-dismiss="alert" aria-label="Close" class="close">
                  <span aria-hidden="true" class="mdi mdi-close">
                  </span>
            </button>
            <strong>جيد</strong> {{ session('success')}}
        </div>
    </div>
@endif

@if(session('error'))
    <div role="alert" class="alert alert-contrast alert-danger alert-dismissible">
        <div class="icon"><span class="mdi mdi-close"></span></div>
        <div class="message">
            <button type="button" data-dismiss="alert" aria-label="Close" class="close">
                  <span aria-hidden="true" class="mdi mdi-close">
                  </span>
            </button>
            <strong>عذراً</strong> {{session('error')}}
        </div>
    </div>
@endif

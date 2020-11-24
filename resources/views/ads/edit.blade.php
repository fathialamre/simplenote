@include('layouts.header')

<div class="container-fluid tm-container-content tm-mt-60">

    <h3>إضافة إعلان جديد</h3>
    <div class="panel-body">
        {!! Form::open(['method' => 'PUT', 'route' => ['ads.update', $ad->id], 'enctype' => 'multipart/form-data']) !!}

        <div class="row">
            <div class="form-group col-md-6 {{ $errors->has('department_id') ? "has-error": ""}}">
                {!! Form::label('department_id', 'القسم') !!}
                {{ Form::select('department_id', $departments, $ad->department_id, ['class' => 'form-control']) }}

                @if ($errors->has('department_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('department_id') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group col-md-6 {{ $errors->has('company') ? "has-error": ""}}">
                {!! Form::label('company', ' الشركة') !!}
                {!! Form::text('company',$ad->company, ['class' => 'form-control', 'placeholder' => 'الشركة' ]) !!}

                @if ($errors->has('mobile'))
                    <span class="help-block">
                                    <strong>{{ $errors->first('company') }}</strong>
                                </span>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6 {{ $errors->has('phone') ? "has-error": ""}}">
                {!! Form::label('phone', 'رقم الهاتف') !!}
                {!! Form::text('phone',$ad->phone, ['class' => 'form-control', 'placeholder' => 'رقم الهاتف' ]) !!}

                @if ($errors->has('phone'))
                    <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                @endif
            </div>

            <div class="form-group col-md-6 {{ $errors->has('address') ? "has-error": ""}}">
                {!! Form::label('address', 'العنوان') !!}
                {!! Form::text('address',$ad->address, ['class' => 'form-control', 'placeholder' => 'العنوان' ]) !!}

                @if ($errors->has('address'))
                    <span class="help-block">
                         <strong>{{ $errors->first('address') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6 {{ $errors->has('activity') ? "has-error": ""}}">
                {!! Form::label('activity', 'النشاط ') !!}
                {!! Form::text('activity',$ad->activity, ['class' => 'form-control', 'placeholder' => 'النشاط' ]) !!}

                @if ($errors->has('activity'))
                    <span class="help-block">
                                    <strong>{{ $errors->first('activity') }}</strong>
                                </span>
                @endif
            </div>

            <div class="form-group col-md-6 {{ $errors->has('city') ? "has-error": ""}}">
                {!! Form::label('city', 'المدينة') !!}
                {{ Form::select('city_id', $cities, $ad->city_id, ['class' => 'form-control']) }}

                @if ($errors->has('city'))
                    <span class="help-block">
                         <strong>{{ $errors->first('city') }}</strong>
                    </span>
                @endif
            </div>
        </div>


        <div class="row">
            <div class="form-group col-md-6 {{ $errors->has('price') ? "has-error": ""}}">
                {!! Form::label('price', 'السعر المطلوب') !!}
                {!! Form::text('price',$ad->price, ['class' => 'form-control', 'placeholder' => 'السعر المطلوب' ]) !!}

                @if ($errors->has('price'))
                    <span class="help-block">
                         <strong>{{ $errors->first('price') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group col-md-6 {{ $errors->has('currency') ? "has-error": ""}}">
                {!! Form::label('currency', 'العملة') !!}
                {{ Form::select('currency', ['دينار ليبي' => 'دينار ليبي', 'دولار امريكي' => 'دولار امريكي'], $ad->currency, ['class' => 'form-control']) }}

                @if ($errors->has('currency'))
                    <span class="help-block">
                        <strong>{{ $errors->first('currency') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6 {{ $errors->has('des') ? "has-error": ""}}">
                {!! Form::label('des', ' الوصف') !!}
                {!! Form::text('des',$ad->des, ['class' => 'form-control', 'placeholder' => 'الوصف' ]) !!}

                @if ($errors->has('des'))
                    <span class="help-block">
                                    <strong>{{ $errors->first('des') }}</strong>
                                </span>
                @endif
            </div>

            <div class="form-group col-md-6 {{ $errors->has('des') ? "has-error": ""}}">
                {!! Form::label('des', ' الصورة') !!}
                <input type="file" class="form-control" name="image"
                       id="image" {{ $errors->has('image') ? 'class=has-error' : '' }}>


                @if ($errors->has('image'))
                    <span class="help-block">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                {!! Form::submit('حفظ المورد', ['class' => 'btn btn-space btn-info']) !!}
                <a href="{{route('ads.index')}}" class="btn btn-space btn-danger">إلغاء الأمر</a>
            </div>
        </div>

        {!! Form::close() !!}
    </div>
</div>


@include('layouts.footer')

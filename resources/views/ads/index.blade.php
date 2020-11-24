@include('layouts.header')

<div class="container-fluid tm-container-content tm-mt-60">

    @include('includes.messages')
    <div class="form-group">
        <a href="{{route('ads.create')}}" class="btn btn-primary">إنشاء إعلان</a>
    </div>
    <table class="table table-hover">

        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">اسم الشركة</th>
            <th scope="col">العنوان</th>
            <th scope="col">المدينة</th>
            <th scope="col">رقم الهاتف</th>
            <th scope="col">السعر المطلوب</th>
            <th scope="col">الصورة</th>
            <th scope="col">الاجراءات</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $row)
            <tr>
                <th scope="row">{{$row->id+1}}</th>
                <td>{{$row->company}}</td>
                <td>{{$row->city}}</td>
                <td>{{$row->address}}</td>
                <td>{{$row->phone}}</td>
                <td>{{$row->price}} - {{$row->currency}}</td>
                <td><img src="{{$row->getFirstMediaUrl("default")}}" height="50"></td>
                <td>
                    <a href="{{route('ads.edit', $row->id)}}" class="btn btn-primary btn-action"><i class="fa fa-edit"></i></a>
                    <a href="{{route('ads.destroy', $row->id)}}" class="btn btn-danger btn-action"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>


@include('layouts.footer')

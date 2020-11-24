@include('layouts.header')

<div class="container-fluid tm-container-content tm-mt-60">
    <div class="row mb-4">
        <h2 class="col-6 tm-text-primary">
            الأقسام
        </h2>
    </div>
    {{--    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">--}}
    {{--        <!-- Links -->--}}
    {{--        <ul class="navbar-nav">--}}
    {{--            <li class="nav-item">--}}
    {{--                <a class="nav-link" href="#">Link 1</a>--}}
    {{--            </li>--}}
    {{--            <li class="nav-item">--}}
    {{--                <a class="nav-link" href="#">Link 2</a>--}}
    {{--            </li>--}}

    {{--            <!-- Dropdown -->--}}
    {{--            <li class="nav-item dropdown">--}}
    {{--                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">--}}
    {{--                    Dropdown link--}}
    {{--                </a>--}}
    {{--                <div class="dropdown-menu">--}}
    {{--                    <a class="dropdown-item" href="#">Link 1</a>--}}
    {{--                    <a class="dropdown-item" href="#">Link 2</a>--}}
    {{--                    <a class="dropdown-item" href="#">Link 3</a>--}}
    {{--                </div>--}}
    {{--            </li>--}}
    {{--        </ul>--}}
    {{--    </nav>--}}
    <div class="row tm-mb-90 tm-gallery">
        @foreach($departments as $row)
            <a href="#" style="color: black; text-underline: none"><h5 class="dep-style">{{$row->name}}</h5></a>
        @endforeach
    </div>

    <div class="row mb-4">
        <h2 class="col-6 tm-text-primary">
            أحدث الإعلانات
        </h2>
    </div>

    <div class="row tm-mb-90 tm-gallery">

        @foreach($ads as $row)

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                <figure class="effect-ming tm-video-item">
                    <img src="{{$row->getFirstMediaUrl("ads")}}" height="250px" width="500" alt="Image"
                         style="object-fit: cover">
                    <figcaption class="d-flex align-items-center justify-content-center">
                        <h2>{{$row->des}}</h2>
                        <a href="{{route('ads.show', $row->id)}}">عرض المزيد</a>
                    </figcaption>
                </figure>
                <div class="d-flex justify-content-between tm-text-gray">
                    <span class="tm-text-gray-light">{{$row->company}}</span>
                    <span>{{$row->created_at}}</span>
                </div>
                <div class="d-flex justify-content-between tm-text-gray">
                    <span class="tm-text-gray-light">{{$row->activity}}</span>
                    <span><i class="fa fa-eye"></i> عدد المشاهدات{{ ' ' . $row->number_of_seen }}</span>
                </div>

            </div>

        @endforeach

    </div> <!-- row -->
    {{--    <div class="row tm-mb-90">--}}
    {{--        <div class="col-12 d-flex justify-content-between align-items-center tm-paging-col">--}}
    {{--            <a href="javascript:void(0);" class="btn btn-primary tm-btn-prev mb-2 disabled">Previous</a>--}}
    {{--            <div class="tm-paging d-flex">--}}
    {{--                <a href="javascript:void(0);" class="active tm-paging-link">1</a>--}}
    {{--                <a href="javascript:void(0);" class="tm-paging-link">2</a>--}}
    {{--                <a href="javascript:void(0);" class="tm-paging-link">3</a>--}}
    {{--                <a href="javascript:void(0);" class="tm-paging-link">4</a>--}}
    {{--            </div>--}}
    {{--            <a href="javascript:void(0);" class="btn btn-primary tm-btn-next">Next Page</a>--}}
    {{--        </div>--}}
    {{--    </div>--}}
</div> <!-- container-fluid, tm-container-content -->


@include('layouts.footer')

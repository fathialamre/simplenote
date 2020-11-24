@include('layouts.header')

<div class="be-wrapper">
    @include('layouts.navbar')
    @include('layouts.sidebar')
    
    <div class="be-content">
        
        <div class="main-content container-fluid">
            
            @yield('modals')
            <div class="container">
                
                <div class="page-head">
                    
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="page-head-title">
                                 @yield('page-title')
                            </div>
                        </div>
                        <div class="col col-md-6 pull-left">
                            @yield('breadcrumb')
                        </div>
                    </div>
                </div>
                
                @yield('content')
            </div>
        </div>
        
    </div>
</div>

@include('layouts.footer')

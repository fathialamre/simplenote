<div class="be-right-sidebar">
  <div class="right-sidebar-wrapper"><a href="#" class="right-sidebar-toggle">Blank Page</a>
    <div class="right-sidebar-spacer">
      <div class="right-sidebar-scroll">
        <div class="right-sidebar-content">
          <ul class="sidebar-elements">
            <li class="divider">Main Menu</li>
            <li>
              <a href="{{route('home')}}"><i class="icon mdi mdi-home"></i><span>Control Panel</span></a>
            </li>
            <li class="divider">System Management</li>

            @role('BOFSuper_Admin')
            <li class="parent"><a href=""><i class="icon mdi mdi-accounts-alt"></i><span>{{__('forms.users-management')}}</span></a>
              <ul class="sub-menu">
                <li class="{{ Route::is('users*') ? 'active' : '' }}"> <a href="{{route('users.index')}}">{{__('forms.users')}}</a> </li>
                <li class="{{ Route::is('roles*') ? 'active' : '' }}"> <a href="{{route('roles.index')}}">{{__('forms.roles')}}</a> </li>
                <li class="{{ Route::is('permissions*') ? 'active' : '' }}"> <a href="{{route('permissions.index')}}">{{__('forms.permissions')}}</a> </li>
              </ul>
            </li>
            @endrole

            <li class="parent"><a href=""><i class="icon mdi mdi-inbox"></i><span>الأساسيات</span></a>
              <ul class="sub-menu">
                @if (\Auth::user()->can('view_stores'))
                <li class="{{ Route::is('stores*') ? 'active' : '' }}"> <a href="{{route('stores.index')}}">{{__('forms.stores')}}</a> </li>
                @endif
                @if (\Auth::user()->can('view_resellers'))
                <li class="{{ Route::is('resellers*') ? 'active' : '' }}"> <a href="{{route('resellers.index')}}">{{__('forms.resellers')}}</a> </li>
                @endif
                @if (\Auth::user()->can('view_employees'))
                <li class="{{ Route::is('employees*') ? 'active' : '' }}"> <a href="{{route('employees.index')}}">{{ __('forms.employees') }}</a></li>
                @endif
                @if (\Auth::user()->can('view_manufactures'))
                <li class="{{ Route::is('manufactures*') ? 'active' : '' }}"> <a href="{{route('manufactures.index')}}">{{ __('forms.manufacture') }}</a></li>
                @endif
                @if (\Auth::user()->can('view_pops'))
                <li class="{{ Route::is('pops*') ? 'active' : '' }}"> <a href="{{route('pops.index')}}">{{ __('forms.pops') }}</a></li>
                @endif
                @if (\Auth::user()->can('view_wifi_vouchers'))
                <li class="{{ Route::is('vouchertemplates*') ? 'active' : '' }}"> <a href="{{route('vouchertemplates.index')}}">{{ __('forms.voucher-templates') }}</a></li>
                @endif
                @if (\Auth::user()->can('view_packages'))
                <li class="{{ Route::is('packages*') ? 'active' : '' }}"> <a href="{{route('packages.index')}}">{{ __('forms.packages') }}</a></li>
                @endif
              </ul>
            </li>

            <li class="parent"><a href=""><i class="icon mdi mdi-plus-circle"></i><span>{{ __('forms.addons-services') }}</span></a>
              <ul class="sub-menu">
                @if (\Auth::user()->can('view_wifi_ips'))
                <li class="{{ Route::is('wifiAllIps*') ? 'active' : '' }}"> <a href="{{route('wifiAllIps.index')}}">{{__('forms.wifi-ips')}}</a> </li>
                @endif
                @if (\Auth::user()->can('view_locations'))
                <li class="{{ Route::is('locations*') ? 'active' : '' }}"> <a href="{{route('locations.index')}}">{{__('forms.locations')}}</a> </li>
                @endif
                @if (\Auth::user()->can('view_vlans'))
                <li class="{{ Route::is('vlans*') ? 'active' : '' }}"> <a href="{{route('vlans.index')}}">{{__('forms.sites')}}</a> </li>
                @endif
              </ul>
            </li>

            @role('BOFSuper_Admin')
            <li class="parent"><a href=""><i class="icon mdi mdi-shield-security"></i><span>{{ __('forms.auditing') }}</span></a>
              <ul class="sub-menu">
                <li class="{{ Route::is('actionslog*') ? 'active' : '' }}"> <a href="{{route('actionslog.index')}}">{{__('forms.users-log')}}</a> </li>
                <li class="{{ Route::is('audits*') ? 'active' : '' }}"> <a href="{{route('audits.index')}}">{{__('forms.auditing-user')}}</a> </li>
              </ul>
            </li>

            @endrole
              <li class="parent"><a href=""><i class="icon mdi mdi-shield-security"></i><span>{{ __('forms.accounting') }}</span></a>
                  <ul class="sub-menu">
                      <li class="{{ Route::is('bankـreconciliations*') ? 'active' : '' }}"> <a href="{{route('bankـreconciliations.index')}}">{{__('forms.bank-reconciliations')}}</a> </li>
                  </ul>
              </li>

              <li class="parent"><a href=""><i class="icon mdi mdi-file"></i><span>الفواتير</span></a>
                  <ul class="sub-menu">
                      <li class="{{ Route::is('companiesreport*') ? 'active' : '' }}"> <a href="{{route('companiesreport')}}">فواتير الشركات</a> </li>
                  </ul>
              </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

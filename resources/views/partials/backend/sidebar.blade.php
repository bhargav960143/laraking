<!-- BEGIN: Left Aside -->
<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
    <i class="la la-close"></i>
</button>
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
    <!-- BEGIN: Aside Menu -->
    <div id="m_ver_menu"
         class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark m-aside-menu--dropdown "
         data-menu-vertical="true" m-menu-dropdown="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500">
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            <li class="m-menu__item  m-menu__item--{{ $request->segment(2) == 'dashboard' ? 'active' : '' }}"
                aria-haspopup="true">
                <a href="{{ url('securepanel/dashboard') }}" title="{{trans('label.dashboard_label')}}" class="m-menu__link ">
                    <span class="m-menu__item-here"></span>
                    <i class="m-menu__link-icon flaticon-dashboard"></i>
                    <span class="m-menu__link-text">
                        {{trans('label.dashboard_label')}}
                    </span>
                </a>
            </li>
            <li class="m-menu__item  m-menu__item--{{ $request->segment(2) == 'roles' ? 'active' : '' }}"
                aria-haspopup="true">
                <a href="{{ url('securepanel/roles') }}" title="{{trans('label.roles_title')}}" class="m-menu__link ">
                    <span class="m-menu__item-here"></span>
                    <i class="m-menu__link-icon flaticon-user-ok"></i>
                    <span class="m-menu__link-text">
                        {{trans('label.roles_title')}}
                    </span>
                </a>
            </li>
        </ul>
    </div>
    <!-- END: Aside Menu -->
</div>

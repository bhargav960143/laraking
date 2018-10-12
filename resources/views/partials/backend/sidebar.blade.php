@php
    $data = session('user_info');
@endphp
<!-- BEGIN: Left Aside -->
<button class="m-aside-left-close m-aside-left-close--skin-dark" id="m_aside_left_close_btn">
    <i class="la la-close"></i>
</button>
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
    <!-- BEGIN: Aside Menu -->
    <div
        id="m_ver_menu"
        class="m-aside-menu  m-aside-menu--skin-light m-aside-menu--submenu-skin-dark m-aside-menu--dropdown "
        data-menu-vertical="true"
        m-menu-dropdown="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500"
    >
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            @if($data['logged_in_role'] != "Operador")
                <li class="m-menu__item  m-menu__item--{{ $request->segment(2) == 'home' ? 'active' : '' }}"
                    aria-haspopup="true">
                    <a href="{{ url('/admin/home') }}" class="m-menu__link ">
                        <span class="m-menu__item-here"></span>
                        <i class="m-menu__link-icon flaticon-dashboard"></i>
                        <span class="m-menu__link-text">
                                Dashboard
                            </span>
                    </a>
                </li>
                <hr>
            @endif
            <li class="m-menu__item  m-menu__item--submenu {{ $request->segment(2) == 'camera' ? 'm-menu__item--active' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="{{ url('/admin/camera') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon fa fa-video-camera"></i>
                    <span class="m-menu__link-text">
                        Cámaras
                    </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
            </li>

            <li class="m-menu__item  m-menu__item--submenu {{ $request->segment(2) == 'screen' ? 'm-menu__item--active' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="{{ url('/admin/screen') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon fa fa-television"></i>
                    <span class="m-menu__link-text">
                        Pantallas
                    </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
            </li>

            <li class="m-menu__item  m-menu__item--submenu {{ $request->segment(2) == 'event' ? 'm-menu__item--active' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="{{ url('/admin/event') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-signs-2"></i>
                    <span class="m-menu__link-text">
                        Eventos
                    </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
            </li>
            {{--@if($data['logged_in_role'] != "Operador")
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-list"></i>
                    <span class="m-menu__link-text">
                        Reportes
                    </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
            </li>
            @endif--}}

            <li class="m-menu__item  m-menu__item--submenu {{ $request->segment(2) == 'event_status' ? 'm-menu__item--active' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="{{ url('/admin/event_status') }}" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon fa fa-power-off"></i>
                    <span class="m-menu__link-text">
                        Estado
                    </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
            </li>
            @if($data['logged_in_role'] != "Operador")
                <hr>

                <li class="m-menu__item  m-menu__item--submenu {{ $request->segment(2) == 'operator' ? 'm-menu__item--active' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover">
                    <a href="{{ url('/admin/operator') }}" class="m-menu__link m-menu__toggle">
                        <i class="m-menu__link-icon flaticon-avatar"></i>
                        <span class="m-menu__link-text">
                        Operadores
                    </span>
                        <i class="m-menu__ver-arrow la la-angle-right"></i>
                    </a>
                </li>

                <li class="m-menu__item  m-menu__item--submenu {{ $request->segment(2) == 'configuration' ? 'm-menu__item--active' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover">
                    <a href="{{ url('/admin/configuration') }}" class="m-menu__link m-menu__toggle">
                        <i class="m-menu__link-icon flaticon-settings"></i>
                        <span class="m-menu__link-text">
                        Configuraciones
                    </span>
                        <i class="m-menu__ver-arrow la la-angle-right"></i>
                    </a>
                </li>

                <br>

                <li class="m-menu__item  m-menu__item--@php
                    if($request->segment(2) == "permissions" || $request->segment(2) == "roles" || $request->segment(2) == "users"){
                        echo ' m-menu__item--active';
                    }
                @endphp"
                    aria-haspopup="true">
                    <a href="{{ url('/admin/users') }}" class="m-menu__link ">
                        <span class="m-menu__item-here"></span>
                        <i class="m-menu__link-icon fa fa-address-book-o" aria-hidden="true"></i>
                        <span class="m-menu__link-text">
                                Usuarios
                            </span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
    <!-- END: Aside Menu -->
</div>

<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route("admin.home") }}" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('schedule_access')
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-calendar nav-icon">

                    </i>
                    {{ trans('cruds.schedule.title') }}
                </a>
                <ul class="nav-dropdown-items">
                    @can('booking_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.bookings.index") }}"
                            class="nav-link {{ request()->is('admin/bookings') || request()->is('admin/bookings/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-cogs nav-icon">

                            </i>
                            {{ trans('cruds.booking.title') }}
                        </a>
                    </li>
                    @endcan
                    @can('my_calendar_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.my-calendars.index") }}"
                            class="nav-link {{ request()->is('admin/my-calendars') || request()->is('admin/my-calendars/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-cogs nav-icon">

                            </i>
                            {{ trans('cruds.myCalendar.title') }}
                        </a>
                    </li>
                    @endcan
                    @can('resource_calendar_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.resource-calendars.index") }}"
                            class="nav-link {{ request()->is('admin/resource-calendars') || request()->is('admin/resource-calendars/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-cogs nav-icon">

                            </i>
                            {{ trans('cruds.resourceCalendar.title') }}
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
            @can('user_management_access')
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="nav-dropdown-items">
                    @can('permission_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.permissions.index") }}"
                            class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-unlock-alt nav-icon">

                            </i>
                            {{ trans('cruds.permission.title') }}
                        </a>
                    </li>
                    @endcan
                    @can('role_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.roles.index") }}"
                            class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-briefcase nav-icon">

                            </i>
                            {{ trans('cruds.role.title') }}
                        </a>
                    </li>
                    @endcan
                    @can('user_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.users.index") }}"
                            class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-user nav-icon">

                            </i>
                            {{ trans('cruds.user.title') }}
                        </a>
                    </li>
                    @endcan
                    @can('audit_log_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.audit-logs.index") }}"
                            class="nav-link {{ request()->is('admin/audit-logs') || request()->is('admin/audit-logs/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-file-alt nav-icon">

                            </i>
                            {{ trans('cruds.auditLog.title') }}
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
            @can('user_alert_access')
            <li class="nav-item">
                <a href="{{ route("admin.user-alerts.index") }}"
                    class="nav-link {{ request()->is('admin/user-alerts') || request()->is('admin/user-alerts/*') ? 'active' : '' }}">
                    <i class="fa-fw fas fa-bell nav-icon">

                    </i>
                    {{ trans('cruds.userAlert.title') }}
                </a>
            </li>
            @endcan
            @can('lobok_access')
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-book nav-icon">

                    </i>
                    {{ trans('cruds.lobok.title') }}
                </a>
                <ul class="nav-dropdown-items">
                    @can('resource_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.resources.index") }}"
                            class="nav-link {{ request()->is('admin/resources') || request()->is('admin/resources/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-door-open nav-icon">

                            </i>
                            {{ trans('cruds.resource.title') }}
                        </a>
                    </li>
                    @endcan
                    @can('reservation_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.reservations.index") }}"
                            class="nav-link {{ request()->is('admin/reservations') || request()->is('admin/reservations/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-calendar-alt nav-icon">

                            </i>
                            {{ trans('cruds.reservation.title') }}
                        </a>
                    </li>
                    @endcan
                    @can('reservation_status_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.reservation-statuses.index") }}"
                            class="nav-link {{ request()->is('admin/reservation-statuses') || request()->is('admin/reservation-statuses/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-server nav-icon">

                            </i>
                            {{ trans('cruds.reservationStatus.title') }}
                        </a>
                    </li>
                    @endcan
                    @can('company_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.companies.index") }}"
                            class="nav-link {{ request()->is('admin/companies') || request()->is('admin/companies/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-address-card nav-icon">

                            </i>
                            {{ trans('cruds.company.title') }}
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
            @can('my_account_access')
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-user-cog nav-icon">

                    </i>
                    {{ trans('cruds.myAccount.title') }}
                </a>
                <ul class="nav-dropdown-items">
                    @can('profile_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.profiles.index") }}"
                            class="nav-link {{ request()->is('admin/profiles') || request()->is('admin/profiles/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-cogs nav-icon">

                            </i>
                            {{ trans('cruds.profile.title') }}
                        </a>
                    </li>
                    @endcan
                    @can('change_password_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.change-passwords.index") }}"
                            class="nav-link {{ request()->is('admin/change-passwords') || request()->is('admin/change-passwords/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-cogs nav-icon">

                            </i>
                            {{ trans('cruds.changePassword.title') }}
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
            <li class="nav-item">
                <a href="#" class="nav-link"
                    onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>

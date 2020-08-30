<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('active_management_access')
            <li class="c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-truck-loading c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.activeManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('active_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.actives.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/actives") || request()->is("admin/actives/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.active.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('tool_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.tools.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/tools") || request()->is("admin/tools/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-wrench c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.tool.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('material_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.materials.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/materials") || request()->is("admin/materials/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-brush c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.material.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('sample_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.samples.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/samples") || request()->is("admin/samples/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-desktop c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.sample.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('material_entry_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.material-entries.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/material-entries") || request()->is("admin/material-entries/*") ? "active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.materialEntry.title') }}
                </a>
            </li>
        @endcan
        @can('output_material_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.output-materials.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/output-materials") || request()->is("admin/output-materials/*") ? "active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.outputMaterial.title') }}
                </a>
            </li>
        @endcan
        @can('location_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.locations.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/locations") || request()->is("admin/locations/*") ? "active" : "" }}">
                    <i class="fa-fw fas fa-store-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.location.title') }}
                </a>
            </li>
        @endcan
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>
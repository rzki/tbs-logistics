<ul class="nav flex-column pt-3 pt-md-0">
    <li class="nav-item">
        <a href="{{ route('dashboard') }}" class="nav-link d-flex align-items-center">
            <span class="mt-1 ms-1 sidebar-text">
                {{ config('app.name') }}
            </span>
        </a>
    </li>

    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <a href="{{ route('dashboard') }}" class="nav-link">
            <span>
                <span class="sidebar-icon me-3">
                    <i class="fas fa-tachometer"></i>
                </span>
                <span class="sidebar-text">{{ __('Dashboard') }}</span>
            </span>
        </a>
    </li>

    <li class="nav-item {{ request()->routeIs('shipments.*') ? 'active' : '' }}">
        <a href="{{ route('shipments.index') }}" class="nav-link">
            <span>
                <span class="sidebar-icon me-3">
                    <i class="fas fa-ship"></i>
                </span>
                <span class="sidebar-text">{{ __('Shipments') }}</span>
            </span>
        </a>
    </li>

    <li class="nav-item {{ request()->routeIs('companies.*') || request()->routeIs('users.*') ? 'active' : '' }}">
        <span class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
            data-bs-target="#admin-settings">
            <span>
                <span class="sidebar-icon me-3">
                    <i class="fas fa-cog"></i>
                </span>
                <span class="sidebar-text">{{ __('Admin Settings') }}</span>
            </span>
            <span class="link-arrow">
                <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd">
                    </path>
                </svg>
            </span>
        </span>
        <div class="multi-level collapse" role="list" id="admin-settings" aria-expanded="false">
            <ul class="flex-column nav">
                <li class="nav-item {{ request()->routeIs('users.*') ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}" class="nav-link" wire:navigate>
                        <span class="sidebar-icon">
                            <i class="fas fa-users"></i>
                        </span>
                        <span class="sidebar-text">{{ __('Users') }}</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('roles.*') ? 'active' : '' }}">
                    <a href="{{ route('roles.index') }}" class="nav-link" wire:navigate>
                        <span class="sidebar-icon">
                            <i class="fas fa-user-cog"></i>
                        </span>
                        <span class="sidebar-text">{{ __('Roles') }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
</ul>
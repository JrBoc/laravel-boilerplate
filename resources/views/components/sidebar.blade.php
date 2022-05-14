<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <div class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
            {{ config('app.name') }}
        </div>
        <div class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
            {{ Str::substr(config('app.name'), 0, 1) }}
        </div>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard.index') }}"><i class="nav-icon cil-speedometer"></i>Dashboard<span class="badge badge-sm bg-info ms-auto">NEW</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('users.index') }}"><i class="nav-icon cil-group"></i>Users</a>
        </li>
        <li class="nav-title">Group #1</li>
        <li class="nav-item">
            <a class="nav-link" href="#item-1"><i class="nav-icon cil-drop"></i>Item #1</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#item-2"><i class="nav-icon cil-drop"></i>Item #2</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#item-3"><i class="nav-icon cil-drop"></i>Item #3</a>
        </li>
        <li class="nav-title">Group #2</li>
        <li class="nav-group">
            <a class="nav-link nav-group-toggle" href="#"><i class="nav-icon cil-group"></i>Group #1</a>
            <ul class="nav-group-items">
                <li class="nav-item"><a class="nav-link" href="#item-4"><span class="nav-icon"></span> Sub Item #1</a></li>
                <li class="nav-item"><a class="nav-link" href="#item-5"><span class="nav-icon"></span> Sub Item #2</a></li>
                <li class="nav-item "><a class="nav-link disabled" href="#item-6"><span class="nav-icon"></span> Sub Item #3</a></li>
            </ul>
        </li>
    </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>

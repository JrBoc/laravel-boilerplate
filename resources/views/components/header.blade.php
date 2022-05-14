<header class="header header-sticky mb-4">
    <div class="container-fluid">
        <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <i class="cil-menu icon icon-lg"></i>
        </button>
        <a class="header-brand d-md-none" href="#">
            <div width="118" height="46" alt="Logo">
                {{ config('app.name') }}
            </div>
        </a>
        <ul class="header-nav d-none d-md-flex">
            <li class="nav-item"><a class="nav-link" href="#">[Link]</a></li>
        </ul>
        <ul class="header-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="#">[Link]</a></li>
        </ul>
        <ul class="header-nav ms-3">
            <li class="nav-item dropdown">
                <a class="nav-link py-0 d-flex align-items-center" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    {{ auth()->user()?->name }}
                    <div class="avatar avatar-md"><i class="cil-user icon icon-lg"></i></div>
                </a>
                <div class="dropdown-menu dropdown-menu-end shadow border-0">
                    <a class="dropdown-item" href="#">
                        <i class="cil-user icon icon me-2"></i>Profile
                    </a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="dropdown-item" type="submit">
                            <i class="cil-account-logout icon me-2"></i>Logout
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
    @if(session()->has('breadcrumbs'))
        <div class="header-divider"></div>
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb my-0 ms-2">
                    <li class="breadcrumb-item">
                        <a href="#"><i class="icon cil-home"></i></a>
                    </li>
                    @foreach(session('breadcrumbs.parent') as $link => $name)
                        <li class="breadcrumb-item">
                            <a href="{{ $link }}">{{ $name }}</a>
                        </li>
                    @endforeach
                    <li class="breadcrumb-item active"><span>{{ session('breadcrumbs.pageName') }}</span></li>
                </ol>
            </nav>
        </div>
        @php
            session()->remove('breadcrumbs')
        @endphp
    @endif
</header>

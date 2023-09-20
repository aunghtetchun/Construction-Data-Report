@auth
    <div class="aside-left bg-white px-3 pb-2 min-vh-100 shadow">
        <ul class="menu" style="list-style-type: none">
            <li class="brand-icon">
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset(\App\Custom::$info['c-logo']) }}" class="brand-icon-img">
                        <small
                            class="text-primary font-weight-bold h5 mb-0 ml-2">{{ \App\Custom::$info['short_name'] }}</small>
                    </div>
                    <button class="btn btn-light d-block d-lg-none aside-menu-close">
                        <i class="feather-x fa-2x"></i>
                    </button>
                </div>
            </li>
            <li>
                <a class="menu-item mt-3" href="{{ route('admin.home') }}">
                    <span>
                        <i class="feather-home"></i>
                        Dashboard
                    </span>
                </a>
            </li>
          
            @component('component.nav-spacer')
            @endcomponent

            @component('component.nav-title')
                Manager Management
            @endcomponent

            @component('component.nav-item')
                @slot('icon') <i class="feather-plus-circle"></i> @endslot
                @slot('name') Add Manager @endslot
                @slot('link') {{ route('admin.createManager') }} @endslot
            @endcomponent

            @component('component.nav-item-count')
                @slot('icon')
                    <i class="feather-list"></i>
                @endslot
                @slot('name')
                    Manager List
                @endslot
                @slot('link')
                    {{ route('admin.managerList') }}
                @endslot
                @slot('count')
                    {{ \App\User::where('role','manager')->count() }}
                @endslot
            @endcomponent
            @component('component.nav-spacer')
            @endcomponent

            @component('component.nav-title')
                Leader Management
            @endcomponent

            @component('component.nav-item')
                @slot('icon') <i class="feather-plus-circle"></i> @endslot
                @slot('name') Add Leader @endslot
                @slot('link') {{ route('admin.createLeader') }} @endslot
            @endcomponent

            @component('component.nav-item-count')
                @slot('icon')
                    <i class="feather-list"></i>
                @endslot
                @slot('name')
                    Leader List
                @endslot
                @slot('link')
                    {{ route('admin.leaderList') }}
                @endslot
                @slot('count')
                    {{ \App\User::where('role','leader')->count() }}
                @endslot
            @endcomponent
            @component('component.nav-spacer')
            @endcomponent

            @component('component.nav-title')
                Item Management
            @endcomponent

            @component('component.nav-item')
                @slot('icon') <i class="feather-plus-circle"></i> @endslot
                @slot('name') Add Item @endslot
                @slot('link') {{ route('item.create') }} @endslot
            @endcomponent

            @component('component.nav-item-count')
                @slot('icon')
                    <i class="feather-list"></i>
                @endslot
                @slot('name')
                    Item List
                @endslot
                @slot('link')
                    {{ route('item.index') }}
                @endslot
                @slot('count')
                    {{ \App\Item::count() }}
                @endslot
            @endcomponent
            @component('component.nav-spacer')
            @endcomponent
            @component('component.nav-title')
            Site Management
        @endcomponent

        @component('component.nav-item')
            @slot('icon') <i class="feather-plus-circle"></i> @endslot
            @slot('name') Add Site @endslot
            @slot('link') {{ route('site.create') }} @endslot
        @endcomponent

        @component('component.nav-item-count')
            @slot('icon')
                <i class="feather-list"></i>
            @endslot
            @slot('name')
                Site List
            @endslot
            @slot('link')
                {{ route('site.index') }}
            @endslot
            @slot('count')
                {{ \App\Site::count() }}
            @endslot
        @endcomponent
        @component('component.nav-spacer')
        @endcomponent

            @component('component.nav-title')
                Report Management
            @endcomponent

            @component('component.nav-item-count')
                @slot('icon')
                    <i class="feather-list"></i>
                @endslot
                @slot('name')
                    Report List
                @endslot
                @slot('link')
                    {{ route('admin.reportList') }}
                @endslot
                @slot('count')
                    {{ \App\Report::count() }}
                @endslot
            @endcomponent
            @component('component.nav-spacer')
            @endcomponent
            @component('component.nav-title')
            Order Management
        @endcomponent

        @component('component.nav-item-count')
            @slot('icon')
                <i class="feather-list"></i>
            @endslot
            @slot('name')
                Order List
            @endslot
            @slot('link')
                {{ route('admin.orderList') }}
            @endslot
            @slot('count')
                {{ \App\Order::count() }}
            @endslot
        @endcomponent

            @component('component.nav-spacer')
            @endcomponent
            <li>
                <a class="menu-item alert-secondary" onclick="logout()" href="#">
                    <span>
                        <i class="fas fa-lock"></i>
                        Logout
                    </span>
                </a>
            </li>
        </ul>
    </div>


@endauth

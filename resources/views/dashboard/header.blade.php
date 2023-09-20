<div class="p-2 d-flex px-0 bg-primary shadow-sm rounded justify-content-between align-items-center header animate__animated animate__fadeIn">
        <button class="btn btn-primary d-inline d-lg-none aside-menu-open mb-0">
            <i class="feather-menu fa-2x mb-0"></i>
        </button>
        <form class="d-none d-md-block" action="}">

            <div class="form-inline">

                <div class="dropdown mr-3">
                    <a class="btn btn-light bg-transparent text-white border-0 text-uppercase" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-plus-circle"></i> Quick Add
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                        @component("component.header-qa")
                            @slot("name") Add Sample @endslot
                            @slot("link") # @endslot
                        @endcomponent

                    </div>
                </div>
            </div>
        </form>
        <div class="dropdown">
            <a class="btn btn-light bg-transparent text-white border-0" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{ isset(Auth::user()->photo) ? asset('storage/profile/'.Auth::user()->photo) : asset('dashboard/images/profile_default.png') }}" class="rounded-circle mr-1" style="width: 30px" alt="">
                <span class="d-none d-lg-inline">
                    {{ Auth::user()->name }}
                </span>
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                <a class="dropdown-item" target="_blank" href="{{ route('profile.edit') }}">
                    <i class="feather-user"></i>
                    Edit Profile
                </a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"  onclick="logout()">
                    <i class="fa fa-lock"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>

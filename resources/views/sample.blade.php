@extends('dashboard.app')

@section("title") Sample Page @endsection

@section('content')

    @component("component.breadcrumb",["data"=>[
        "a" => "#",
        "b" => "#"
    ]])
    @slot("last") Sample @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Card Title @endslot
                @slot('button')  @endslot
                @slot('body')
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto aut consequatur, cumque debitis doloremque eius enim error facere hic maxime necessitatibus officiis, perferendis quam quisquam reiciendis similique totam ut veritatis?
                @endslot
            @endcomponent
        </div>
        <div class="col-12 col-md-6">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') Card Title 2 @endslot
                @slot('button')
                        <a href="#" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-plus fa-fw"></i>
                        </a>
                @endslot
                @slot('body')
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto aut consequatur, cumque debitis doloremque eius enim error facere hic maxime necessitatibus officiis, perferendis quam quisquam reiciendis similique totam ut veritatis?
                @endslot
            @endcomponent
        </div>

        <div class="col-12 col-md-6">
            @component("component.card")
                @slot('icon') <i class="feather-file text-primary"></i> @endslot
                @slot('title') မင်္ဂလာပါ @endslot
                @slot('button')  @endslot
                @slot('body')
                    သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။
                @endslot
            @endcomponent
        </div>
    </div>
@endsection

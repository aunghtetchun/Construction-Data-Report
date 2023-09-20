<div class="row">
    <div class="col-12">
        <div class="pb-3">
            <a class="text-uppercase" href="{{ route('home') }}"><i class="feather-home"></i></a>
            <span class="mx-2"><i class="fas fa-angle-right"></i></span>
            @foreach($data as $name=>$link)
                <a class="text-uppercase" href="{{ $link }}">{{ $name }}</a>
                <span class="mx-2"><i class="fas fa-angle-right"></i></span>
            @endforeach
            <span class="text-uppercase">{{ $last }}</span>
        </div>
    </div>
</div>

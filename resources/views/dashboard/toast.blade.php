<!–– Toast Start ––>
@if(session('status'))

    <div aria-live="polite" aria-atomic="true" style="position: fixed;z-index: 100;right: 10px;top: 75px;" >
        <div class="toast animate__animated  animate__bounceInDown" data-delay="5000">
            <div class="toast-header">
                <img src="{{ asset(\App\Custom::$info['c-logo']) }}" class="rounded toast-icon mr-2" alt="...">
                <strong class="mr-auto">Hi! {{ Auth::user()->name }}</strong>
                <small>Just Now</small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                {!! session('status') !!}
            </div>
        </div>

    </div>

@endif
<!–– Toast End ––>

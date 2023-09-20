<div class="card card-mb">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <p class="mb-0 text-uppercase">
                {{ $title }}
            </p>
            <div class="">
                {{ $button }}
                <button class="btn btn-outline-secondary btn-sm btn-maximize" title="Maximize">
                    <i class="fas fa-expand-alt fa-fw"></i>
                </button>
            </div>
        </div>
        <hr>
        {{ $body }}
    </div>
</div>

@foreach ($composerKpiKeys as $key)
    <div class="sidebarBody_cardmini">
        <div class="overText" style="flex:1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="{{ $key->name ?? '' }}">
            <span class="sidebarBody_card-title">
                <i class="bi bi-filetype-key"></i>
                {{ $key->name ?? '' }}
            </span>
        </div>
        <div>
            <strong>
                <span class="text-success">{{ $key->accumulated ?? 0 }}</span>
                <span>/</span>
                <span>{{ $key->total ?? 0 }} </span>
            </strong>
        </div>
    </div>
@endforeach

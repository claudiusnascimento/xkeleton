@if($toastrs = session()->pull(config('message.session_key') . '.toastr', false))
    <div>
        @foreach($toastrs as $toast)
            <input
                type="hidden"
                data-type="toastr"
                data-message="{{ $toast['message'] }}"
                data-title="{{ $toast['title'] }}"
                data-level="{{ $toast['level'] }}">
        @endforeach
    </div>
@endif

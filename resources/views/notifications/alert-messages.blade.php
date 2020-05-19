@if($alerts = session()->pull(config('message.session_key') . '.alert', false))
    <div>
        @foreach($alerts as $alert)

            <x-common.alert :text="$alert['message']" :type="$alert['level']" />

        @endforeach
    </div>
@endif

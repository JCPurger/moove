@if (Session::has('success'))
    @component('components.alert', ['type' => 'success'])
        {{ Session::get('success') }}
    @endcomponent
@endif

@if (Session::has('error'))
    @component('components.alert', ['type' => 'danger'])
        {{ Session::get('error') }}
    @endcomponent
@endif

@if (Session::has('warning'))
    @component('components.alert', ['type' => 'warning'])
        {{ Session::get('warning') }}
    @endcomponent
@endif

@if (Session::has('info'))
    @component('components.alert', ['type' => 'info'])
        {{ Session::get('info') }}
    @endcomponent
@endif

@if ($errors->any())
    @component('components.alert', ['type' => 'danger'])
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    @endcomponent
@endif
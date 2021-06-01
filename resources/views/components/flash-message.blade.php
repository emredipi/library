@if(session('success'))
    <x-alert type="success" :message="session('success')"/>
@elseif(session('info'))
    <x-alert type="info" :message="session('info')"/>
@elseif(session('warning'))
    <x-alert type="warning" :message="session('warning')"/>
@elseif(session('error'))
    <x-alert type="error" :message="session('error')"/>
@endif

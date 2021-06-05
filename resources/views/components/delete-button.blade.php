@props(['action-url','icon' => false])
@php $id = Str::random(10); @endphp
@if($icon)
    <x-button form="{{$id}}" class="bg-red-600 hover:bg-red-500">
        <x-icon.delete/>
    </x-button>
@else
    <button type="submit" class="text-red-500" form="{{$id}}">Sil</button>
@endif
@push('scripts')
    <form
        action="{{$actionUrl}}"
        method="post"
        id="{{$id}}"
    >
        @csrf
        @method('delete')
    </form>
@endpush

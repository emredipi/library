@props(['action-url'])
@php $id = Str::random(10); @endphp
<button type="submit" class="text-red-500" form="{{$id}}">Sil</button>
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

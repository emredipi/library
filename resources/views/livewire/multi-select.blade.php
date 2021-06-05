<div class="relative mb-4"
     x-data="{isVisible: false}"
     @click.away="isVisible = false"
>
    <div class="flex flex-wrap flex-1 gap-1 mb-1">
        <span class="mr-1">{{$label}}: </span>
        @foreach($selectedItems as $selected)
            <span
                class="transition-all bg-green-400 hover:bg-red-400 rounded p-1 text-sm text-white font-bold cursor-pointer"
                wire:click="remove({{$selected->id}})"
            >
                {{ $selected->name }}
            </span>
            <input type="hidden" name="{{$name}}[]" value="{{$selected->id}}">
        @endforeach
    </div>
    <input
        wire:model="searchText"
        @focus="isVisible = true"
        type="text"
        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full mb-1"
        placeholder="Ara..."
    >
    <x-card x-show="isVisible"
            style="display: none"
            class="absolute w-full max-h-40 overflow-scroll border-b border-gray-300 overscroll-contain">
        @foreach($items as $item)
            <div
                class="w-full bg-gray-100 p-1 mb-1 rounded-md hover:bg-gray-200 cursor-pointer pl-2 font-semibold"
                wire:click="choose({{$item->id}})"
                @click="isVisible = false"
            >
                {{$item->name}}
            </div>
        @endforeach
    </x-card>
</div>

<x-app-layout>
    <x-slot name="header">Yayınevleri</x-slot>
    <x-section>
        <div class="md:w-2/3 lg:w-1/2 mx-auto">
            <x-flash-message/>
            <div class="mb-3 flex justify-between">
                <form action="{{route('publisher.index')}}">
                    <x-input name="search" type="text" placeholder="Ara..."/>
                </form>
                <a href="{{route('publisher.create')}}">
                    <x-button>Yayınevi Ekle</x-button>
                </a>
            </div>
            <x-table :columns="['ID','İsim','İşlem']">
                @foreach($publishers as $publisher)
                    <tr>
                        <x-column>{{$publisher->id}}</x-column>
                        <x-column>{{$publisher->name}}</x-column>
                        <x-column>
                            <a href="{{route('publisher.edit',$publisher->id)}}">
                                <x-button>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                    </svg>
                                </x-button>
                            </a>
                        </x-column>
                    </tr>
                @endforeach
            </x-table>
            <div class="mt-3">
                {{ $publishers->links() }}
            </div>
        </div>
    </x-section>
</x-app-layout>

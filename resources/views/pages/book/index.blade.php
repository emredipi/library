<x-app-layout>
    <x-slot name="header">Bloklar</x-slot>
    <x-section>
        <x-flash-message/>
        <div class="text-right mb-3">
            <a href="{{route('book.create')}}">
                <x-button>Kitap Ekle</x-button>
            </a>
        </div>
        <x-table :columns="['ID','İsim','Yazar','Yayınevi','Baskı','Blok','İşlem']">
            @foreach($books as $book)
                <tr>
                    <x-column>{{$book->id}}</x-column>
                    <x-column>{{$book->name}}</x-column>
                    <x-column>{{$book->author->name}} {{$book->author->surname}}</x-column>
                    <x-column>{{$book->publisher->name}}</x-column>
                    <x-column>{{$book->edition}}</x-column>
                    <x-column>{{$book->block->code}}</x-column>
                    <x-column>
                        <a href="{{route('book.edit',$book->id)}}">
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
            {{ $books->links() }}
        </div>
    </x-section>
</x-app-layout>

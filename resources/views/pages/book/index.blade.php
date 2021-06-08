<x-app-layout>
    <x-slot name="header">Kitaplar</x-slot>
    <x-section>
        <x-flash-message/>
        <div class="text-right mb-3">
            <a href="{{route('book.create')}}">
                <x-button>Kitap Ekle</x-button>
            </a>
        </div>
        <x-table :columns="['ID','İsim','Yazar','Yayınevi','Blok','Müsait Kopya','İşlem']">
            @foreach($books as $book)
                <tr>
                    <x-column>{{$book->id}}</x-column>
                    <x-column>{{$book->name}}</x-column>
                    <x-column>{{$book->author->name}} {{$book->author->surname}}</x-column>
                    <x-column>{{$book->publisher->name}}</x-column>
                    <x-column>{{$book->block->code}}</x-column>
                    <x-column>{{$book->available_copies_count}}</x-column>
                    <x-column>
                        <a href="{{route('book.edit',$book->id)}}">
                            <x-button>
                                <x-icon.edit/>
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

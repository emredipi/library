<x-app-layout>
    <x-slot name="header">Kitaplar</x-slot>
    <x-section>
        <x-flash-message/>
        <div class="mb-3 flex justify-between">
            <form action="{{route('book.index')}}">
                <x-input name="search" type="text" placeholder="Ara..." value="{{request()->search}}"/>
            </form>
            @if(Auth::user()->admin)
                <a href="{{route('book.create')}}">
                    <x-button>Kitap Ekle</x-button>
                </a>
            @endif
        </div>
        <x-table
            :columns="array_merge(['ID','İsim','Yazar','Yayınevi','Blok','Müsait Kopya'], Auth::user()->admin ? ['İşlem'] : [])">
            @foreach($books as $book)
                <tr>
                    <x-column>{{$book->id}}</x-column>
                    <x-column>{{$book->name}}</x-column>
                    <x-column>{{$book->author->name}} {{$book->author->surname}}</x-column>
                    <x-column>{{$book->publisher->name}}</x-column>
                    <x-column>{{$book->block->code}}</x-column>
                    <x-column>{{$book->available_copies_count}}</x-column>
                    @if(Auth::user()->admin)
                        <x-column>
                            <a href="{{route('book.edit',$book->id)}}">
                                <x-button>
                                    <x-icon.edit/>
                                </x-button>
                            </a>
                        </x-column>
                    @endif
                </tr>
            @endforeach
        </x-table>
        <div class="mt-3">
            {{ $books->links() }}
        </div>
    </x-section>
</x-app-layout>

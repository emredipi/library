<x-app-layout>
    <x-slot name="header">
        <div class="inline-flex items-center gap-1">
            @isset($copy)
                Kopya Kitap Düzenle
            @else
                Yeni Kopya Kitap
            @endisset
        </div>
    </x-slot>
    <x-section>
        <div class="md:w-2/3 lg:w-1/2 mx-auto">
            <x-table>
                <tr>
                    <x-column>Kitap</x-column>
                    <x-column>{{$book->name}}</x-column>
                </tr>
                <tr>
                    <x-column>ISBN</x-column>
                    <x-column>{{$book->isbn}}</x-column>
                </tr>
                <tr>
                    <x-column>Yazar</x-column>
                    <x-column>{{$book->author->name}} {{$book->author->surname}}</x-column>
                </tr>
                <tr>
                    <x-column>Yayınevi</x-column>
                    <x-column>{{$book->publisher->name}}</x-column>
                </tr>
                <tr>
                    <x-column>Block</x-column>
                    <x-column>{{$book->block->code}}</x-column>
                </tr>
                <tr>
                    <x-column>Kategoriler</x-column>
                    <x-column>
                        <div class="flex gap-1">
                            @foreach($book->categories as $category)
                                <span
                                    class="transition-all bg-green-400 rounded p-1 text-sm text-white font-bold">
                                {{$category->name}}
                            </span>
                            @endforeach
                        </div>
                    </x-column>
                </tr>
            </x-table>
        </div>
    </x-section>
    <x-section>
        <div class="md:w-2/3 lg:w-1/2 mx-auto">
            <x-flash-message/>
            @if($errors->any())
                <x-alert type="error" :message="$errors->first()"/>
            @endif
            <x-card>
                <form
                    action="{{isset($copy)
                        ? route('book.book_copy.update',['book' => $book->id,'book_copy'=>$copy->id])
                        : route('book.book_copy.store',$book->id)}}"
                    method="POST">
                    @csrf
                    @method(isset($copy)?'put':'post')
                    <x-input-group
                        name="edition"
                        text="Baskı"
                        type="number"
                        :value="$copy->edition??1"
                    />
                    @empty($copy)
                        <x-input-group
                            name="count"
                            text="Adet"
                            type="number"
                            :value="1"
                        />
                    @endempty
                    <div class="flex justify-between">
                        @isset($copy)
                            <x-delete-button
                                :action-url="route('book.book_copy.destroy',['book' => $book->id,'book_copy'=>$copy->id])"/>
                        @else
                            <span></span>
                        @endisset
                        <x-button>Kaydet</x-button>
                    </div>
                </form>
            </x-card>
        </div>
    </x-section>
</x-app-layout>

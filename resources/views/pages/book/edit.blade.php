<x-app-layout>
    <x-slot name="header">
        @isset($book)
            Kitap Düzenle
        @else
            Yeni Kitap
        @endisset
    </x-slot>
    <x-section>
        <div class="md:w-2/3 lg:w-1/2 mx-auto">
            <x-flash-message/>
            @if($errors->any())
                <x-alert type="error" :message="$errors->first()"/>
            @endif
            <x-card>
                <form action="{{isset($book)? route('book.update',$book->id) : route('book.store')}}" method="POST">
                    @csrf
                    @method(isset($book)?'put':'post')
                    <x-input-group
                        name="name"
                        text="İsim"
                        type="text"
                        :value="$book->name??null"
                    />
                    <x-input-group
                        name="isbn"
                        text="ISBN"
                        type="text"
                        :value="$book->isbn??null"
                    />
                    @if(!isset($book))
                        <x-input-group
                            name="edition"
                            text="Baskı"
                            type="number"
                            :value="1"
                        />
                    @endif
                    <x-select
                        name="author_id"
                        text="Yazar"
                        :options="$authors"
                        :value="$book->author_id??null"
                    />
                    <x-select
                        name="publisher_id"
                        text="Yayınevi"
                        :options="$publishers"
                        :value="$book->publisher_id??null"
                    />
                    <x-select
                        name="block_id"
                        text="Blok"
                        :options="$blocks"
                        :value="$book->block_id??null"
                    />
                    <livewire:multi-select
                        name="categories"
                        :selected-ids="$selectedIds ?? []"
                        :model="\App\Models\Category::class"
                        label="Kategoriler"
                    />
                    @if(!isset($book))
                        <x-input-group
                            name="count"
                            text="Adet"
                            type="number"
                            :value="1"
                        />
                    @endif
                    <div class="flex justify-between">
                        @isset($book)
                            <x-delete-button :action-url="route('book.destroy',$book->id)"/>
                        @else
                            <span></span>
                        @endisset
                        <x-button>Kaydet</x-button>
                    </div>
                </form>
            </x-card>
        </div>
    </x-section>
    @isset($book)
        <x-section>
            <div class="md:w-2/3 lg:w-1/2 mx-auto">
                <div class="flex justify-between mb-3">
                    <span class="text-2xl">Kopya Kitaplar</span>
                    <a href="{{route('book.book_copy.create',$book->id)}}">
                        <x-button>Yeni Kopya</x-button>
                    </a>
                </div>
                <x-table :columns="['ID','Baskı','İşlem']">
                    @foreach($copies as $copy)
                        <tr>
                            <x-column>{{$copy->id}}</x-column>
                            <x-column>{{$copy->edition}}</x-column>
                            <x-column>
                                <x-delete-button
                                    :action-url="route('book.book_copy.destroy',[
                                    'book'=>$book->id,
                                    'book_copy'=>$copy->id,
                                    ])"
                                    :icon="true"
                                />
                                <a href="{{route('book.book_copy.edit',[
                                    'book'=>$book->id,
                                    'book_copy'=>$copy->id,
                                    ])}}">
                                    <x-button>
                                        <x-icon.edit/>
                                    </x-button>
                                </a>
                            </x-column>
                        </tr>
                    @endforeach
                </x-table>
            </div>
        </x-section>
    @endisset
</x-app-layout>

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
                    <x-input-group
                        name="edition"
                        text="Baskı"
                        type="number"
                        :value="$book->edition??null"
                    />
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
                        text="Block"
                        :options="$blocks"
                        :value="$book->block_id??null"
                    />
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
</x-app-layout>

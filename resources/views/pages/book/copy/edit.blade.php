<x-app-layout>
    <x-slot name="header">
        @isset($copy)
            Kopya Kitap Düzenle
        @else
            Yeni Kopya Kitap
        @endisset
    </x-slot>
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

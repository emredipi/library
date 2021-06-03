<x-app-layout>
    <x-slot name="header">
        @isset($author)
            Yazar Düzenle
        @else
            Yeni Yazar
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
                    action="{{isset($author) ? route('author.update',$author->id) : route('author.store')}}"
                    method="POST">
                    @csrf
                    @method(isset($author) ? 'put' : 'post')
                    <x-input-group
                        name="name"
                        text="Ad"
                        type="text"
                        :value="$author->name ?? null"
                    />
                    <x-input-group
                        name="surname"
                        text="Soyad"
                        type="text"
                        :value="$author->surname ?? null"
                    />
                    <div class="flex justify-between">
                        @isset($author)
                            <x-delete-button :action-url="route('author.destroy',$author->id)"/>
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

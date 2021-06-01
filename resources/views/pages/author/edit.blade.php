<x-app-layout>
    <x-slot name="header">Yazar Düzenle</x-slot>
    <x-section>
        <div class="w-1/2 mx-auto">
            <x-flash-message/>
            @if($errors->any())
                <x-alert type="error" :message="$errors->first()"/>
            @endif
            <x-card>
                <form action="{{route('author.update',$author->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <x-input-group
                        name="name"
                        text="Ad"
                        type="text"
                        :value="$author->name"
                    />
                    <x-input-group
                        name="surname"
                        text="Soyad"
                        type="text"
                        :value="$author->surname"
                    />
                    <div class="flex justify-between">
                        <x-delete-button :action-url="route('author.destroy',$author->id)"/>
                        <x-button>Kaydet</x-button>
                    </div>
                </form>
            </x-card>
        </div>
    </x-section>
</x-app-layout>

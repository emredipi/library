<x-app-layout>
    <x-slot name="header">Kategori Düzenle</x-slot>
    <x-section>
        <div class="md:w-2/3 lg:w-1/2 mx-auto">
            <x-flash-message/>
            @if($errors->any())
                <x-alert type="error" :message="$errors->first()"/>
            @endif
            <x-card>
                <form action="{{route('category.update',$category->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <x-input-group
                        name="name"
                        text="Başlık"
                        type="text"
                        :value="$category->name"
                    />
                    <div class="flex justify-between">
                        <x-delete-button :action-url="route('category.destroy',$category->id)"/>
                        <x-button>Kaydet</x-button>
                    </div>
                </form>
            </x-card>
        </div>
    </x-section>
</x-app-layout>

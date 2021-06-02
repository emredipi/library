<x-app-layout>
    <x-slot name="header">Yayınevi Düzenle</x-slot>
    <x-section>
        <div class="md:w-2/3 lg:w-1/2 mx-auto">
            <x-flash-message/>
            @if($errors->any())
                <x-alert type="error" :message="$errors->first()"/>
            @endif
            <x-card>
                <form action="{{route('publisher.update',$publisher->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <x-input-group
                        name="name"
                        text="İsim"
                        type="text"
                        :value="$publisher->name"
                    />
                    <div class="flex justify-between">
                        <x-delete-button :action-url="route('publisher.destroy',$publisher->id)"/>
                        <x-button>Kaydet</x-button>
                    </div>
                </form>
            </x-card>
        </div>
    </x-section>
</x-app-layout>

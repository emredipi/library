<x-app-layout>
    <x-slot name="header">
        @isset($publisher)
            Yayınevi Düzenle
        @else
            Yeni Yayınevi
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
                    action="{{isset($publisher) ? route('publisher.update',$publisher->id) : route('publisher.store')}}"
                    method="POST"
                >
                    @csrf
                    @method(isset($publisher) ? 'put' : 'post')
                    <x-input-group
                        name="name"
                        text="İsim"
                        type="text"
                        :value="$publisher->name ?? null"
                    />
                    <div class="flex justify-between">
                        @isset($publisher)
                            <x-delete-button :action-url="route('publisher.destroy',$publisher->id)"/>
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

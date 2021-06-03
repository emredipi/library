<x-app-layout>
    <x-slot name="header">Blok Ekle</x-slot>
    <x-section>
        <div class="md:w-2/3 lg:w-1/2 mx-auto">
            <x-flash-message/>
            @if($errors->any())
                <x-alert type="error" :message="$errors->first()"/>
            @endif
            <x-card>
                <form action="{{isset($block) ? route('block.update',$block->id) : route('block.store')}}"
                      method="POST">
                    @csrf
                    @method(isset($block) ? 'put' : 'post')
                    <x-input-group
                        name="code"
                        text="Kod"
                        type="text"
                        :value="$block->code ?? null"
                    />
                    <div class="flex justify-between">
                        @isset($block)
                            <x-delete-button :action-url="route('block.destroy',$block->id)"/>
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

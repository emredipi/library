<x-app-layout>
    <x-slot name="header">Block Düzenle</x-slot>
    <x-section>
        <div class="md:w-1/2 mx-auto">
            <x-flash-message/>
            @if($errors->any())
                <x-alert type="error" :message="$errors->first()"/>
            @endif
            <x-card>
                <form action="{{route('block.update',$block->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <x-input-group
                        name="code"
                        text="Kod"
                        type="text"
                        :value="$block->code"
                    />
                    <div class="flex justify-between">
                        <x-delete-button :action-url="route('block.destroy',$block->id)"/>
                        <x-button>Kaydet</x-button>
                    </div>
                </form>
            </x-card>
        </div>
    </x-section>
</x-app-layout>

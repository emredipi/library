<x-app-layout>
    <x-slot name="header">Üye Düzenle</x-slot>
    <x-section>
        <div class="md:w-1/2 mx-auto">
            <x-flash-message/>
            @if($errors->any())
                <x-alert type="error" :message="$errors->first()"/>
            @endif
            <x-card>
                <form
                    action="{{isset($member) ? route('member.update',$member->id) : route('member.store')}}"
                    method="POST"
                >
                    @csrf
                    @method(isset($member) ? 'put' : 'post')
                    <x-input-group
                        name="name"
                        text="İsim"
                        type="text"
                        :value="$member->name??null"
                    />
                    <x-input-group
                        name="surname"
                        text="Soyad"
                        type="text"
                        :value="$member->surname??null"
                    />
                    <x-input-group
                        name="email"
                        text="Email"
                        type="email"
                        :value="$member->email??null"
                    />
                    <x-input-group
                        name="tc"
                        text="TC No"
                        type="text"
                        :value="$member->tc??null"
                    />
                    <x-input-group
                        name="birth_date"
                        text="Doğum Tarihi"
                        type="date"
                        :value="$member->birth_date??null"
                    />
                    @isset($member)
                        <x-select
                            name="is_banned"
                            :value="$member->is_banned"
                            text="Üyeliği dondur"
                            :options="['Hayır','Evet']"
                        />
                    @endisset
                    <div class="flex justify-between">
                        @isset($member)
                            <x-delete-button :action-url="route('member.destroy',$member->id)"/>
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

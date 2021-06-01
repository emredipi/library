<x-app-layout>
    <x-slot name="header">Üye Düzenle</x-slot>
    <x-section>
        <div class="w-1/2 mx-auto">
            <x-flash-message/>
            @if($errors->any())
                <x-alert type="error" :message="$errors->first()"/>
            @endif
            <x-card>
                <form action="{{route('member.update',$member->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <x-input-group
                        name="name"
                        text="İsim"
                        type="text"
                        :value="$member->name"
                    />
                    <x-input-group
                        name="surname"
                        text="Soyad"
                        type="text"
                        :value="$member->surname"
                    />
                    <x-input-group
                        name="email"
                        text="Email"
                        type="email"
                        :value="$member->email"
                    />
                    <x-input-group
                        name="tc"
                        text="TC No"
                        type="text"
                        :value="$member->tc"
                    />
                    <x-input-group
                        name="birth_date"
                        text="Doğum Tarihi"
                        type="date"
                        :value="$member->birth_date"
                    />
                    <x-select
                        name="is_banned"
                        :value="$member->is_banned"
                        text="Üyeliği dondur"
                        :options="['Hayır','Evet']"
                    />
                    <div class="text-right">
                        <x-button>Kaydet</x-button>
                    </div>
                </form>
            </x-card>
        </div>
    </x-section>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">Üyeler</x-slot>
    <x-section>
        <x-flash-message/>
        <div class="text-right mb-3">
            <a href="{{route('member.create')}}">
                <x-button>Üye Ekle</x-button>
            </a>
        </div>
        <x-table :columns="['ID','Ad','Soyad','Email','Doğum Tarihi','İşlem']">
            @foreach($users as $user)
                <tr>
                    <x-column>{{$user->id}}</x-column>
                    <x-column>{{$user->name}}</x-column>
                    <x-column>{{$user->surname}}</x-column>
                    <x-column>{{$user->email}}</x-column>
                    <x-column>{{$user->birth_date}}</x-column>
                    <x-column>
                        <a href="{{route('member.edit',$user->id)}}">
                            <x-button>
                                <x-icon.edit/>
                            </x-button>
                        </a>
                        <a href="{{route('borrow.create',['member'=>$user->id])}}">
                            <x-button>
                                <x-icon.exhange/>
                            </x-button>
                        </a>
                    </x-column>
                </tr>
            @endforeach
        </x-table>
        <div class="mt-3">
            {{ $users->links() }}
        </div>
    </x-section>
</x-app-layout>

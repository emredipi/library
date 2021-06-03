<x-app-layout>
    <x-slot name="header">Üyeler</x-slot>
    <x-section>
        <x-flash-message/>
        <div class="text-right mb-3">
            <a href="{{route('member.create')}}">
                <x-button>Üye Ekle</x-button>
            </a>
        </div>
        <x-table
            :columns="['id','name','surname','email','birth_date','action']"
        >
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
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
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

<x-app-layout>
    <x-slot name="header">Kullanıcı Kitapları</x-slot>
    <x-section>
        <div class="mx-auto">
            <x-flash-message/>
            @if($errors->any())
                <x-alert type="error" :message="$errors->first()"/>
            @endif
            <div class="mb-3 flex justify-between">
                <x-input type="text" placeholder="Ara..."/>
                <a href="{{route('borrow.create',['member'=>$member->id])}}">
                    <x-button>
                        Kitap Ver
                    </x-button>
                </a>
            </div>
            <x-table :columns="['ID','Kitap','Kitap Kopya ID','Alınma Zamanı','Teslim Zamanı','İşlem']">
                @foreach($bookCopies as $copy)
                    <tr>
                        <x-column>{{$copy->pivot->id}}</x-column>
                        <x-column>{{$copy->book->name}}</x-column>
                        <x-column>{{$copy->id}}</x-column>
                        <x-column>{{$copy->pivot->given_date}}</x-column>
                        <x-column>{{\Carbon\Carbon::make($copy->pivot->given_date)->addDay(14)->diffForHumans(['parts' => 2])}}
                        </x-column>
                        <x-column>
                            <a href="{{route('borrow.edit',$copy->pivot->id)}}">
                                <x-button>
                                    <x-icon.exhange/>
                                </x-button>
                            </a>
                        </x-column>
                    </tr>
                @endforeach
            </x-table>
        </div>
    </x-section>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">Kullanıcı Kitapları</x-slot>
    <x-section>
        <div class="mx-auto">
            <x-flash-message/>
            @if($errors->any())
                <x-alert type="error" :message="$errors->first()"/>
            @endif
            <div class="mb-3 text-right">
                @if(Auth::user()->admin)
                    <a href="{{route('borrow.create',['member'=>$member->id])}}">
                        <x-button>
                            Kitap Ver
                        </x-button>
                    </a>
                @endif
            </div>
            <x-table
                :columns="array_merge(['ID','Kitap','Kitap Kopya ID','Alınma Zamanı','Teslim Zamanı'], Auth::user()->admin?['İşlem']:[])">
                @foreach($bookCopies as $copy)
                    <tr>
                        <x-column>{{$copy->pivot->id}}</x-column>
                        <x-column>{{$copy->book->name}}</x-column>
                        <x-column>{{$copy->id}}</x-column>
                        <x-column>{{$copy->pivot->given_date}}</x-column>
                        <x-column>{{\Carbon\Carbon::make($copy->pivot->given_date)->addDay(14)->diffForHumans(['parts' => 2])}}
                        </x-column>
                        @if(Auth::user()->admin)
                            <x-column>
                                <a href="{{route('borrow.edit',$copy->pivot->id)}}">
                                    <x-button>
                                        <x-icon.exhange/>
                                    </x-button>
                                </a>
                            </x-column>
                        @endif
                    </tr>
                @endforeach
            </x-table>
        </div>
    </x-section>
</x-app-layout>

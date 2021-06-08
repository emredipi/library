<x-app-layout>
    <x-slot name="header">
        @isset($borrow)
            Emanet Düzenle
        @else
            Emanet Ver
        @endisset
    </x-slot>
    @isset($borrow)
        <x-section>
            <div class="md:w-2/3 lg:w-1/2 mx-auto">
                <x-table :columns="[]">
                    <tr>
                        <x-column>Kitap</x-column>
                        <x-column>{{$book->name}}</x-column>
                    </tr>
                    <tr>
                        <x-column>Üye</x-column>
                        <x-column>{{$member->name}} {{$member->surname}}</x-column>
                    </tr>
                    <tr>
                        <x-column>Veriliş Zamanı</x-column>
                        <x-column>{{$borrow->given_date}}</x-column>
                    </tr>
                    <tr>
                        <x-column>Alınma Zamanı</x-column>
                        <x-column>
                            {{\Carbon\Carbon::make($borrow->given_date)->addDay(14)->diffForHumans(['parts' => 2])}}
                        </x-column>
                    </tr>
                </x-table>
            </div>
        </x-section>
    @endisset
    <x-section>
        <div class="md:w-2/3 lg:w-1/2 mx-auto">
            <x-flash-message/>
            @if($errors->any())
                <x-alert type="error" :message="$errors->first()"/>
            @endif
            <x-card>
                <form
                    action="{{isset($borrow)
                        ? route('borrow.update',$borrow->id)
                        : route('borrow.store')}}"
                    method="POST">
                    @csrf
                    @method(isset($borrow)?'put':'post')
                    @empty($borrow)
                        <x-input-group
                            name="member"
                            text="Üye ID"
                            type="number"
                            :value="$member->id ?? request()->get('member') ?? null"
                        />
                        <x-input-group
                            name="book_copy"
                            text="Kopya Kitap ID"
                            type="number"
                            :value="$borrow->book_copy_id ?? request()->get('book_copy') ?? null"
                        />
                    @else
                        <x-input-group
                            name="return_date"
                            text="Teslim Alma Zamanı"
                            type="datetime-local"
                            :value="Str::of($borrow->return_date)->replace(' ','T')"
                        />
                    @endempty
                    <div class="flex justify-between">
                        @isset($borrow)
                            <x-delete-button
                                :action-url="route('borrow.destroy',$borrow)"/>
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

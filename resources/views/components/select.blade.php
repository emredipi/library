@props(['name','text','options','value'])
<div class="mb-4">
    <x-label :for="$name" :value="$text"/>
    <select
        id="{{$name}}"
        name="{{$name}}"
        class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
    >
        @foreach($options as $key => $option)
            <option value="{{$key}}" @if(old($name,$value) == $key) selected @endif>
                {{$option}}
            </option>
        @endforeach
    </select>
</div>


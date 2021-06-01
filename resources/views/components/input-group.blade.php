@props(['name','text','type','value'])
<div class="mb-4">
    <x-label :for="$name" :value="$text"/>
    <x-input
        :id="$name"
        class="block mt-1 w-full"
        :type="$type"
        :name="$name"
        :value="old($name,$value)"
    />
</div>

@props(['repository'])

<div>
    @if($repository['title']!=null)
        <label class="block text-sm font-bold mb-2 dark:text-light" for="data{{ $repository['model'] }}">{{ $repository['title'] }}</label>
    @endif
    <select
        id="data{{ $repository['model'] }}"
        wire:model="data.{{ $repository['model'] }}"
        name="{{ $repository['model'] }}"
        class="bg-gray-200 appearance-none border-1 border border-gray-100 rounded w-full px-4 text-gray-700 leading-tight focus:outline-none dark:border-primary-light focus:bg-gray-100 dark:bg-dark dark:text-light focus:dark:border-white">
        <option></option>
        @for($i=0;$i<count($repository['options']) ;$i++)
            <option value="{{$repository['options'][$i]['value']}}"
                    style="padding: 0 25px">
                {{$repository['options'][$i]['title']}} . {{$repository['options'][$i]['value']}}
            </option>
        @endfor
        @error( $repository['model'] ) <span class="error">{{ $message }}</span> @enderror
    </select>
</div>

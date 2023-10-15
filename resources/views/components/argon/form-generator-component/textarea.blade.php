@props(['repository'])
<div class="mt-3">
    @isset($repository['title'])
        <label class="block text-sm font-bold dark:text-light" for="data{{ $repository['model'] }}">
            {{ $repository['title'] }}
        </label>
    @endisset
    <textarea id="data{{ $repository['model'] }}" @isset($repository['placeholder']) placeholder="{{ $repository['placeholder'] }}" @endisset
    @isset($repository['required']) required @endisset
              wire:model="{{'data.'.$repository['model']}}"
              rows="5"
              @isset($repository['disabled']) disabled @endisset
              name="{{ $repository['model'] }}"
              class="bg-gray-200 appearance-none border-1 border border-gray-100 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none dark:border-primary-light focus:bg-gray-100 dark:bg-dark dark:text-light focus:dark:border-white">
    </textarea>
    @error('data.'.$repository['model']) <span class="text-danger">{{ $message }}</span> @enderror
</div>

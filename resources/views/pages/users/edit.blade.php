<x-argon-layout>
    <x-slot name="title">
        Tambah User
    </x-slot>
    <x-slot name="breadcrumbs">
        User => #;
        Tambah User => #;
    </x-slot>
    <div>


        <livewire:form.user action="update" :data-id="$id"/>

    </div>
</x-argon-layout>

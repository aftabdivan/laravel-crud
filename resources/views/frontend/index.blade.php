<x-app-web-layout>

    <x-slot name="title">
        Blog App
    </x-slot>

    <div class="py-5">
        <div class="container">
            @php
                $successMessage = "Welcome To Home Page"
            @endphp
            <x-alert-message :message="$successMessage"/>
        </div>
    </div>
</x-app-web-layout>

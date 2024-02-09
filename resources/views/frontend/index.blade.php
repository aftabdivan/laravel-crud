<x-app-web-layout>

    <x-slot name="title">
        Laravel App
    </x-slot>

    <div class="py-5">
        <div class="container">
            @php
                $successMessage = "Saved Successfully"
            @endphp
            <x-alert-message :message="$successMessage"/>
            <h4> Welcome To Index Page</h4>
        </div>
    </div>
</x-app-web-layout>

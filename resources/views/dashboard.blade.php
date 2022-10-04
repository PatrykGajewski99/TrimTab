<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session()->has('message'))
                <div class="alert alert-info" style="color:green">
                    {{ session('message') }}
                </div>
            @else
                <div class="alert alert-info" style="color:red">
                    {{ session('message_error') }}
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="mt-4">
                    <strong>E-mail</strong>
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="Auth::user()->email " disabled></x-text-input>
                </div>
                <div class="mt-4">
                    <strong>User Name</strong>
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="Auth::user()->name " disabled></x-text-input>
                </div>
                <div class="mt-4">
                    <strong>Phone Number</strong>
                    <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value=" Auth::user()->phone " disabled></x-text-input>
                </div>
                <div class="mt-4">
                   <strong>Address</strong>
                    <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="Auth::user()->address " disabled></x-text-input>
                </div>
                <div class="mt-4">
                    <form method="POST" action="{{ route('file.upload') }}" enctype="multipart/form-data" name="file">
                        @csrf
                        @method('PATCH')
                        <div>
                            <input type="file" id="file" name="file" accept=".xml" class="btn btn-primary"></input>
                        </div>
                        <div>
                            <br><br>
                            <button style="background: #1c7430;padding:10px 25px;border-radius: 25px">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

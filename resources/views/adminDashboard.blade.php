<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session()->has('message'))
                <div class="alert alert-info" style="color:green">
                    {{ session('message') }}
                </div>
            @endif
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col" style="padding-right: 50px">ID</th>
                        <th scope="col" style="padding-right: 150px" >Name</th>
                        <th scope="col" style="padding-right: 150px">Address</th>
                        <th scope="col" style="padding-right: 150px">E-mail</th>
                        <th scope="col" style="padding-right: 100px">Phone number</th>
                        <th scope="col" style="padding-right: 50px">Permission</th>
                        <th scope="col" style="padding-right: 100px">Created At</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id}}</td>
                        <td>{{ $user->name}}</td>
                        <td>{{ $user->address}}</td>
                        <td>{{ $user->email}}</td>
                        <td>{{ $user->phone}}</td>
                        <td>{{ $user->permission}}</td>
                        <td>{{ $user->created_at}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</x-app-layout>

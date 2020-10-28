<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <div class="text-right">
                    <a href="/create-message" class="btn btn-primary mb-3">Create Message</a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Start date</th>
                            <th scope="col">Expiration date</th>
                            <th scope="col">Subject</th>
                            <th class="text-center" scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($messages as $message)
                        <tr>
                            <td>{{ date_format(date_create($message->start_date),"d/m/Y") }}</td>
                            <td>{{ date_format(date_create($message->expiration_date),"d/m/Y") }}</td>
                            <td>{{ $message->subject  }}</td>
                            <td class="text-center">
                                <a href="#" class="btn btn-primary">View</a>
                                <a href="/edit-message/{{ $message->id }}" class="btn btn-success">Edit</a>
                                <a href="#" class="btn btn-danger">Cancel</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
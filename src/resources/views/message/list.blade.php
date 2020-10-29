<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="text-right">
                    <a href="{{ route('message.create') }}" class="btn btn-primary mb-3">Create Message</a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Start date</th>
                            <th scope="col">Expiration date</th>
                            <th scope="col">Subject</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($messages as $message)
                        <tr>
                            <td>{{ date_format(date_create($message->start_date),"d/m/Y") }}</td>
                            <td>{{ date_format(date_create($message->expiration_date),"d/m/Y") }}</td>
                            <td>{{ $message->subject  }}</td>
                            <td>
                                <form action="{{ route('message.destroy', $message->id) }}" method="POST" class="text-center">
                                <a href="{{ route('message.show', $message->id) }}" class="btn btn-primary mr-2">View</a>
                                <a href="{{ route('message.edit', $message->id) }}" class="btn btn-success mr-2">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Cancel</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
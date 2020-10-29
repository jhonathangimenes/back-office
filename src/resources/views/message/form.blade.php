<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                @if ($typeForm == 'edit')
                    <form action="{{ route('message.update', $message->id) }}" method="POST">
                    @method('PUT')
                @elseif($typeForm == 'create')
                    <form action="{{ route('message.store') }}" method="POST">
                    @method('POST')
                @endif
                    @csrf
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject"
                               value="{{ $typeForm == 'edit' || $typeForm == 'show' ? $message->subject : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" id="content" name="content">{{ $typeForm == 'edit' || $typeForm == 'show' ? $message->content : '' }}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="startDate">Start date</label>
                                <input type="date" class="form-control" id="startDate" name="startDate"
                                       value="{{ $typeForm == 'edit' || $typeForm == 'show' ? $message->start_date : '' }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="expirationDate">Expiration date</label>
                                <input type="date" class="form-control" id="expirationDate" name="expirationDate"
                                       value="{{ $typeForm == 'edit' || $typeForm == 'show' ? $message->expiration_date : '' }}">
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <a href="{{ route('message.index') }}" class="btn btn-danger">Back</a>
                        @if($typeForm == 'edit' || $typeForm == 'create')
                            <button type="submit" class="btn btn-success">Save</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
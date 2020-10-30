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
                        <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject"
                               value="{{ $typeForm == 'edit' || $typeForm == 'show' ? (old('subject') ? old('subject') : $message->subject) : ($typeForm == 'create' ? old('subject') : '') }}">
                        @if($errors->first('subject'))
                            <p style="color:red">{{ $errors->first('subject') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content">{{ $typeForm == 'edit' || $typeForm == 'show' ? (old('content') ? old('content') : $message->content) : ($typeForm == 'create' ? old('content') : '') }}</textarea>
                        @if($errors->first('content'))
                            <p style="color:red">{{ $errors->first('content') }}</p>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="startDate">Start date</label>
                                <input type="date" class="form-control @error('startDate') is-invalid @enderror" id="startDate" name="startDate"
                                       value="{{ $typeForm == 'edit' || $typeForm == 'show' ? (old('startDate') ? old('startDate') : $message->start_date) : ($typeForm == 'create' ? old('startDate') : '') }}">
                                @if($errors->first('startDate'))
                                    <p style="color:red">{{ $errors->first('startDate') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="expirationDate">Expiration date</label>
                                <input type="date" class="form-control @error('expirationDate') is-invalid @enderror" id="expirationDate" name="expirationDate"
                                       value="{{ $typeForm == 'edit' || $typeForm == 'show' ? (old('expirationDate') ? old('expirationDate') : $message->expiration_date) : ($typeForm == 'create' ? old('expirationDate') : '') }}">
                                @if($errors->first('expirationDate'))
                                    <p style="color:red">{{ $errors->first('expirationDate') }}</p>
                                @endif
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
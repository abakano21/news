@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <form action="{{ route('news.store') }}" method="POST">
            @method('POST')
            @csrf()
            <h1 class="h3 mb-3 fw-normal">Add News</h1>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input name="title" value="{{ old('title')}}" type="text" class="form-control" id="title" placeholder="title" required>
                @error('title') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" class="form-control" id="content" rows="3" required>{{ old('content')}}</textarea>
                @error('content') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Save</button>
        </form>
    </div>
</div>
@endsection
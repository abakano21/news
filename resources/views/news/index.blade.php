@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="">
            <div class="card">
                <!-- Header -->
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>{{ __('News') }}</span>
                        <a href="{{ route('news.create') }}" class="btn btn-primary">
                            <svg width="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            <span>Add</span>
                        </a>
                    </div>
                </div>

                <!-- Table -->
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col" width="40%">Content</th>
                                <th scope="col">User</th>
                                <th scope="col" width="8%">Updated At</th>
                                <th scope="col" width="8%">Created At</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->content }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->updated_at->format('d-M, Y') }}</td>
                                <td>{{ $item->created_at->format('d-M, Y') }}</td>
                                <td>
                                    <div class="d-flex justify-content-between align-items-center gap-2">
                                        <a href="{{ route('news.edit', $item) }}" class="btn btn-secondary btn-sm">Edit</a>
                                        <a href="{{ route('news.show', $item) }}" class="btn btn-secondary btn-sm">View</a>                                        

                                        <form onsubmit="return confirm('Are you sure?')" action="{{ route('news.destroy', $item) }}" method="POST" class="">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-secondary btn-sm">Delete</button>                                            
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.admin')

@section('title', 'Post Management')

@section('nav')
	<nav class="w-full bg-gray-900 text-white p-4 shadow mb-6">
		<div class="flex justify-between items-center">
			<div class="text-xl font-bold">Post Management</div>
			<div class="flex flex-row gap-2">
				<a href="{{ route('admin.dashboard') }}" class="bg-teal-600 hover:bg-teal-700 text-white font-semibold py-1 px-4 rounded">Dashboard</a>
				<form method="POST" action="{{ route('admin.logout') }}">
					@csrf
					<button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-1 px-4 rounded">
						Logout
					</button>
				</form>
			</div>
		</div>
	</nav>
@endsection

@section('content')
	<form method="POST" action="{{ route('admin.post.updateB', ['post' => $post]) }}" class="max-w-xl mx-auto p-6 bg-white rounded shadow" enctype="multipart/form-data">
		@csrf

		<!-- Title -->
		<div class="mb-4">
			<label for="title" class="block text-sm font-medium text-gray-700">Title</label>
			<input type="text" name="title" id="title" value="{{ old('title') ?? $post->title }}"
				class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
			@error('title')
				<p class="text-sm text-red-600 mt-1">{{ $message }}</p>
			@enderror
		</div>

		<!-- Content -->
		<div class="mb-4">
			<label for="content" class="block text-sm font-medium text-gray-700">Content</label>
			<textarea name="content" id="content" rows="12"
			 class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('content') ?? $post->content }}</textarea>
			@error('content')
				<p class="text-sm text-red-600 mt-1">{{ $message }}</p>
			@enderror
		</div>
        <!-- Featured Image -->
        <div class="mb-4">
            <label for="featured_image" class="block text-sm font-medium text-gray-700">Featured Image</label>

            @if($post->featured_image)
                <img src="{{ Storage::url($post->featured_image) }}" alt="Current Image"
                    class="mt-2 mb-2 w-48 h-32 object-cover rounded">
                <p class="text-xs text-gray-500 mb-2">Upload a new image to replace the current one.</p>
            @endif

            <input type="file" name="featured_image" id="featured_image" accept="image/*"
                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
            @error('featured_image')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>
		
		<!-- Is Published -->
		<div class="mb-4 flex items-center">
			<input type="checkbox" name="is_published" id="is_published" value="1" class="h-4 w-4 text-indigo-600 border-gray-300 rounded"
				{{ old('is_published', $post->is_published) ? 'checked' : '' }}>
			<label for="is_published" class="ml-2 block text-sm text-gray-700">Published</label>
		</div>

		<!-- Submit -->
		<div class="mt-6">
			<button type="submit"
				class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
				Update Post
			</button>
		</div>
	</form>
@endsection

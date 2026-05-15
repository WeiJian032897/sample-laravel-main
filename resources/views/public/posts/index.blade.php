@use('Illuminate\Support\Facades\Storage')
@extends('layouts.admin')

@section('title', 'Dashboard')

@section('style')
	<style>
		.line-clamp-3 {
			display: -webkit-box;
			-webkit-line-clamp: 3;
			-webkit-box-orient: vertical;
			overflow: hidden;
		}
	</style>
@endsection

@section('nav')
	<nav class="w-full bg-sky-900 text-white p-4 shadow mb-6">
		<div class="flex justify-between items-center">
			<div class="text-xl font-bold">Posts Listing</div>
			<a href="{{ route('admin.login') }}" class="bg-teal-600 hover:bg-teal-700 text-white font-semibold py-1 px-4 rounded">Admin Login</a>
		</div>
	</nav>
@endsection

@section('content')

	<div class="grid grid-cols-2 md:grid-cols-3 gap-4 mx-4">

		@foreach ($posts as $post)
			<a href="{{ route('post.showF', ['post' => $post]) }}"
				class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow-sm md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
				
				@if($post->featured_image)
                    <img src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->title }}"
                        class="object-cover w-full rounded-t-lg h-48 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg">
                @else
                    <div class="w-full h-48 md:h-auto md:w-48 bg-gray-200 dark:bg-gray-700 rounded-t-lg md:rounded-none md:rounded-s-lg flex items-center justify-center">
                        <span class="text-gray-400 text-xs">No Image</span>
                    </div>
                @endif

				<div class="flex flex-col justify-between p-4 leading-normal">
					<h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}</h5>
					<p class="text-sm text-gray-500 dark:text-gray-400">Last Updated: <span
							class="text-sm text-gray-500 dark:text-gray-400">{{ $post->updated_at }}</span></p>
					<p class="line-clamp-3 text-gray-700 dark:text-gray-400">
						{{ $post->content }}
					</p>
				</div>
			</a>
		@endforeach
	</div>
	<div class="px-4 py-6 justify-center">
		{{ $posts->links('pagination::tailwind') }}
	</div>
@endsection

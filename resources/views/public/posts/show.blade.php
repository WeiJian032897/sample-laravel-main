@extends('layouts.admin')

@section('title', "{{ $post->title }}")

@section('style')
	<style>

	</style>
@endsection

@section('nav')
	<nav class="w-full bg-sky-900 text-white p-4 shadow mb-6">
		<div class="flex justify-between items-center">
			<div></div>
			<a href="{{ route('admin.login') }}" class="bg-teal-600 hover:bg-teal-700 text-white font-semibold py-1 px-4 rounded">Admin Login</a>
		</div>
	</nav>
@endsection

@section('content')

	<div class="bg-white py-24 sm:py-32 dark:bg-gray-900">
		<div class="mx-auto max-w-7xl px-6 lg:px-8">
			<div class="mx-auto max-w-2xl lg:mx-0">
				<h2 class="text-4xl font-semibold tracking-tight text-pretty text-gray-900 dark:text-white sm:text-5xl">{{ $post->title }}</h2>
				<div class="flex items-center gap-x-4 text-xs mt-2">
					<span class="text-gray-500 dark:text-gray-400 text-sm">{{ $post->updated_at->format('M d, Y H:i') }}</span>
					<a href="#" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100 dark:text-gray-300 dark:bg-gray-800/60 dark:hover:bg-gray-800">Tags</a>
				</div>
			</div>
			<div class="relative mt-4 flex items-center gap-x-4 justify-self-end">
				<img
					src="https://rewards.bing.com/MockImages/TwoPawns.png"
					alt="" class="size-10 rounded-full bg-gray-50" />
				<div class="text-sm/6">
					<p class="font-semibold text-gray-900 dark:text-white">
						<a href="#">
							<span class="absolute inset-0"></span>
							{{ $post->author->name }}
						</a>
					</p>
					<p class="text-gray-600 dark:text-gray-400">{{ $post->author->email }}</p>
				</div>
			</div>
			<div class="mx-auto my-6 max-w-2xl border-t border-gray-200 pt-6 sm:my-8 sm:pt-8 lg:mx-0 lg:max-w-none">
				<article class="text-black dark:text-white">
					<div class="prose dark:prose-invert">
						{!! nl2br(e($post->content)) !!}
					</div>
				</article>
			</div>
			<a href="{{ route('post.indexF') }}" class="bg-teal-600 hover:bg-teal-700 text-white font-semibold py-2 px-4 rounded">Back</a>
		</div>
	</div>

@endsection

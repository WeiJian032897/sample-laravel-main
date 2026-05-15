@extends('layouts.auth')

@section('title', 'Login')

@section('content')
	<div>
		<a href="#"
			class="flex justify-center items-center mb-6 pointer-events-none cursor-not-allowed text-2xl font-semibold text-gray-900 dark:text-white">
			Demo App
		</a>
		<div class="w-full max-w-lg bg-white rounded-lg shadow dark:border md:mt-0 xl:p-0 dark:bg-gray-800 dark:border-gray-700">
			<div class="p-6 space-y-4 md:space-y-6 sm:p-8 w-full max-w-lg">
				<h1 class="text-xl font-bold leading-tight tracking-tight text-lime-950 md:text-2xl dark:text-white xl:px-8">
					Sign in to your account
				</h1>
				<form class="space-y-4 md:space-y-6" method="POST" action="{{ route('admin.login.submit') }}">
					@csrf
					<div>
						<label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
						<input type="email" name="email" id="email"
							class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-zinc-600 focus:border-zinc-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
							placeholder="name@company.com" required="">
					</div>
					<div>
						<label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
						<input type="password" name="password" id="password" placeholder="••••••••"
							class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-zinc-600 focus:border-zinc-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
							required="">
					</div>
					<div class="flex items-center justify-between">
						<div class="flex items-start">
							<div class="flex items-center h-5">
								<input id="remember" aria-describedby="remember" type="checkbox"
									class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-zinc-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-zinc-600 dark:ring-offset-gray-800">
							</div>
							<div class="ml-3 text-sm">
								<label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
							</div>
						</div>
					</div>
					<button type="submit"
						class="w-full text-lime-950 bg-lime-200 hover:bg-lime-300 dark:focus:ring-zinc-800 focus:ring-4 focus:outline-none focus:ring-zinc-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Sign
						in</button>
					<p class="text-sm font-light text-gray-500 dark:text-gray-400">
						Don’t have an account yet? <a href="#"
							class="pointer-events-none cursor-not-allowed font-medium text-zinc-600 hover:underline dark:text-zinc-500">Sign up</a>
					</p>
				</form>
			</div>
		</div>
		<div class="space-y-4 md:space-y-6 mt-3">
			<a href="{{ route('post.indexF') }}" class="block w-full px-4 py-2 text-center bg-zinc-600 hover:bg-zinc-700 text-white font-semibold rounded">
				Back
			</a>
		</div>

	</div>

@endsection

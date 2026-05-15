<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>@yield('title', config('app.name') . ' | Auth')</title>

	{{-- Styles --}}
	<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>

<body>

	{{-- Auth Container --}}
	<section class="bg-gray-50 dark:bg-gray-900 min-h-screen flex flex-col">
		{{-- Navbar goes here --}}
		@yield('nav')
		<div class="flex-1 overflow-y-auto">
			@yield('content')
		</div>
	</section>

	{{-- Extra Scripts --}}
	@stack('scripts')
</body>

</html>

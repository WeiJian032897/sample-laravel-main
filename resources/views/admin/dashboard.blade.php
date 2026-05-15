@extends('layouts.admin')

@section('title', 'Dashboard')

@section('nav')
	<nav class="w-full dark:bg-gray-900 dark:text-white p-4 shadow mb-6">
		<div class="flex justify-between items-center">
			<div class="text-xl font-bold">Admin Dashboard</div>
			<div class="flex flex-row gap-2">
				<a href="{{ route('admin.post.indexB') }}" class="bg-teal-600 hover:bg-teal-700 text-white font-semibold py-1 px-4 rounded">Post Management</a>
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
	<div class="flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
		<div class="p-6">

			<!-- Stats cards -->
			<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
				<div class="bg-white rounded-lg shadow p-6 text-center">
					<h2 class="text-lg font-semibold text-gray-700 mb-2">Total Users</h2>
					<p class="text-2xl font-bold text-indigo-600">124</p>
				</div>
				<div class="bg-white rounded-lg shadow p-6 text-center">
					<h2 class="text-lg font-semibold text-gray-700 mb-2">New Posts</h2>
					<p class="text-2xl font-bold text-indigo-600">37</p>
				</div>
			</div>

			<!-- Recent activity table -->
			<div class="bg-white rounded-lg shadow p-6">
				<h2 class="text-xl font-semibold text-gray-700 mb-4">Recent Activities - Logs</h2>
				<table class="min-w-full divide-y divide-gray-200">
					<thead class="bg-gray-50">
						<tr>
							<th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">User</th>
							<th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Action</th>
							<th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
						</tr>
					</thead>
					<tbody class="divide-y divide-gray-100">
						<tr>
							<td class="px-4 py-2 text-sm text-gray-700">John Doe</td>
							<td class="px-4 py-2 text-sm text-gray-700">Created a new post</td>
							<td class="px-4 py-2 text-sm text-gray-700">2025-10-28</td>
						</tr>
						<tr>
							<td class="px-4 py-2 text-sm text-gray-700">Jane Smith</td>
							<td class="px-4 py-2 text-sm text-gray-700">Updated profile</td>
							<td class="px-4 py-2 text-sm text-gray-700">2025-10-27</td>
						</tr>
						<tr>
							<td class="px-4 py-2 text-sm text-gray-700">Mark Johnson</td>
							<td class="px-4 py-2 text-sm text-gray-700">Deleted a comment</td>
							<td class="px-4 py-2 text-sm text-gray-700">2025-10-26</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection

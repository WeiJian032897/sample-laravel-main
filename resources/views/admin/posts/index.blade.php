@extends('layouts.admin')

@section('title', 'Post Management')

@section('nav')
    <nav class="w-full dark:bg-gray-900 dark:text-white p-4 shadow mb-1">
        <div class="flex justify-between items-center">
            <div class="text-xl font-bold">Post Management</div>
            <div class="flex flex-row gap-2">
                <a href="{{ route('admin.dashboard') }}" class="bg-sky-600 hover:bg-sky-700 text-white font-semibold py-1 px-4 rounded">Dashboard</a>
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
    <div class="overflow-x-auto p-4 bg-white dark:bg-black">
        <div class="flex flex-row-reverse pb-4">
            <a href="{{ route('admin.post.createB') }}"
                class="px-4 py-2 bg-orange-400 dark:bg-orange-500 text-gray-900 dark:text-white rounded flex items-center justify-center hover:bg-slate-400 transition">
                New Post
            </a>
        </div>

        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 bg-white dark:bg-slate-800 shadow rounded-lg">
            <thead class="bg-gray-50 dark:bg-slate-700">
                <tr>
                    <th class="w-1/4 px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">Content</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">Created At</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
                @foreach ($posts as $post)
                    <tr>
                        <td class="w-1/4 px-6 py-4 text-balance text-sm text-gray-900 dark:text-gray-100">{{ $post->title }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-200">{{ Str::limit($post->content, 50) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $post->created_at->format('Y-m-d H:i') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <div class="flex flex-row gap-1 justify-center">
                                {{-- Edit Button --}}
                                <a href="{{ route('admin.post.editB', $post->id) }}"
                                    class="w-8 h-8 bg-yellow-400 dark:bg-yellow-500 text-gray-900 dark:text-white rounded flex items-center justify-center hover:bg-slate-400 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 20h9"></path>
                                        <path d="M16.376 3.622a1 1 0 0 1 3.002 3.002L7.368 18.635a2 2 0 0 1-.855.506l-2.872.838a.5.5 0 0 1-.62-.62l.838-2.872a2 2 0 0 1 .506-.854z"></path>
                                        <path d="m15 5 3 3"></path>
                                    </svg>
                                </a>

                                {{-- Toggle Publish Button --}}
                                <form method="POST" action="{{ route('admin.post.togglePublish', $post) }}" class="inline-block">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                        class="w-8 h-8 {{ $post->is_published ? 'bg-emerald-400 dark:bg-emerald-500' : 'bg-gray-400 dark:bg-gray-500' }} text-gray-900 dark:text-white rounded flex items-center justify-center hover:bg-slate-400 transition"
                                        title="{{ $post->is_published ? 'Published' : 'Unpublished' }}">
                                        @if($post->is_published)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M20 6 9 17l-5-5"/>
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M18 6 6 18"/><path d="m6 6 12 12"/>
                                            </svg>
                                        @endif
                                    </button>
                                </form>

                                {{-- Delete Button --}}
                                <form method="POST" action="{{ route('admin.post.destroyB', ['post' => $post]) }}" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="w-8 h-8 bg-red-400 dark:bg-red-500 text-gray-900 dark:text-white rounded flex items-center justify-center hover:bg-slate-400 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M10 5a2 2 0 0 0-1.344.519l-6.328 5.74a1 1 0 0 0 0 1.481l6.328 5.741A2 2 0 0 0 10 19h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2z"></path>
                                            <path d="m12 9 6 6"></path>
                                            <path d="m18 9-6 6"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="px-4 py-4 bg-white dark:bg-slate-800 rounded-b-lg">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
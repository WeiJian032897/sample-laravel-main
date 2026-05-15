<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /* ============================================================
     |  FRONTEND SECTION
     ============================================================ */

    // Frontend: list posts
    public function indexF()
    {
        $posts = Post::where('is_published', true)
            ->latest()
            ->paginate(6);

        return view('public.posts.index', compact('posts'));
    }

    // Frontend: show single post
    public function showF(Post $post)
    {
        abort_unless($post->is_published, 404);

        $post->load('author');

        return view('public.posts.show', compact('post'));
    }

    // Frontend: create form (if needed)
    public function createF()
    {
    }

    // Frontend: store new post (for users, if allowed)
    public function storeF(Request $request)
    {
    }

    // Frontend: edit post
    public function editF(Post $post)
    {
    }

    // Frontend: update post
    public function updateF(Request $request, Post $post)
    {
    }

    // Frontend: delete post
    public function destroyF(Post $post)
    {
    }

    /* ============================================================
     |  BACKEND SECTION (Admin)
     ============================================================ */

    public function indexB()
    {
        $posts = Post::latest()->paginate(8);

        return view('admin.posts.index', compact('posts'));
    }

    public function createB()
    {
        return view('admin.posts.create');
    }

    public function storeB(Request $request)
    {
        $validated = $request->validate([
            'title'           => 'required|string|max:255',
            'content'         => 'required|string',
            'is_published'    => 'nullable|boolean',
            'featured_image'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $validated['admin_id'] = auth()->guard('admin')->id();
        $validated['is_published'] = $request->boolean('is_published');

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request
                ->file('featured_image')
                ->store('featured_images', 'public');
        }

        Post::create($validated);

        return redirect()
            ->route('admin.post.indexB')
            ->with('success', 'Post created successfully!');
    }

    public function editB(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function updateB(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title'           => 'required|string|max:255',
            'content'         => 'required|string',
            'featured_image'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $validated['is_published'] = $request->boolean('is_published');

        if ($request->hasFile('featured_image')) {

            // delete old image if exists
            if ($post->featured_image) {
                Storage::disk('public')->delete($post->featured_image);
            }

            $validated['featured_image'] = $request
                ->file('featured_image')
                ->store('featured_images', 'public');
        }

        $post->update($validated);

        return redirect()
            ->route('admin.post.indexB')
            ->with('success', 'Post updated!');
    }

    public function destroyB(Post $post)
    {
        $post->delete();

        return redirect()
            ->route('admin.post.indexB')
            ->with('success', 'Post deleted!');
    }

    public function togglePublish(Post $post)
    {
        $post->update([
            'is_published' => !$post->is_published,
        ]);

        return back()->with('success', 'Post status updated.');
    }

    /* ============================================================
     |  API SECTION
     ============================================================ */

    public function indexA()
    {
        return response()->json(
            Post::where('is_published', true)
                ->latest()
                ->paginate(10)
        );
    }

    public function showA(Post $post)
    {
        if (!$post->is_published) {
            return response()->json([
                'message' => 'Not found'
            ], 404);
        }

        return response()->json($post);
    }

    public function storeA(Request $request)
    {
    }

    public function updateA(Request $request, Post $post)
    {
    }

    public function destroyA(Post $post)
    {
    }
}
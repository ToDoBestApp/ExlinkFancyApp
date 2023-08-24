<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Services\PostService;

final class PostController extends Controller
{
    public function __construct(private PostService $postService)
    {
    }

    public function index(): \Illuminate\View\View
    {
        return view('user_list', ['posts' => $this->postService->getAll()]);
    }

    public function store(StorePostRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->postService->store($request->except(['name', 'surname']) + ['user_id' => auth()->user()->id]);
        return back();
    }

    public function edit(Post $post): \Illuminate\View\View
    {
        $nameExploded = explode(' ', $post->name_surname);
        $post->name = $nameExploded[0];
        $post->surname = $nameExploded[1];
        return view('user_detail', ['post' => $post]);
    }

    public function update(UpdatePostRequest $request, Post $post): \Illuminate\Http\RedirectResponse
    {
        $this->postService->update($post->id, $request->except(['name', 'surname', '_token', '_method']));
        return redirect()->route('posts.index')->with(['edited_ok' => __('The post was updated successfully')]);
    }

    public function destroy(Post $post): \Illuminate\Http\RedirectResponse
    {
        $this->postService->destroy($post->id);
        return back();
    }
}

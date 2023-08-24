<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;

final class PostRepository implements PostRepositoryInterface
{
    private $pagination_items = 10;

    public function getAll(): \Illuminate\Pagination\LengthAwarePaginator
    {
        return Post::select(['id','user_id', 'email', 'name_surname', 'address', 'phone_number', 'date', 'updated_at'])->latest()->paginate($this->pagination_items);
    }

    public function destroy($postId): void
    {
        Post::where('id', $postId)->forceDelete();
    }

    public function create($newPost): void
    {
        Post::create($newPost);
    }

    public function update($postId, $editedPost): void
    {
        Post::where('id', $postId)->update($editedPost);
    }
}

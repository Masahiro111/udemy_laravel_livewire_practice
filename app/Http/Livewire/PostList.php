<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;

    public $word;
    // public $updatedPost = false;

    protected $queryString = [
        'word' => ['except' => ''],
    ];

    protected $listeners = [
        'created-post' => '$refresh',
        'updated-post' => 'updatedPost',
    ];

    public function updatingWord()
    {
        $this->resetPage();
    }

    public function updatePost()
    {
        // $this->updatedPost = true;
        session()->flash('updatedPost', true);
    }

    public function render()
    {
        $posts = Post::query()
            ->latest()
            ->when($this->word, fn ($query, $value) => $query->where('title', 'LIKE', '%' . $value . '%'))
            ->paginate(10);

        return view('livewire.post-list', [
            'posts' => $posts
        ]);
    }
}

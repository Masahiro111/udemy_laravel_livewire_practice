<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;

    protected $queryString = [
        'word' => ['except' => ''],
    ];

    public $word;

    public function updatingWord()
    {
        $this->resetPage();
    }

    public function render()
    {
        $posts = Post::query()
            ->when($this->word, fn ($query, $value) => $query->where('title', 'LIKE', '%' . $value . '%'))
            ->paginate(10);

        return view('livewire.post-list', [
            'posts' => $posts
        ]);
    }
}

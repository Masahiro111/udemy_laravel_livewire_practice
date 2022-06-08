<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;

    public $title;
    public $body;
    public $word;

    protected $queryString = [
        'word' => ['except' => ''],
    ];

    protected $rules = [
        'title' => ['required'],
        'body' => ['required'],
    ];

    public function register()
    {
        $data = $this->validate();

        Post::query()
            ->create($data);

        $this->reset();
    }

    public function updatingWord()
    {
        $this->resetPage();
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

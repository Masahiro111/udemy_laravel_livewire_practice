<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;

    // public $title;
    // public $body;
    // public $post = [];

    public $word;
    public Post $post;


    protected $queryString = [
        'word' => ['except' => ''],
    ];

    protected $rules = [
        'post.title' => ['required', 'max:8'],
        'post.body' => ['required'],
    ];

    public function mount()
    {
        $this->post = new Post;
    }

    public function register()
    {
        $this->validate();

        $this->post->save();

        $this->post = new Post;


        // $this->post->title = '';
        // $this->post->title = '';
        // Post::query()
        //     ->create($data['post']);

        // $this->reset('post');
    }

    public function updatingWord()
    {
        $this->resetPage();
    }

    public function updated($key)
    {
        $this->validateOnly($key);
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

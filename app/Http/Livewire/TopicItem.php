<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TopicItem extends Component
{

    public $topic;

    public function mount($topic)
    {
        $this->topic = $topic;
    }

    public function render()
    {
        return view('livewire.topic-item');
    }
}

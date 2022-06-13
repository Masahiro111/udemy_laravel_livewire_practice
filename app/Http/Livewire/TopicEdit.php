<?php

namespace App\Http\Livewire;

use App\Models\Topic;
use Livewire\Component;

class TopicEdit extends Component
{
    public Topic $topic;

    protected $rules = [
        'topic.title' => ['required', 'max:20'],
        'topic.body' => ['required'],
    ];

    public function mout(Topic $topic)
    {
        $this->topic = $topic;
    }

    public function update()
    {
        $this->validate();

        $this->topic->save();

        return redirect(route('topic.edit', $this->topic))
            ->with('status', '更新しました');
    }

    public function render()
    {
        return view('livewire.topic-edit');
    }
}

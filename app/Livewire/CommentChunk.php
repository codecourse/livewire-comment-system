<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;

class CommentChunk extends Component
{
    public array $ids = [];

    public function render()
    {
        return view('livewire.comment-chunk', [
            'comments' => Comment::query()
                ->whereIn('id', $this->ids)
                ->with([
                    'user',
                    'children' => function ($query) {
                        $query->oldest()->with('user');
                    }
                ])
                ->orderByRaw('FIELD(id, ' . implode(',', $this->ids) . ')')
                //->latest()
                ->get()
        ]);
    }
}

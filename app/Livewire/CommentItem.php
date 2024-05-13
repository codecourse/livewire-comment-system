<?php

namespace App\Livewire;

use App\Livewire\Forms\CreateComment;
use App\Models\Comment;
use Livewire\Component;

class CommentItem extends Component
{
    public Comment $comment;

    public CreateComment $replyForm;

    public function reply()
    {
        $this->authorize('reply', $this->comment);

        $this->replyForm->validate();

        $reply = $this->comment->children()->make($this->replyForm->only('body'));
        $reply->user()->associate(auth()->user());

        $reply->save();

        $this->dispatch('replied', $this->comment->id);

        $this->replyForm->reset();
    }

    public function render()
    {
        return view('livewire.comment-item');
    }
}

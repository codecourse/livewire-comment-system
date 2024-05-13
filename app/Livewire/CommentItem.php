<?php

namespace App\Livewire;

use App\Livewire\Forms\CreateComment;
use App\Livewire\Forms\EditComment;
use App\Models\Comment;
use Livewire\Component;

class CommentItem extends Component
{
    public Comment $comment;

    public CreateComment $replyForm;

    public EditComment $editForm;

    public bool $deleted = false;

    public function mount()
    {
        $this->editForm->body = $this->comment->body;
    }

    public function delete()
    {
        $this->authorize('delete', $this->comment);

        $this->comment->delete();

        $this->deleted = true;
    }

    public function edit()
    {
        $this->authorize('edit', $this->comment);

        $this->editForm->validate();

        $this->comment->update($this->editForm->only('body'));

        $this->dispatch('edited', $this->comment->id);
    }

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

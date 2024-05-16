<?php

namespace App\Livewire;

use App\Livewire\Forms\CreateComment;
use Illuminate\Database\Eloquent\Model;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Comments extends Component
{
    public Model $model;

    public CreateComment $form;

    public int $page = 1;

    public array $chunks = [];

    public function mount()
    {
        $this->chunks = $this->model->comments()
            ->latest()
            ->pluck('id')
            ->chunk(10)
            ->toArray();
    }

    #[Computed()]
    public function commentsCount()
    {
        return array_sum(array_map('count', $this->chunks));
    }

    public function createComment()
    {
        $this->form->validate();

        $comment = $this->model->comments()->make($this->form->only('body'));
        $comment->user()->associate(auth()->user());

        $this->form->reset();

        $comment->save();

        if (count($this->chunks) === 0) {
            $this->chunks[] = [];
        }

        array_unshift($this->chunks[0], $comment->id);
    }

    public function loadMore()
    {
        if (!$this->hasMorePages()) {
            return;
        }

        $this->page++;
    }

    public function hasMorePages()
    {
        return $this->page < count($this->chunks);
    }

    public function render()
    {
        return view('livewire.comments');
    }
}

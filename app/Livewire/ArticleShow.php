<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ArticleShow extends Component
{
    public Article $article;

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.article-show');
    }
}

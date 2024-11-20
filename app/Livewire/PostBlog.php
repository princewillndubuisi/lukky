<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;

class PostBlog extends Component
{
    #[Url()]
    public $search = '';

    #[Url()]
    public $CheckCategories = [];

    #[Computed()]
    public function post() {
        return Post::where('post_status', '=', 'active')
            ->where('title', 'like', "%{$this->search}%")
            ->when(!empty($this->CheckCategories), function ($query) {
                $query->whereIn('category_id', $this->CheckCategories);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(3);
    }

    #[On('search')]
    public function updatedSearch($search) {
        $this->search = $search;
    }

    #[On('categoriesUpdate')]
    public function updatedCategories($CheckCategories) {
        $this->CheckCategories = $CheckCategories;
    }

    public function render()
    {
        return view('livewire.post-blog');
    }
}

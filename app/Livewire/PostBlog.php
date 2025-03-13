<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class PostBlog extends Component
{
    use WithPagination;

    public $search = '';

    #[Url()]
    public $CheckCategories = [];

    #[Computed()]
    public function post() {
        return Post::where('post_status', '=', 'active')
            ->when($this->search, function ($query) {
                $query->where('title', 'like', "%{$this->search}%");
            })
            ->when(!empty($this->CheckCategories), function ($query) {
                $query->whereIn('category_id', $this->CheckCategories);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(3);
    }

    #[On('searchUpdated')]
    public function updateSearch($search) {
        $this->search = $search;
        $this->resetPage();
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

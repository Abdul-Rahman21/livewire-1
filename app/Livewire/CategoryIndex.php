<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryIndex extends Component
{
    public $categories;

    public function mount()
    {
        $this->loadCategories();
    }

    public function loadCategories()
    {
        $this->categories = Category::with('parent')->get();
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $parentId = $category->parent_id;

        Category::where('parent_id', $id)->update(['parent_id' => $parentId]);
        $category->delete();

        $this->loadCategories();
        session()->flash('message', 'Category deleted and children shifted.');
    }

    public function render()
    {
        return view('livewire.category-index');
    }
}

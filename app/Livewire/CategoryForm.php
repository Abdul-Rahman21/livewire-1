<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryForm extends Component
{
    public $categoryId;
    public $name, $status = 1, $parent_id;
    public $categoryOptions = [];

    public function mount($id = null)
    {
        $this->categoryId = $id;

        if ($id) {
            $category = Category::findOrFail($id);
            $this->name = $category->name;
            $this->status = $category->status;
            $this->parent_id = $category->parent_id;
        }

        $this->categoryOptions = Category::getCategoryOptions($id);
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'status' => 'required|in:1,2',
            'parent_id' => 'nullable|exists:categories,id|not_in:' . $this->categoryId
        ]);

        Category::updateOrCreate(
            ['id' => $this->categoryId],
            [
                'name' => $this->name,
                'status' => $this->status,
                'parent_id' => $this->parent_id,
            ]
        );

        session()->flash('message', $this->categoryId ? 'Category updated' : 'Category added');

        return redirect()->route('categories.index');
    }

    public function render()
    {
        return view('livewire.category-form');
    }
}

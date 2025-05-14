<div class="max-w-xl mx-auto mt-10">
    <h2 class="text-xl font-bold mb-4">{{ $categoryId ? 'Edit Category' : 'Add Category' }}</h2>

    <form wire:submit.prevent="save" class="space-y-4 bg-white p-6 rounded shadow">
        <div>
            <label>Name</label>
            <input type="text" wire:model.defer="name" class="w-full border border-gray-300 p-2 rounded">
            @error('name') <span class="text-red-600">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Status</label>
            <select wire:model.defer="status" class="w-full border border-gray-300 p-2 rounded">
                <option value="1">Enabled</option>
                <option value="2">Disabled</option>
            </select>
        </div>

        <div>
            <label>Parent Category</label>
            <select wire:model.defer="parent_id" class="w-full border border-gray-300 p-2 rounded">
                <option value="">None</option>
                @foreach($categoryOptions as $id => $path)
                    <option value="{{ $id }}">{{ $path }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition">
                Save
            </button>
            <a href="{{ route('categories.index') }}" class="bg-gray-600 text-white py-2 px-4 rounded hover:bg-gray-700 transition">
                Back
            </a>
        </div>
    </form>
</div>

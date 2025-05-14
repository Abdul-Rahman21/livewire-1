<div class="p-4">
    <div class="flex justify-between mb-4">
        <h2 class="text-2xl font-bold mb-4">Categories</h2>
        <a href="{{ route('categories.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">Add Category</a>
    </div>

    <table class="w-full mt-4 border-collapse">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="p-2 border">ID</th>
                <th class="p-2 border">Name (Full Path)</th>
                <th class="p-2 border">Status</th>
                <th class="p-2 border">Parent ID</th>
                <th class="p-2 border">Created</th>
                <th class="p-2 border">Updated</th>
                <th class="p-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td class="p-2 border">{{ $category->id }}</td>
                    <td class="p-2 border">{{ $category->full_path }}</td>
                    <td class="p-2 border">{{ $category->status == 1 ? 'Enabled' : 'Disabled' }}</td>
                    <td class="p-2 border">{{ $category->parent_id ?? '—' }}</td>
                    <td class="p-2 border">{{ $category->created_at->format('Y-m-d H:i') }}</td>
                    <td class="p-2 border">{{ $category->updated_at ? $category->updated_at->format('Y-m-d H:i') : '—' }}</td>
                    <td class="p-2 border">
                        <a href="{{ route('categories.edit', $category->id) }}" class="text-blue-600">Edit</a> |
                        <button wire:click="delete({{ $category->id }})" class="text-red-500"
                            onclick="return confirm('Are you sure?')">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

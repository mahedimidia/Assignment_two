@extends('admin.master')

@section('admin_content')
<main class="px-4 py-6 sm:px-6 lg:px-8">
    <div class="bg-white p-6 rounded-lg shadow-md mb-8 max-w-3xl mx-auto">
        <h2 class="text-xl font-bold mb-4 text-gray-800">Edit Category</h2>

        <form action="{{ route('categories.update', $category->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title"
                    value="{{ old('title', $category->title) }}"
                    required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
            </div>

            <!-- Slug -->
            <div>
                <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                <input type="text" name="slug" id="slug"
                    value="{{ old('slug', $category->slug) }}"
                    required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
            </div>

            <!-- Parent Category -->
            <div>
                <label for="parent_category" class="block text-sm font-medium text-gray-700">Parent Category</label>
                <select name="parent_category" id="parent_category"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 bg-white">
                    <option value="">Select Parent Category</option>
                    <option value="web-development" {{ old('parent_category', $category->parent_category) == 'web-development' ? 'selected' : '' }}>Web Development</option>
                    <option value="react" {{ old('parent_category', $category->parent_category) == 'react' ? 'selected' : '' }}>React</option>
                    <option value="typescript" {{ old('parent_category', $category->parent_category) == 'typescript' ? 'selected' : '' }}>TypeScript</option>
                </select>
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="4"
                    required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">{{ old('description', $category->description) }}</textarea>
            </div>

            <!-- Submit -->
            <div class="text-right">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">
                    Update Category
                </button>
            </div>
        </form>
    </div>
</main>
@endsection

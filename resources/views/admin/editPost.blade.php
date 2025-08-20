@extends('admin.master')

@section('admin_content')
<div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6 mt-10">
    <h2 class="text-2xl font-bold mb-6">Edit Post</h2>

    {{-- show validation errors --}}
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- Title --}}
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title <span class="text-red-500">*</span></label>
            <input type="text" id="title" name="title"
                   value="{{ old('title', $post->title) }}"
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
        </div>

        {{-- Content --}}
        <div>
            <label for="content" class="block text-sm font-medium text-gray-700">Content <span class="text-red-500">*</span></label>
            <textarea id="content" name="content" rows="5"
                      class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">{{ old('content', $post->content) }}</textarea>
        </div>

        {{-- Category --}}
        <div>
            <label for="category_id" class="block text-sm font-medium text-gray-700">Category <span class="text-red-500">*</span></label>
            <select id="category_id" name="category_id"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="">-- Select Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->title }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Current Image --}}
        @if($post->image)
            <div>
                <label class="block text-sm font-medium text-gray-700">Current Image</label>
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-32 h-32 object-cover rounded-md mt-2">
            </div>
        @endif

        {{-- Upload New Image --}}
        <div>
            <label for="image" class="block text-sm font-medium text-gray-700">Change Image</label>
            <input type="file" id="image" name="image"
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
        </div>

        {{-- Submit Button --}}
        <div>
            <button type="submit"
                    class="px-4 py-2 bg-green-600 text-white rounded-md shadow hover:bg-green-700 focus:outline-none">
                Update Post
            </button>
        </div>
    </form>
</div>
@endsection

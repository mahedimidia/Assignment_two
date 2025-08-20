@extends('admin.master') @section('admin_content')

<main class="px-4 py-6 sm:px-6 lg:px-8">
    <div class="bg-white p-6 rounded-lg shadow-md mb-8 max-w-3xl mx-auto">
        
         @if(session('success'))
        <div class="alert alert-success text-green-700">
           <h2>{{ session('success') }}</h2> 
        </div>
        @else 
        <h2 class="text-xl font-bold mb-4 text-gray-800">Create New Category</h2>
        @endif
        
        <form action="{{ route('categories.store') }}" method="POST" class="space-y-6">
            @csrf
            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title
                    <span class="text-red-500">*</span></label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title') }}"
                    required="required"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Slug -->
            <div>
                <label for="slug" class="block text-sm font-medium text-gray-700">Slug
                    <span class="text-red-500">*</span></label>
                <input
                    type="text"
                    id="slug"
                     value="{{ old('slug') }}"
                    name="slug"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Parent Category -->
            <div>
                <label for="parent_category" class="block text-sm font-medium text-gray-700">Parent Category
                    <span class="text-red-500">*</span></label>
                <select
                    id="parent_category"
                    name="parent_category"
                    required="required"
                     value="{{ old('parent_category') }}"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 bg-white focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Select Parent Category</option>
                    <option value="web-development">Web Development</option>
                    <option value="react">React</option>
                    <option value="typescript">TypeScript</option>
                    <!-- Add more options dynamically here -->
                </select>
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description
                    <span class="text-red-500">*</span></label>
                <textarea
                    id="description"
                    name="description"
                    required="required"
                    value="{{ old('description') }}"
                    rows="4"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>

            <!-- Submit Button -->
            <div class="text-right">
                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-md">
                    Create Category
                </button>
            </div>
        </form>
       

    </div>

</main>

@endsection
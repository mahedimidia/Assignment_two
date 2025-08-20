@extends('admin.master') @section('admin_content')
<div class="max-w-7xl mx-auto py-10">
    <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-gray-800">Post List</h2>
            <a
                href="{{ route('post.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-md flex items-center">
                <i class="fas fa-plus mr-2"></i>
                Create Post
            </a>
        </div>
    {{-- Success Message --}}
    @if(session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
        {{ session('success') }}
    </div>
    @endif

    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                    <th
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($Posts as $index => $post)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $Posts->firstItem() + $index }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $post->title }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $post->category->title ?? 'N/A' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        @if($post->image)
                        <img
                            src="{{ asset('storage/' . $post->image) }}"
                            alt="{{ $post->title }}"
                            class="w-16 h-16 object-cover rounded">
                        @else
                        <span class="text-gray-400">No Image</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 flex space-x-2">
                        <a
                            href="{{ route('post.edit', $post->id) }}"
                            class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">Edit</a>

                        <form
                            action="{{ route('post.destroy', $post->id) }}"
                            method="POST"
                            onsubmit="return confirm('Are you sure to delete this post?')">
                            @csrf @method('DELETE')
                            <button
                                type="submit"
                                class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <x-pagination :datas="$Posts" />


</div>
@endsection
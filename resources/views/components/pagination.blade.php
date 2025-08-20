<div class="mt-4 flex justify-between items-center">
    @if ($datas->total() > 0)
        <div class="text-sm text-gray-700">
            Showing 
            <span class="font-medium">{{ $datas->firstItem() }}</span>
            to 
            <span class="font-medium">{{ $datas->lastItem() }}</span>
            of 
            <span class="font-medium">{{ $datas->total() }}</span>
            results
        </div>
    @else
        <div class="text-sm text-gray-700">
            No results found.
        </div>
    @endif

    <div>
        {{ $datas->links() }} {{-- Laravel Tailwind pagination --}}
    </div>
</div>

<div class="mt-4 flex justify-between items-center">
                <div class="text-sm text-gray-700">
                    Showing 
                    <span class="font-medium">{{ $datas->firstItem() }}</span>
                    to 
                    <span class="font-medium">{{ $datas->lastItem() }}</span>
                    of 
                    <span class="font-medium">{{ $datas->total() }}</span>
                    results
                </div>

                <div>
                    {{ $datas->links() }} {{-- Tailwind pagination --}}
                </div>
            </div>
<!DOCTYPE html>
<html lang="en">

    {{-- Including head --}}
    @include('admin.partials.head')

    <body class="bg-gray-50 font-sans">
        <div class="flex h-screen overflow-hidden">

            {{-- Including sidebar --}}
            @include('admin.partials.sidebar')

            <div class="flex-1 overflow-auto">

                @include('admin.partials.header') 
                
                @yield('admin_content')

            </div>
        </div>

        {{-- Including all script --}}
        @include('admin.partials.script')
    </body>
</html>
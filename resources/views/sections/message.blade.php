<div>
    @if (session('success'))
    <div class="w-full px-4 py-2 font-bold text-white bg-green-500 rounded">{{session('success')}}</div>
    @endif

    @if (session('error'))
    <div class="w-full px-4 py-2 font-bold text-white bg-red-500 rounded">{{session('error')}}</div>
    @endif
</div>

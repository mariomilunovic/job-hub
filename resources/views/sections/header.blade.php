
{{-- left side --}}
<div id="Logo" class="whitespace-nowrap ml-4">
    <a href="">
        <img src="/images/ui/fist.png" alt="Job-Hub logo" class="h-16 inline-block mr-3">

    </a>
    <span class="align-middle text-4xl font-bold text-white" style="text-shadow: 2px 2px #000000">{{config('app.name','job-hub')}}</span>
</div>


{{-- right side --}}
<div x-data="{ isOpen: false }" class="mr-4">
    <div class="relative">
        <button @click="isOpen = !isOpen" class="z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
            <img src="https://source.unsplash.com/uJ8LNVCBjFQ/400x400">
        </button>

        <div x-show="isOpen" class="absolute w-32 top-14 right-0 bg-white rounded-lg shadow-lg py-2 text-center">
            <a href="#" class="block px-4 py-2 account-link hover:bg-blue-400">Profil</a>
            <a href="#" class="block px-4 py-2 account-link hover:bg-blue-400">Odjava</a>
        </div>
    </div>
</div>


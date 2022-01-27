<div
class="fixed inset-0"
role="dialog"
tabindex="-1"
x-show="show_user"

aria-modal="true"
x-on:click.away="show_user = false"
x-cloak
x-transition
>


    {{-- modal content start --}}
    <div class="z-50 flex-col relative min-h-screen flex items-center justify-center text-left">

        <x-user class="relative min-h-screen flex" :user="$bid->user" :expanded=true/>

        <button class="btn-gray-xs shadow-md" x-on:click="show_user=false">
            ✖  Zatvori
        </button>

    </div>
    {{-- modal content end --}}

     {{-- semi transparent overlay --}}
     <div x-show="show_user" x-transition.opacity class="z-10 fixed inset-0 bg-black bg-opacity-75"></div>




</div>



<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
</div>
<div class="flex-col">

    <h1 class="text-3xl text-center mb-3 text-shadow-sm">Moje Veštine</h1>


    <table class="table-fixed justify-items-start">
        <tr>
            <td class="text-right">Ukupno :</td>
            <td class="w-4"></td>
            <td class="text-left ">{{$totalSkills}}</td>
        </tr>
        <tr class="flex-col align-text-top">
            <td class="text-right">Najjača :</td>
            <td class="w-4"></td>
            <td class="text-left">
                @if($strongestSkill)
                <div>{{$strongestSkill->name}}
                    <span class="px-2 py-0.5  text-xs font-bold ml-2 text-red-100 bg-red-600 rounded-full">
                        NIVO : {{$strongestSkill->pivot->points}}
                    </span>
                </div>
                @else
                <span>n/a</span>
                @endif



            </td>
        </tr>
        <tr class="flex-col align-text-top">
            <td class="text-right">Najslabija :</td>
            <td class="w-4"></td>
            <td class="text-left">
                @if($weakestSkill)
                <div>{{$weakestSkill->name}}
                    <span class="px-2 py-0.5  text-xs font-bold ml-2 text-red-100 bg-red-600 rounded-full">
                        NIVO : {{$weakestSkill->pivot->points}}
                    </span>
                </div>
                @else
                <span>n/a</span>
                @endif


            </td>
        </tr>
        <tr class="flex-col align-text-top">
            <td class="text-right">Najnovija :</td>
            <td class="w-4"></td>
            <td class="text-left">
                @if($newestSkill)
                <div>{{$newestSkill->name}}
                    <span class="px-2 py-0.5  text-xs font-bold ml-2 text-red-100 bg-red-600 rounded-full">
                        NIVO : {{$newestSkill->pivot->points}}
                    </span>
                </div>
                @else
                <span>n/a</span>
                @endif



            </td>
        </tr>

    </table>

</div>




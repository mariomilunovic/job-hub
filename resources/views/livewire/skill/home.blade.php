<div class="flex-col">

    <h1 class="text-3xl text-center mb-3 text-shadow-sm">Veštine</h1>


    <table class="table-fixed justify-items-start">

        <tr>
            <td class="text-right">Ukupno :</td>
            <td class="w-4"></td>
            <td class="text-left ">{{$totalSkills}}</td>
        </tr>

        <tr class="flex-col align-text-top">
            <td class="text-right">Najviše korisnika:</td>
            <td class="w-4"></td>
            <td class="text-left">
                <a href="{{route('user.skill',$skillWithLargestNumberOfUsers)}}">
                    {{$skillWithLargestNumberOfUsers->name}}
                </a>
            </td>
        </tr>

        <tr class="flex-col align-text-top">
            <td class="text-right">Najviše poslova:</td>
            <td class="w-4"></td>
            <td class="text-left">
                <div>
                    {{$skillWithLargestNumberOfJobs->name}}
                </div>
            </td>
        </tr>

    </table>

</div>




<div class="flex-col">

    <h1 class="text-3xl text-center mb-3 text-shadow-sm">Moje Ponude</h1>


    <table class="table-fixed">
        <tr>
            <td class="text-right">Sve ponude :</td>
            <td class="w-4"></td>
            <td class="text-left w-8">{{$myBids}}</td>
        </tr>
        <tr>
            <td class="text-right">Nisu izabrane :</td>
            <td class="w-4"></td>
            <td class="text-left">{{$createdBids}}</td>
        </tr>
        <tr>
            <td class="text-right">Izabrane :</td>
            <td class="w-4"></td>
            <td class="text-left">{{$selectedBids}}</td>
        </tr>
        <tr>
            <td class="text-right">Isporučene :</td>
            <td class="w-4"></td>
            <td class="text-left">{{$deliveredBids}}</td>
        </tr>
        <tr>
            <td class="text-right">Plaćene :</td>
            <td class="w-4"></td>
            <td class="text-left">{{$myBids}}</td>
        </tr>
    </table>

</div>




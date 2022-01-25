<div class="flex-col">

    <h1 class="text-3xl text-center mb-3 text-shadow-sm">Poslovi</h1>


    <table class="table-fixed">
        <tr>
            <td class="text-right">Svi poslovi :</td>
            <td class="w-4"></td>
            <td class="text-left w-8">{{$Jobs}}</td>
        </tr>
        <tr>
            <td class="text-right">Čekaju ponudu :</td>
            <td class="w-4"></td>
            <td class="text-left">{{$JobsCollectingOffers}}</td>
        </tr>
        <tr>
            <td class="text-right">Radovi u toku:</td>
            <td class="w-4"></td>
            <td class="text-left">{{$JobsInProgress}}</td>
        </tr>
        <tr>
            <td class="text-right">Radovi primljeni:</td>
            <td class="w-4"></td>
            <td class="text-left">{{$JobsFinished}}</td>
        </tr>
        <tr>
            <td class="text-right">Radovi plaćeni:</td>
            <td class="w-4"></td>
            <td class="text-left">{{$JobsCompleted}}</td>
        </tr>
    </table>

</div>

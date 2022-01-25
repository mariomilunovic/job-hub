<div class="flex-col">

    <h1 class="text-3xl text-center mb-3 text-shadow-sm">Moj Novac</h1>


    <table class="table-fixed">
        <tr>
            <td class="text-right">Stanje :</td>
            <td class="w-4"></td>
            <td class="text-left w-8">{{$balance}}</td>
        </tr>
        <tr>
            <td class="text-right">Sve uplate :</td>
            <td class="w-4"></td>
            <td class="text-left">{{$totalDeposit}}</td>
        </tr>
        <tr>
            <td class="text-right">Sve isplate :</td>
            <td class="w-4"></td>
            <td class="text-left">{{$totalWithdraw}}</td>
        </tr>
        <tr>
            <td class="text-right">Rezervisano :</td>
            <td class="w-4"></td>
            <td class="text-left">{{$reserved}}</td>
        </tr>
        <tr>
            <td class="text-right">Zarada :</td>
            <td class="w-4"></td>
            <td class="text-left">{{$totalSalary}}</td>
        </tr>

        <tr>
            <td class="text-right">Troškovi :</td>
            <td class="w-4"></td>
            <td class="text-left">{{$totalExpenses}}</td>
        </tr>
    </table>

</div>

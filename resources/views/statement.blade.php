@extends('app')
@section('content')
<div class="container">
    <span><b>{{ __ ('Account Statements') }}</b></span>
    <table class="table">
        <thead>
            <tr>
                <th> #</th>
                <th> date</th>
                <th> amount  </th>
                <th> type </th>
                <th> details</th>
                <th> balance </th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1;?>
            @php($amount=$outstanding)
            @foreach ($transactions as $transaction)
            <tr>
                <td> {{$i}} </td>
                <td> {{date('d-m-Y', strtotime($transaction->created_at))}}</td>
                @if($transaction->debit == 0)
                <td> {{$transaction->credit}} </td>
                @php($amount=$amount+$transaction->credit)
                @else
                <td> {{$transaction->debit}} </td>
                @php($amount=$amount-$transaction->debit)
                @endif
                @if($transaction->remarks == 'deposit' || $transaction->remarks == 'withdraw')
                <td> {{$transaction->remarks}} </td>
                @else
                <td>Transfer</td>
                @endif
                <td> {{$transaction->remarks}} </td>
                <td> {{$amount}} </td>
            </tr>
            <?php $i++; ?>
            @endforeach


        </tbody>
    </table>

</div>
@endsection

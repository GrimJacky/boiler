<h3>{{strtoupper($pack)}} package</h3>
@if($credit)
<h2>£{{$credit['monthly']}} per month</h2>
<span>{{strtoupper($boiler)}}</span>
<br>
<span>{{strtoupper($warranty)}} WARRANTY</span>
<hr>
<p>
    PRICE £{{$price}}<br>
    CUSTOMER DEPOSIT £{{$credit['deposit']}}<br>
    AMOUNT ON FINANCE £{{$credit['amount']}}<br>
    MONTHLY PAYMENT £{{$credit['monthly']}}<br>
    DURATION OF LOAN {{$credit['month']}} MONTHS<br>
    TOTAL AMOUNT PAYABLE £{{$credit['total']}}<br>
    APR REPRESENTATIVE {{$credit['percent']}}%
</p>
@else
    <h2>£{{$price}}</h2>
    <span>{{strtoupper($boiler)}}</span>
    <br>
    <span>{{strtoupper($warranty)}} WARRANTY</span>
@endif
<hr>
<h4>{{strtoupper($pack)}} PACKAGE INCLUDES</h4>
<ul>
    @foreach($includes as $include)
        <li>{{$include}}</li>
    @endforeach
</ul>
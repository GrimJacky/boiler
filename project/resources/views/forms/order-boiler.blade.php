<div class="jumbotron">
    <div class="container">
        <h3>{{strtoupper($pack)}} package</h3>
        <input type="hidden" name="options[boiler][pack]" value="{{$pack}}">
        @if($credit)
            <h2>£{{$credit['monthly']}} per month</h2>
            <input type="hidden" name="options[boiler][credit][monthly]" value="{{$credit['monthly']}}">
            <span>{{strtoupper($boiler)}}</span>
            <input type="hidden" name="options[boiler][boiler]" value="{{$boiler}}">
            <br>
            <span>{{strtoupper($warranty)}} WARRANTY</span>
            <input type="hidden" name="options[boiler][warranty]" value="{{$warranty}}">
            <hr>
            <p>
                PRICE £{{$price}}<br>
                <input type="hidden" name="options[boiler][price]" value="{{$price}}">
                CUSTOMER DEPOSIT £{{$credit['deposit']}}<br>
                <input type="hidden" name="options[boiler][credit][deposit]" value="{{$credit['deposit']}}">
                AMOUNT ON FINANCE £{{$credit['amount']}}<br>
                <input type="hidden" name="options[boiler][credit][amount]" value="{{$credit['amount']}}">
                MONTHLY PAYMENT £{{$credit['monthly']}}<br>
                <input type="hidden" name="options[boiler][credit][monthly]" value="{{$credit['monthly']}}">
                DURATION OF LOAN {{$credit['month']}} MONTHS<br>
                <input type="hidden" name="options[boiler][credit][month]" value="{{$credit['month']}}">
                TOTAL AMOUNT PAYABLE £{{$credit['total']}}<br>
                <input type="hidden" name="options[boiler][credit][total]" value="{{$credit['total']}}">
                APR REPRESENTATIVE {{$credit['percent']}}%
                <input type="hidden" name="options[boiler][credit][percent]" value="{{$credit['percent']}}">
            </p>
        @else
            <h2>£{{$price}}</h2>
            <input type="hidden" name="options[boiler][price]" value="{{$price}}">
            <span>{{strtoupper($boiler)}}</span>
            <input type="hidden" name="options[boiler][boiler]" value="{{$boiler}}">
            <br>
            <span>{{strtoupper($warranty)}} WARRANTY</span>
            <input type="hidden" name="options[boiler][warranty]" value="{{$warranty}}">
        @endif
        <hr>
        <h4>{{strtoupper($pack)}} PACKAGE INCLUDES</h4>
        <ul>
            @foreach($includes as $id => $include)
                <input type="hidden" name="options[boiler][includes][{{$id}}]" value="{{$include}}">
                <li>{{$include}}</li>
            @endforeach
        </ul>
    </div>
</div>
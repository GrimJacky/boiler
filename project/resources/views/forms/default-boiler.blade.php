@foreach($boilers as $boiler)
<section class="wrapper">
    <div class="bg-white-only bg-auto no-border-xs">
        <div class="wrapper-lg boiler">
            <span>{{$boiler->getContent('name')}}</span>
            <span>{!!$boiler->getContent('body')!!}</span>
            <img src="{{$boiler->image}}">
            <span>{{$boiler->getContent('price')}}</span>
            <span>{{$boiler->getContent('pay-type')}}</span>
            <span>{{$boiler->getContent('warranty')}}</span>
            <span>{{$boiler->getContent('install-type')}}</span>
            <span>{{$boiler->getContent('property-size')}}</span>
            <div class="line line-dashed b-b line-lg"></div>
            <a href="{{route('dashboard.copy.boiler', ['id'=>$boiler->id, 'post'=>$post])}}" class="btn btn-xs">copy</a>
        </div>
    </div>
</section>
@endforeach

<style>
    .boiler img {
        width: 100%;
    }

    .boiler span {
        display: block;
    }
</style>
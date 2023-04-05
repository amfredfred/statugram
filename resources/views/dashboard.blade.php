@extends('layouts.master')
@section('title', "Dashboard")
@section('content')

<div class="dash">
    <h2 class="headline-h2 uppercase" style="font-size: 21px;margin-bottom:1rem">{{Request::path()}}</h2>
    <section class="section">
        <div class="table-wrapper">
            <div class="flexed-row-wrap">
                <div class="row-tab">
                    <span class="material-symbols-outlined">
                        monetization_on
                    </span>
                    <div class="tab-inner">
                        <p class="text-sm ">Earning Overview</p>
                        <h5 class="font-weight-bolder mb-0">
                            ${{Auth::user()->earned_from_downline}}
                        </h5>
                    </div>
                </div>
                <div class="row-tab">
                    <span class="material-symbols-outlined"> reduce_capacity </span>
                    <div class="tab-inner">
                        <p class="text-sm ">Downlines</p>
                        <h5 class="font-weight-bolder mb-0">{{count(Auth::user()->downlines)}} </h5>
                    </div>
                </div>
            </div>

            @if(\Session::has('success') )
            <div class="won-amount">
                <h1 class="headline-h1">
                    YOU WON ${!! \Session::get('success') !!}
                </h1>
            </div>
            @endif

            @if (!Auth::user()->last_play_time)
            <div class="roll-buton-wrapper">
                <form action="{{route('roll')}}" class="game-form" method="POST">
                    @method('POST')
                    @csrf
                    <button type="submit" class="roll-button">ROLL</button>
                </form>
            </div>
            @else
            <div class="count-down">
                <div class="time-group">
                    <span class="time-digit" id="hr"></span>
                    <i class="time-name">Hrs</i>
                </div>
                <div class="time-group">
                    <span class="time-digit" id="min"></span>
                    <i class="time-name">Min</i>
                </div>
                <div class="time-group">
                    <span class="time-digit" id="sec"> </span>
                    <i class="time-name">Sec</i>
                </div>
            </div>
            @endif
        </div>
    </section>
</div>

<script>
    (async function() {
        let lastPlayTime = `${{Auth::user()->last_play_time}}`;
        lastPlayTime = lastPlayTime.split('$')[1];
        let date1 = new Date(lastPlayTime).getTime()+ 3600

        setInterval(() => {
            let date2 = new Date().getTime() ;
            var distance = date1 - date2;
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            document.querySelector('#hr').innerHTML = hours
            document.querySelector('#min').innerHTML = minutes
            document.querySelector('#sec').innerHTML = seconds

            console.log(days, hours, minutes, seconds)

        }, 1000);
        console.log(lastPlayTime, "LAST PLAY TIME", date1)
    })()

</script>
@endsection

@extends('layouts.master')
@section('title', "Dashboard")
@section('content')



<div class="flexed-row-wrap">

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
                                ${{Auth::user()->earned_from_downline + Auth::user()->overview}}
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
                <div class="count-down">
                    <div class="won-amount">
                        <h1 class="headline-h1">
                            YOU WON ${!! \Session::get('success') !!}
                        </h1>
                    </div>
                </div>
                @endif

                @if(\Session::has('message'))
                <div class="count-down">
                    <h3 class="headline-h3" id="count-down-message">
                        {!! \Session::get('message') !!}
                    </h3>
                </div>
                @endif

                <div class="count-down">
                    <div class="flexed-row-wrap">
                        <div class="row-tab">
                            <span class="material-symbols-outlined">
                                history
                            </span>
                            <div class="tab-inner">
                                <p class="text-sm ">Last Play Time</p>
                                <h5 class="font-weight-bolder mb-0">
                                    {{date('F d, Y, h:m:s', Auth::user()->last_play_time)}}
                                </h5>
                            </div>
                        </div>
                        <div class="row-tab">
                            <span class="material-symbols-outlined"> schedule </span>
                            <div class="tab-inner">
                                <p class="text-sm ">Next Play Time</p>
                                <h5 class="font-weight-bolder mb-0">{{ date('F d, Y, h:m:s',Auth::user()->next_play_time) }} </h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="count-down">
                    <div class="time-group">
                        <span class="time-digit" id="hr">--</span>
                        <i class="time-name">Hrs</i>
                    </div>
                    <div class="time-group">
                        <span class="time-digit" id="min">--</span>
                        <i class="time-name">Min</i>
                    </div>
                    <div class="time-group">
                        <span class="time-digit" id="sec">--</span>
                        <i class="time-name">Sec</i>
                    </div>
                </div>

                <div class="roll-buton-wrapper">
                    <form action="{{route('roll')}}" class="game-form" method="POST">
                        @method('POST')
                        @csrf
                        <button type="submit" class="roll-button">PRESS</button>
                    </form>
                </div>


            </div>
        </section>
    </div>

    <div class="ads-side-by-side">
        <!-- Side By Side -->
        <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-9643693190346556" data-ad-slot="3704948270" data-ad-format="auto" data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>

</div>


<script>
    (async function() {
        let lastPlayTime = `${{Auth::user()->next_play_time}}`;
        lastPlayTime = lastPlayTime.split('$')[1];
        let date1 = lastPlayTime * 1000

        setInterval(() => {
            let date2 = new Date().getTime();
            var distance = date1 - date2;
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            if (distance < 0) {
                document.querySelector('#count-down-message').classList.add('active')
                document.querySelector('#count-down-message').innerHTML = 'You Can Claim Now! 😍'
                document.querySelector('#hr').innerHTML = '00'
                document.querySelector('#min').innerHTML = '00'
                document.querySelector('#sec').innerHTML = '00'
                document.querySelector('.roll-button').style = 'background:green'
                document.querySelector('.roll-button').innerHTML = 'Press'
                return
            }
            document.querySelector('#hr').innerHTML = hours
            document.querySelector('#min').innerHTML = minutes
            document.querySelector('#sec').innerHTML = seconds
            document.querySelector('.roll-button').innerHTML = 'Wait 🤚'

        }, 1000);
    })()

</script>
@endsection

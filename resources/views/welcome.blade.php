@extends('layouts.master')
@section('title', "Home")
@section('content')
<section class="section">
    <div class="flexed-row-wrap">
        <div class="flex-row-inner">
            <h1 class="headline-h2"> WELCOME </h1>
            <p class="paragraph">
                Join our thrilling platform and you could win up to $10 per hour by rolling the dice! You can also generate passive income by referring friends and family, who will receive lifetime 50% referral commissions.

                Our platform is not a trading platform; rather, it is a simple and enjoyable way to possibly make some extra money. Don't pass up this chance to try your luck and gain rewards.
                <br /> <br />
                Start rolling the dice with us right away! It moves quickly and is profitable. Join today to begin winning! 18+ only. Play poker sensibly. T&C's apply. 100 words. Win by rolling the dice!
            </p>
        </div>
        <div class="flex-row-inner">
            <div class='main-link-wrapper'>
                <a href="{{url('dashboard')}}" class="large-button-link">PLAY NOW</a>
            </div>
        </div>
    </div>
</section>


<section class="section">
    <div class="flexed-row-wrap">
        <div class="flex-row-inner">
            <h1 class="headline-h2"> FEATURES </h1>
            <ul class="grid-flex-ul">
                <li class="li-card">
                    <p class="card-description">
                        Hourly chances to win up to $10 by simply rolling a dice, providing a fun and exciting way to potentially earn money.
                    </p>
                </li>
                <li class="li-card">
                    <p class="card-description">
                        Lifetime referral commissions of 50% provide a reliable source of income for those who refer others to the platform.
                    </p>
                </li>

                <li class="li-card">
                    <p class="card-description">
                        No need for trading expertise, making it accessible to everyone, regardless of their financial background or experience.
                    </p>
                </li>

                <li class="li-card">
                    <p class="card-description">
                        This platform is a simple and entertaining way to potentially earn money without having to spend time researching stocks, analyzing charts, or conducting market research.
                    </p>
                </li>

                <li class="li-card">
                    <p class="card-description">
                        Signing up is quick and easy, allowing users to start rolling the dice and potentially earning money right away.
                    </p>
                </li>

                <li class="li-card">
                    <p class="card-description">
                        Transparency and security measures are in place to ensure fair gameplay and financial security, giving users peace of mind while participating in this exciting opportunity.
                    </p>
                </li>

        </div>
        </ul>
        <div class="flex-row-inner">
            <div class='main-link-wrapper'>
                <a href="{{url('dashboard')}}" class="large-button-link">WIN 10 USD</a>
            </div>

        </div>
    </div>
</section>

@endsection

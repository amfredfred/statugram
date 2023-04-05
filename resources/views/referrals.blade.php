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
                        <p class="text-sm ">Ref Earning</p>
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
            <div class="ref-link-container">

                <p class="paragraph">
                    A 50% commission of the user's winnings from using the platform after you referred them will be paid to you. You will continue to receive a portion of their earnings as long as they remain a paying customer of the platform because this commission is lifetime, which means that it will never expire.
                </p>

                <div class="ref-link-copy-zone">
                    <h3 class="headline-h3">Earn Up To $2000 this {{date('F')}}</h3>
                    <div class="ref-link-input-group">
                        <input value="{{Auth::user()->ref_link}}" type="text" class="link-readonly">
                        <button class="link-copy-button">COPY LINK</button>
                        <button onclick=" " class="link-copy-button">COPY ID</button>
                    </div>
                </div>

                <p class="paragraph">
                    For instance, if the dice roll results in $20 for your referred user, you will earn a $10 commission. You will also keep receiving a portion of their earnings if they keep making money in the future.
                    <br /><br />
                    There are no limits to the number of users you can refer, which means that there is no limit to the potential amount of referral commissions you can earn. So, if you know people who are looking for a fun and simple way to potentially earn money, be sure to refer them to the platform and start earning your lifetime referral commissions today!

                </p>
            </div>
        </div>
    </section>
</div>

@endsection

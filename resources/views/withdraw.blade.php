@extends('layouts.master')
@section('title', "Wallet")

@section('content')
<div class="flexed-row-wrap">
    <div class="dash">
        <h2 class="headline-h2 uppercase" style="font-size: 21px;margin-bottom:1rem">{{Request::path()}}</h2>
        <section class="section">

            <div class="row-tab" style="margin-bottom: 2rem">
                <span class="material-symbols-outlined">
                    monetization_on
                </span>
                <div class="tab-inner">
                    <p class="text-sm ">Withdrawable Balance</p>
                    <h5 class="font-weight-bolder mb-0">
                        ${{Auth::user()->earned_from_downline + Auth::user()->overview}}
                    </h5>
                </div>
            </div>

            @if(\Session::has('success') )
            <div class="count-down">
                <div class="won-amount">
                    <h1 class="headline-h1">
                        {!! \Session::get('success') !!}
                    </h1>
                </div>
            </div>
            @endif

            @if(\Session::has('message'))
            <div class="count-down">
                <h3 class="headline-h3">
                    {!! \Session::get('message') !!}
                </h3>
            </div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{route('withdrawfunds')}}" class="wtd-form">
                @csrf
                <div class="wallet-dash">
                    <select name="wtd-method" id="wtd-method" class="select">
                        <option value="PAYPAL">Paypal</option>
                        <option value="BANK">Bank transfer (NAIRA)</option>
                        <option value="AIRTIME">Airtime</option>
                    </select>
                    <div class="form-group">
                        <input type="text" value="{{old('account')}}" name="account" id="account" class="form-input" placeholder="paypal email">

                    </div>
                    <div class="form-group">
                        <select name="currency" id="" class="small-select">
                            <option value="USD">USD</option>
                        </select>
                        <input type="number" value="{{old('amount')}}" min="1" max="10000000" name="amount" class="form-input" placeholder="Amount $5 - $1000">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="form-input submit-button" value="Request Withdrawal">
                    </div>
                </div>
            </form>
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
    document.querySelector('#wtd-method').onchange = (e) => {
        const method = e.target.value
        document.querySelector('#account').value = ''
        if (method === 'BANK') {
            document.querySelector('#account').placeholder = 'Account Number, Account Name, Bank Name'
        }
        if (method === 'AIRTIME') {
            document.querySelector('#account').placeholder = 'Mobile Number, Network Provider'
        }
        if (method === 'PAYPAL') {
            document.querySelector('#account').placeholder = 'Paypal email'
        }

        console.log('DEDEDEDED', e.target.value)
    }

</script>

@endsection

<div class="nav-container">
    <nav class="nav">
        <div class="logo-container">
            <a href={{ url('/', []) }} class="logo-link">
                {{config('app.name')}}
            </a>
        </div>

        <div class="nav-inner">
            <ul class="nav-ul">
                @auth
                <li class="nav-li">
                    <a href="{{ url('/dashboard') }}" class="nav-link">
                        <span class="nav-icon material-symbols-outlined">dashboard</span>
                        <span class="nav-name">Dashboard</span>
                    </a>
                </li>

                <li class="nav-li">
                    <a href="{{ route('referrals') }}" class="nav-link">
                        <span class="nav-icon material-symbols-outlined">diversity_3</span>
                        <span class="nav-name">Referrals</span>
                    </a>
                </li>

                <li class="nav-li">
                    <a href="{{ url('/wallet') }}" class="nav-link">
                        <span class="nav-icon material-symbols-outlined">account_balance_wallet</span>
                        <span class="nav-name">Wallet</span>
                    </a>
                </li>

                @else
                @if (Route::has('login'))
                <li class="nav-li">
                    <a href="{{ route('login') }}" class="nav-link">Log in</a>
                </li>
                @endif
                @if (Route::has('register'))
                <li class="nav-li">
                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                </li>
                @endauth
                @endif
            </ul>
            <div class="nav-footing">
                &copy; {!!date('Y'). ' &bull; ' .config('app.name')!!}
            </div>
        </div>
    </nav>
</div>

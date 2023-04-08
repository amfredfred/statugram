<div class="nav-container">
    <nav class="nav">
        <div class="logo-container">
            <div class="space-between">
                <a href={{ url('/', []) }} class="logo-link">
                    {{config('app.name')}}
                </a>
                <span class="nav-icon material-symbols-outlined dropdown-menu">dashboard</span>
                <script>
                    document.querySelector('.dropdown-menu').onclick = () => {
                        document.querySelector('.nav-inner').classList.toggle('dropdown-menu-show')
                    }
                    window.addEventListener('mouseup', (e) => {
                        if (e.target !== document.querySelector('.nav-inner') && document.querySelector('.nav-inner').contains(e.target) !== true) {
                            document.querySelector('.nav-inner').classList.remove('dropdown-menu-show')
                        }
                    })
                </script>
            </div>
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
                    <a href="{{ url('/withdraw') }}" class="nav-link">
                        <span class="nav-icon material-symbols-outlined">account_balance_wallet</span>
                        <span class="nav-name">withdraw</span>
                    </a>
                </li>

                <li class="nav-li">
                    <a href="" class="nav-link">
                        @csrf
                        <span class="nav-icon material-symbols-outlined">more_horiz</span>
                        <button type="submit" class="nav-name">Coming Soon</button>
                    </a>
                </li>


                <li class="nav-li">
                    <form class="nav-link alert alert-danger" action="{{route('logout')}}" method="POST">
                        @csrf
                        <span class="nav-icon material-symbols-outlined">logout</span>
                        <button type="submit" class="nav-name">Logout</button>
                    </form>
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

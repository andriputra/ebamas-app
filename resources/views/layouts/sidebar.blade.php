<aside class="sidebar" id="Sidebar">
    <div class="sidebar-brand">
        <a href="{{ url('/') }}">
            <img src="{{ asset('img/logo.png')}}" alt="logo" class="img-fluid"/>
        </a>
    </div>
    @guest
    <ul class="sidebar-menu">
        <li class="sidebar-menu-item"><a href="{{ route('login') }}"><i class="fa fa-arrow-right-to-bracket"></i>Login</a></li>
        <li class="sidebar-menu-item"><a href="{{ route('register') }}"><i class="fa fa-user"></i>Register</a></li>
    </ul>
    @else
    <ul class="sidebar-menu">
    <li class="sidebar-menu-item @if(request()->is('dashboard')) active @endif"><a href="/dashboard"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="sidebar-menu-item @if(request()->is('master-data')) active @endif"><a href="/master-data"><i class="fa fa-database"></i>Master Data</a></li>
        <li class="sidebar-menu-item @if(request()->is('invoice')) active @endif"><a href="/invoice"><i class="fa-solid fa-file-invoice-dollar"></i>Invoice</a></li>
        <li class="sidebar-menu-item @if(request()->is('surat-jalan')) active @endif"><a href="/surat-jalan"><i class="fa-solid fa-road"></i>Surat Jalan</a></li>
        <li class="sidebar-menu-item @if(request()->is('pajak')) active @endif"><a href="/pajak"><i class="fa-solid fa-business-time"></i>Perpajakan</a></li>
        <li class="sidebar-menu-item @if(request()->is('kwitansi')) active @endif"><a href="/kwitansi"><i class="fa-solid fa-cash-register"></i>Kwitansi</a></li>
    </ul>
    @endguest
    <div class="developed">developed by:<a href="https://fastwork.id/user/agusandri/web-development-69710363" target="_blank"> Andriputra</a></div>
</aside>

<li class="nav-item">
    <a href="{{ route('categories.index') }}" class="nav-link {{ Request::is('categories*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Categories</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('companies.index') }}" class="nav-link {{ Request::is('companies*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Companies</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('branches.index') }}" class="nav-link {{ Request::is('branches*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Branches</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Users</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('admins.index') }}" class="nav-link {{ Request::is('admins*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Admins</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('languages.index') }}" class="nav-link {{ Request::is('languages*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Languages</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('cashbackOffers.index') }}" class="nav-link {{ Request::is('cashbackOffers*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Cashback Offers</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('cashbackCoupons.index') }}" class="nav-link {{ Request::is('cashbackCoupons*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Cashback Coupons</p>
    </a>
</li>

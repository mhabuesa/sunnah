<ul class="nav nav-tabs nav-tabs-alt" role="tablist">
    <li class="nav-item" role="presentation">
        <a href="{{route('admin.settings.app.core')}}" class="nav-link {{ request()->routeIs('admin.settings.app.core') ? 'active' : '' }}">Core Setting</a>
    </li>
    <li class="nav-item" role="presentation">
         <a href="{{route('admin.settings.app.invoice')}}" class="nav-link {{ request()->routeIs('admin.settings.app.invoice') ? 'active' : '' }}">Invoice Setting</a>
    </li>
    <li class="nav-item" role="presentation">
         <a href="{{route('admin.settings.app.invoice')}}" class="nav-link {{ request()->routeIs('admin.settings.app.invoice') ? 'active' : '' }}">Payment Method</a>
    </li>
    <li class="nav-item" role="presentation">
         <a href="{{route('admin.settings.app.invoice')}}" class="nav-link {{ request()->routeIs('admin.settings.app.invoice') ? 'active' : '' }}">Delivery Method</a>
    </li>
</ul>

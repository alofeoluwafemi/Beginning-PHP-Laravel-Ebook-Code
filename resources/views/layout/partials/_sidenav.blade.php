<!-- Sidebar -->
<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading">{{config('app.name')}}</div>
    <div class="list-group list-group-flush">
        <a href="{{route('inventory.home')}}" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="{{route('inventory.all')}}" class="list-group-item list-group-item-action bg-light">View Inventories</a>
        <a href="{{route('inventory.create')}}" class="list-group-item list-group-item-action bg-light">New Inventory</a>
        <a href="{{route('inventory.trash')}}" class="list-group-item list-group-item-action bg-light">Trash</a>
        <a href="#" class="list-group-item list-group-item-action bg-light" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </a>
    </div>
</div>
<!-- /#sidebar-wrapper -->
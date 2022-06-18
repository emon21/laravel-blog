<div class="list-group col-sm-3 mt-2">
    <h4 class="text-white p-2" style="background: rgb(17, 20, 49)">User Dashboard</h4>
    <a href="{{ route('user.dashboard') }}"
        class="list-group-item list-group-item-action {{ Route::is('user') ? 'active' : '' }}"><i
            class="fas fa-list"></i>
        &nbsp;Home</a>
    <a href="#" class="list-group-item list-group-item-action "><i class="fa fa-wrench" aria-hidden="true"></i>
        &nbsp;User Profile</a>
    <a href="" class="list-group-item list-group-item-action"><i class="fa fa-cog fa-1x"></i>
        &nbsp;User Setting</a>

    <a href="javascript:void(0)" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();"
        class="list-group-item list-group-item-action bg-danger text-white">
        <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
    </a>
    {{-- <a href="javascript:void(0)" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"
        class="btn btn-danger ml-auto w-50 list-group-item list-group-item-action">
        <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout

    </a> --}}

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>

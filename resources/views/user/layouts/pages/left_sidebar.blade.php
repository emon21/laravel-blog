<div class="list-group col-sm-3 mt-2">
    <h4 class="text-white p-2" style="background: rgb(17, 20, 49)">User Dashboard</h4>
    <a href="{{ route('user') }}"
        class="list-group-item list-group-item-action {{ Route::is('user') ? 'active' : '' }}"><i
            class="fas fa-list"></i>
        &nbsp;Home</a>
    <a href="#" class="list-group-item list-group-item-action "><i class="fa fa-wrench" aria-hidden="true"></i>
        &nbsp;User Profile</a>
    <a href="{{ route('UserSetting') }}"
        class="list-group-item list-group-item-action {{ Route::is('UserSetting') ? 'active' : '' }}"><i
            class="fa fa-cog fa-1x"></i>
        &nbsp;User Setting</a>
</div>

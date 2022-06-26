<div class="list-group col-sm-2">
    <h4 class="text-white p-2" style="background: rgb(17, 20, 49)">User Dashboard</h4>
    <div class="card mb-2 text-center">
        <div class="card-header">user Profile</div>
        <div class="card-body text-center">
            <div style="width:85px;height:85px;overflow:hidden" class="m-auto">
                {{-- <img src="{{ asset($user->image) }}" class="img-fluid rounded-circle img-rounded" alt=""> --}}

                <img src="@if ($currentUser->image) {{ asset($currentUser->image) }} @else {{ asset('backend/user/user.png') }} @endif"
                    class="img-fluid rounded-circle img-rounded" alt="">
            </div>

            <div class="mt-1">
                <h4>{{ $currentUser->name }}</h4>
                <p>{{ $currentUser->email }}</p>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('UserProfile') }}" class="btn btn-outline-success"><i class="fa fa-cog fa-1x"></i> User
                Profile</a>
        </div>
    </div>
    <a href="{{ route('user.dashboard') }}"
        class="list-group-item list-group-item-action {{ Route::is('user.dashboard') ? 'active' : '' }}"><i
            class="fas fa-list"></i>
        &nbsp;User Dashboard</a>
    {{-- <a href="#" class="list-group-item list-group-item-action "><i class="fa fa-wrench" aria-hidden="true"></i>
        &nbsp;User Profile</a>
    <a href="" class="list-group-item list-group-item-action"><i class="fa fa-cog fa-1x"></i>
        &nbsp;User Setting</a> --}}
    <a href="{{ route('user.post') }}"
        class="list-group-item list-group-item-action {{ Route::is('user.post') ? 'active' : '' }}"><i
            class="fa fa-plus"></i>
        &nbsp;Create Post</a>
    <a href="{{ route('postlist') }}"
        class="list-group-item list-group-item-action {{ Route::is('postlist') ? 'active' : '' }}"><i
            class="fa fa-history" aria-hidden="true"></i>
        &nbsp;User Post</a>

    <a href="javascript:void(0)" onclick="event.preventDefault();
   document.getElementById('logout-form').submit();"
        class="list-group-item list-group-item-action bg-danger text-white">
        <i class="fa fa-sign-in" aria-hidden="true"></i> Logout
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

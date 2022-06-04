@include('user.layouts.pages.styles')

<div class="col-sm-2 d-block mx-auto" style="margin-top:15% ">
    <div class="card">
        <div class="card-header">
            <h2>User Login</h2>
        </div>
        <div class="card-body">

            <div class="container">

                <form action="/action_page.php">
                    <div class="form-group mb-2">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control mt-1" id="email" placeholder="Enter email" name="email">
                    </div>
                    <div class="form-group mb-2">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control mt-1" id="pwd" placeholder="Enter password"
                            name="pswd">
                    </div>
                    <div class="form-group form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="remember"> Remember me
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Login</button>
                </form>
            </div>
        </div>
        {{-- <div class="card-footer">Footer</div> --}}
    </div>
</div>

@include('user.layouts.pages.scripts')

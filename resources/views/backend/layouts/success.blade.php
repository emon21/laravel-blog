@if (session('status'))
    <div class="col-md-6 text-center">
        <span class="mt-2 text-success " style="font-weight: bold"> {{ session('status') }}</span>
    </div>
@endif

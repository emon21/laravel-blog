@if (session('error'))
    <div class="col-md-6 text-center">
        <span class="mt-2 text-danger " style="font-weight: bold"> {{ session('error') }}</span>
    </div>
@endif

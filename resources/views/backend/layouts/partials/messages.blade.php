@if ($errors->any())
    <div class="alert alert-danger">
        <uldiv>
            @foreach ($errors->all() as $error)
                <span>{{ $error }}</span>
            @endforeach
        </uldiv>
    </div>
@endif

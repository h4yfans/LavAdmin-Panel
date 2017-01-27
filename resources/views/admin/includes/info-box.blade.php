@if(Session::has('success'))
    <div class="callout callout-success">
        <h4></h4>
        <p>Değişiklikler başarıyla güncellendi.</p>
    </div>
@endif

@if(Session::has('errors'))
    <div class="col-md-12">
        <div class="callout callout-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    </div>
@endif


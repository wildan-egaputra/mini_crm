@if (!empty(session('success')))
    <div class="alert alert-success " role="alert">
        {{ session('success') }}
    </div> 
    
@endif

@if (!empty(session('error')))
    <div calss="alert alert-danger " role="alert">
        {{ session('error') }}
    </div>
@endif
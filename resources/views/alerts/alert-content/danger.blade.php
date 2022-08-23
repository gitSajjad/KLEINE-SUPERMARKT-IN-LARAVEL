@if(session('alert-content-danger'))
<div class="alert alert-danger" role="alert">
    {{ session('alert-content-danger')  }}
  </div>
@endif

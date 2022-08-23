@if($errors->any())
<div class="mb-2 alert alert-danger">

    @foreach ($errors->all() as $error)
    <small class="form-text text-danger">
        {{$error}}
    </small>
    @endforeach
     </div>
@endif

@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger"> 
        <i class="fa fa-warning" aria-hidden="true"></i> {{session('error')}}
    </div>
@endif

<script>
    $(".alert").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert").slideUp(500);
    });
</script>
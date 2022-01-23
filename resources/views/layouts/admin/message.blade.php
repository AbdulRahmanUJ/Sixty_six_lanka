@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger p-2">
            {{$error}}
        </div>
    @endforeach
@endif

@if (session('success'))
    <div class="alert alert-success p-2">
        {{session('success')}}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger p-2"> 
        {{session('error')}}
    </div>
@endif

<script>
    $(".alert").fadeTo(4000, 500).slideUp(500, function(){
    $(".alert").slideUp(500);
    });
</script>
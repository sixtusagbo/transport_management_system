@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            <h5 class="text-bold text-light">{{$error}}</h5>
            <img src="close.soon" style="display:none;" onerror="(function(el){ setTimeout(function(){ el.parentNode.parentNode.removeChild(el.parentNode); },4000 ); })(this);" />
        </div>
    @endforeach
@endif

@if (session('success'))
    <div class="d-flex justify-content-start">
      <div class="alert alert-success">
          <h5 class="text-bold text-light">{{session('success')}}</h5>
          <img src="close.soon" style="display:none;" onerror="(function(el){ setTimeout(function(){ el.parentNode.parentNode.removeChild(el.parentNode); },2000 ); })(this);" />
      </div>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        <h5 class="text-bold text-light">{{session('error')}}</h5>
        <img src="close.soon" style="display:none;" onerror="(function(el){ setTimeout(function(){ el.parentNode.parentNode.removeChild(el.parentNode); },3000 ); })(this);" />
    </div>
@endif
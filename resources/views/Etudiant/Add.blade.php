@extends("layouts.app")
@section('content')
{!! Form::open(['url' => 'etudiant/Add',"method"=>"Post"])!!}
  <div class="container">
  <div class="form-group">
    <label for="exampleInputEmail1">Nom</label>
    <input type="text" class="form-control" id="nom" name="nom" aria-describedby="emailHelp" placeholder="Enter nom">
    @if($errors->has('nom'))
    <div class="error">{{ $errors->first('nom') }}</div>
@endif
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Prenom</label>
    <input type="text" class="form-control" id="prenom" name="prenom" aria-describedby="emailHelp" placeholder="Enter Prenom">
  
  @if($errors->has('prenom'))
    <div class="error">{{ $errors->first('prenom') }}</div>
@endif
</div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Email">
  
  @if($errors->has('email'))
    <div class="error">{{ $errors->first('email') }}</div>
@endif
</div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    @if($errors->has('password'))
    <div class="error">{{ $errors->first('password') }}</div>
@endif
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
  </div>
  {!! Form::close() !!}

@endsection
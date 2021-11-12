@extends("layouts.app")
@section('content')
        {!! Form::open(['url' => ['etudiant/update'],"method"=>"PUT",])!!}
  <div class="container">
  <input value="{{$etudiant->id}}" id="id" name="id" type="hidden" class="form-control" required>
  <div class="form-group">
    <label for="exampleInputEmail1">Nom</label>
    <input type="text"value="{{$etudiant->nom}}" class="form-control" id="nom" name="nom" aria-describedby="emailHelp" placeholder="Enter nom" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Prenom</label>
    <input type="text" value="{{$etudiant->prenom}}" class="form-control" id="prenom" name="prenom" aria-describedby="emailHelp" placeholder="Enter Prenom" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" value="{{$etudiant->email}}" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Email" required>
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
  </div>
  {!! Form::close() !!}

@endsection
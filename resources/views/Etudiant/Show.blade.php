@extends("layouts.app")
@section('content')
<div class="card text-center" >
    <h4 class="card-title">Nom  :{{$etudiant->nom}}</h4>
    <h4 class="card-title">Prenom  :{{$etudiant->prenom}}</h4>
    <h4 class="card-title">Email  :{{$etudiant->email}}</h4>
    
</div>
@endsection
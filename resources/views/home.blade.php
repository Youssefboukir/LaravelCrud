@extends("layouts.app")
@section('content')

<body>
    
    <div class="container">
    <div class="col-sm-6">
        <a href="/Addetudiant" class="btn btn-success"> Neveau</a>
    </div><br>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>prenom</th>
                    <th>email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($etudiants as $etd)
                <tr>
                    <td>{{$etd->id}}</td>
                    <td>{{$etd->nom}}</td>
                    <td>{{$etd->prenom}}</td>
                    <td>{{$etd->email}}</td>
                    <td>
                    <a href='etudiant/edit/{{$etd->id}}' class="edit" >Edit</a>
                    <a href='etudiant/delete/{{$etd->id}}' class="delete" >Delete</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

    </div>



</body>
@endsection
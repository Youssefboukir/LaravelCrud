<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Etudiants;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class EtudiantController extends Controller
{
    protected $etudiants;
    protected $users;
    public function __construct()
    {
        $this->etudiants=new Etudiants;
        $this->users=new User;
    }
    public function index()
    {   $type=Auth::user()->usertype;
        if($type=='admin'){
        $etudiants=$this->etudiants::all();
        return view('home')->with("etudiants",$etudiants);
        }else{
            $etudiant=$this->etudiants::where("id_user",Auth::user()->id)->first();
            return view('Etudiant.Show')->with("etudiant",$etudiant);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $validator = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        
        $this->users->email=$request->input("email");
        $this->users->password=Hash::make($request->input("password"));
        $this->users->usertype="etudiant";
        $this->users->save();
        $this->etudiants->nom=$request->input("nom");
        $this->etudiants->prenom=$request->input("prenom");
        $this->etudiants->email=$request->input("email");
        $this->etudiants->id_user= $this->users->id;       
        $this->etudiants->save();

       return redirect("home");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $etudiant=$this->etudiants::find($id);
        return view("Etudiant.edit")->with('etudiant',$etudiant);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
        ]);
        $finddata=$this->etudiants::find($request->input("id"));
        $finddata->nom=$request->input("nom");
        $finddata->prenom=$request->input("prenom");
        $finddata->email=$request->input("email");
        $finddata->save();
        return redirect("home");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Delete($id)
    { 
        $finddata=$this->etudiants::find($id);
        $finddata2=$this->users::find($finddata->id_user);
        $finddata2->delete();
        $finddata->delete();
        return redirect("home");

    }
}

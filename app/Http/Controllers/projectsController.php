<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class projectsController extends Controller
{
    //
    public function llistat() {    	
    	$projects = Project::all();
    	return view('projects.llistat',["projects"=>$projects]);   	
    }

    public function formAdd() {

    	return view('projects.alta');
    }

    public function add(Request $request) {
   	
    	$request->validate([
        'nom' => 'required',
        'descripcio' => 'required',
        'dataInici' => 'required|date|after:now',
        'dataFi' => 'required|date|after:dataInici',
        'estat' => 'required|numeric',
        ]);

    	$nom = $request->nom;   	
        $descripcio = $request->descripcio;
        $dataInici = $request->dataInici;
        $dataFi = $request->dataFi;
        $estat = $request->estat;

    	$project = new Project;
    	$project->nom = $nom;
        $project->descripcio = $descripcio;
        $project->dataInici = $dataInici;
        $project->dataFi = $dataFi;
        $project->estat = $estat;

        
    	$project->save();
    	return redirect('/projectes')->with('status','Alta correcta');

    }

    public function delete($id) {
    	
    	$project = Project::findOrFail($id);
    	$project->delete();
    	return redirect('/projectes')->with('status','Projecte esborrat');

    }

    public function formEdit($id) {
    	$project = Project::findOrFail($id);

    	return view('projects.edit',['project'=>$project]);
    }

    public function edit(Request $request, $id) {
        
        $project = Project::findOrFail($id);
        
        $nom = $request->nom;   	
        $descripcio = $request->descripcio;
        $dataInici = $request->dataInici;
        $dataFi = $request->dataFi;
        $estat = $request->estat;

    	$project->nom = $nom;
        $project->descripcio = $descripcio;
        $project->dataInici = $dataInici;
        $project->dataFi = $dataFi;
        $project->estat = $estat;

        $project->save();
    	return redirect('/projectes')->with('status','Actualització correcta');
    }

    
}

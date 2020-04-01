<?php

namespace App\Http\Controllers;
use App\Product;

use Illuminate\Http\Request;

class productsController extends Controller
{
    //
    public function llistat() {    	
    	//$productes = Product::all();
        $productes = Product::paginate(5);
    	return view('productes.llistat',["productes"=>$productes]);   	
    }

    public function formAdd() {
    	// echo "form alta";
    	return view('productes.alta');
    }

    public function add(Request $request) {
    	
        // Una forma de personalitzar els missatges és passant
        // al mètode validate un array associatiu amb el conjunt
        // de missatges personalitzats.
        // Es pot fer a nivell de regla: required
        // o ser més específic a nivell de camp: preu.numeric
        $messages = [
        'required' => 'El camp :attribute és obligatori.',
        'preu.numeric' => 'El preu ha de ser un número',
        'preu.min' => 'El preu ha de ser positiu!'

        ];
        $request->validate([
        'nom' => 'required|max:25',
        'preu' => 'required|numeric|min:0',
        'descripcio' => 'required|max:256',
        ],$messages);

    	$nom = $request->nom;
    	$preu = $request->preu;
    	$descripcio = $request->descripcio;

    	$producte = new Product;
    	$producte->nom = $nom;
    	$producte->preu = $preu;
    	$producte->descripcio = $descripcio;
    	$producte->save();
    	return redirect('/productes')->with('status','Alta correcta');

    }

    public function delete($id) {
    	
    	$producte = Product::findOrFail($id);
    	$producte->delete();
    	return redirect('/productes')->with('status','Producte esborrat');

    }

     public function formEdit($id) {
    	$producte = Product::findOrFail($id);

    	return view('productes.edit',['producte'=>$producte]);
    }



    public function edit(Request $request, $id) {
        
        $producte = Product::findOrFail($id);
        
        $request->validate([
        'nom' => 'required|max:25',
        'preu' => 'required|numeric|min:0',
        'descripcio' => 'required|max:256',
        ]);

        $nom = $request->nom;
        $preu = $request->preu;
        $descripcio = $request->descripcio;

        $producte->nom = $nom;
        $producte->preu = $preu;
        $producte->descripcio = $descripcio;
        $producte->save();
    	return redirect('/productes')->with('status','Actualització correcta');
    }

   
}

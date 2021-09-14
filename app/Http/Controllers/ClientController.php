<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ClientController extends Controller
{
   
    public function welcome(){
        $produits = Product::where('status',1)->orderBy('created_at')
        ->offset(0)->limit(6)->get(); 
        return view('welcome') ->with('produits',$produits);
    }
    public function contact(){
        return view('client.contact');
    }
    public function apropos(){
        return view('client.apropos');
    }   
    public function produits(){
        $produits = Product::where('status',1)->orderBy('created_at')->paginate(4);
        return view('client.produits')  ->with('produits',$produits);
    }

   

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function produits(){
        $products = Product::get();
        return view("admin.produits.index")->with('products',$products);
    }

    public function addProduit(){
      
        return view("admin.produits.add_product");
    }


    public function saveProduit(Request $request){
        $this->validate($request , [ 
            'product_name'=>'required|unique:products',
            'product_price'=>'required',          
            'product_image'=>'image|nullable|max:1999',
        
        ]);

       if($request->hasFile('product_image')){
           //file Name To Store
           $fileNameWithExt = $request->file('product_image')->getClientOriginalName();
           $fileName =  pathinfo($fileNameWithExt ,   PATHINFO_FILENAME  );
           $extension = $request->file('product_image')->getClientOriginalExtension();
           $fileNameToStore = $fileName.'_'.time().'.'.$extension;
           
           //upload
           $path = $request->file('product_image')->storeAs( 'public/product_images' , $fileNameToStore);

       }else{
           $fileNameToStore ="noimage.jpg";
       }

    
        $product = new Product();

        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');
        $product->status = 1;
        $product->product_image = $fileNameToStore;

        $product->save();
        return redirect('/admin/ajouter-produit')->with('status', 'Le produit '.
        $product->product_name.' a été ajouté avec succès');
        
    }
    public function editProduit($id){
        $product = Product::find($id); 
        return view("admin.produits.edit_product")->with( 'product',$product );
    }

    public function updateProduit(Request $request){   

        $this->validate($request , [ 
            'product_name'=> ['required' , Rule::unique('products')->ignore($request->input('id'))],
            'product_price'=>'required',
            'product_image'=>'image|nullable|max:1999',
        
        ]);

        $product =   Product::find($request->input('id')) ;

        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');

       if($request->hasFile('product_image')){
           //file Name To Store
           $fileNameWithExt = $request->file('product_image')->getClientOriginalName();
           $fileName =  pathinfo($fileNameWithExt ,   PATHINFO_FILENAME  );
           $extension = $request->file('product_image')->getClientOriginalExtension();
           $fileNameToStore = $fileName.'_'.time().'.'.$extension;
           
           //upload
           $path = $request->file('product_image')->storeAs( 'public/product_images' , $fileNameToStore);

           //Update
           if($product->product_image != 'noimage.jpg'){

            Storage::delete('public/product_images/'.$product->product_image);
           }
           $product->product_image  = $fileNameToStore;

       } 
     

        $product->update();
        return redirect('/admin/produits')->with('status', 'Le produit '.
        $product->product_name.' a été modifié avec succès');
       
    }


    
    public function deleteProduit($id){   
        $product = Product::findOrFail($id);
        if($product->product_image != 'noimage.jpg'){
            Storage::delete('public/product_images/'.$product->product_image);
        }
        $product->delete();     
        return redirect('/admin/produits')->with('status', 'Le produit '.
        $product->product_name.' a été supprimé avec succès');
       
    }
    public function disableProduit($id){   
        $product = Product::findOrFail($id);        
        $product->status =  0;     
        $product->update();     
        return redirect('/admin/produits')->with('status', 'Le produit '.
        $product->product_name.' a été désactivé avec succès');
    }

    public function enableProduit($id){   
        $product = Product::findOrFail($id);        
        $product->status =  1;     
        $product->update();     
        return redirect('/admin/produits')->with('status', 'Le produit '.
        $product->product_name.' a été activé avec succès');
    } 
    
}

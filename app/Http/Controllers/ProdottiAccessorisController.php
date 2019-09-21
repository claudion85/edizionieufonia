<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Casa_Editrice as CasaEditrice;
use App\Models\Categorie as Category;
use App\Models\ProdottiAccessori;
use App\Models\AttributiProdotti;
use Illuminate\Http\Request;
use Exception;
use DB;
class ProdottiAccessorisController extends Controller
{

    /**
     * Display a listing of the prodotti accessoris.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        if(\Auth::user()->isAdmin==1){

        
        $prodottiAccessoris = ProdottiAccessori::paginate(25);
        }
        else {
            $idCasa=DB::table('casa__editrices')->select('id')->where('user_id','=',\Auth::user()->id)->first();
            $prodottiAccessoris = ProdottiAccessori::where('casaeditrice','=',$idCasa->id)->paginate(25);
            
            
        }
        foreach($prodottiAccessoris as $key=>$value)
        {
           
        
        $nameCasa=CasaEditrice::where('id',$value->casaeditrice)->pluck('nome')->first();
        $nameCategoria=Category::where('id',$value->categoria)->pluck('nome')->first();
        
        $value->casaeditrice=$nameCasa;
        $value->categoria=$nameCategoria;
        
            }
          
            
      

        return view('prodotti_accessoris.index', compact('prodottiAccessoris'));
    }

    /**
     * Show the form for creating a new prodotti accessori.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Categories = Category::pluck('nome','id')->all();
        if((\Auth::user()->isAdmin==1)){
        $CasaEditrices = CasaEditrice::pluck('id','nome')->all();

        }
        else
        {
            $idCasa=CasaEditrice::where('user_id',\Auth::user()->id)->pluck('id')->first();
            $CasaEditrices = CasaEditrice::where('id',$idCasa)->pluck('id','nome')->all();
           
        }
        return view('prodotti_accessoris.create', compact('CasaEditrices','Categories'));
    }

    /**
     * Store a new prodotti accessori in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
         
            foreach($data as $key=>$value)
            {
              
                
                if(substr($key,0,5)=='attr_')
                {
                 
                    $data['attributi'][substr($key,5)]=$value;
                }
                
             
                //$data['attributi']=json_encode($data['attributi']);
            }
           
            $data['attributi']=json_encode($data['attributi']);
           
           
          
           
            
            ProdottiAccessori::create($data);

            return redirect()->route('prodotti_accessoris.prodotti_accessori.index')
                ->with('success_message', 'Prodotti Accessori was successfully added.');
        } catch (Exception $exception) {
            print_r($exception->getMessage());
            die();
            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified prodotti accessori.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $prodottiAccessori = ProdottiAccessori::with('casaeditrice','category')->findOrFail($id);

        return view('prodotti_accessoris.show', compact('prodottiAccessori'));
    }

    /**
     * Show the form for editing the specified prodotti accessori.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $prodottiAccessori = ProdottiAccessori::findOrFail($id);
        
        $attributi=json_decode($prodottiAccessori->attributi);
        
        $attributidb=AttributiProdotti::where('categoria',$prodottiAccessori->categoria)->pluck('valore','nome_attributo')->all();
      

        
       
        foreach($attributidb as $key=>$val)
        {
           
           $val=explode(',',$val);
           $attributidb[$key]=$val;  
        }
        $Categories = Category::pluck('nome','id')->all();
        if((\Auth::user()->isAdmin==1)){
        $CasaEditrices = CasaEditrice::pluck('id','nome')->all();
        }
        else{
            $idCasa=CasaEditrice::where('user_id',\Auth::user()->id)->pluck('id')->first();
            $CasaEditrices = CasaEditrice::where('id',$idCasa)->pluck('id','nome')->all();
        }

        return view('prodotti_accessoris.edit', compact('prodottiAccessori','CasaEditrices','Categories','attributi','attributidb'));
    }

    /**
     * Update the specified prodotti accessori in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
           
            foreach($data as $key=>$value)
            {
                if(substr($key,0,5)=='attr_')
                {
                 
                    $data['attributi'][substr($key,5)]=$value;
                }
                else
                {
                    $data['attributi']=array();
                }
                
                //$data['attributi']=json_encode($data['attributi']);
            }
            $data['attributi']=json_encode($data['attributi']);
          
            
            $prodottiAccessori = ProdottiAccessori::findOrFail($id);
            //$data['attributi']=implode(",",$data['attributi']);
            $prodottiAccessori->update($data);

            return redirect()->route('prodotti_accessoris.prodotti_accessori.index')
                ->with('success_message', 'Prodotti Accessori was successfully updated.');
        } catch (Exception $exception) {
            print_r($exception->getMessage());
            die();
            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified prodotti accessori from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $prodottiAccessori = ProdottiAccessori::findOrFail($id);
            $prodottiAccessori->delete();

            return redirect()->route('prodotti_accessoris.prodotti_accessori.index')
                ->with('success_message', 'Prodotti Accessori was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'nome' => 'nullable|string|min:0|max:45',
            'prezzo' => 'nullable|numeric|min:0|max:10000',
            'descrizione' => 'nullable',
            'codice' => 'nullable|string|min:0|max:45',
            'immagine' => 'nullable|string|min:0|max:45',
            'pdf' => 'nullable|string|min:0|max:45',
            'casaeditrice' => 'nullable',
            'attributi' => 'nullable',
            '*'=>'nullable',
            'categoria' => 'nullable',
            'quantita'=>'nullable',
            'peso'=>'nullable',
            'valutazione_media' => 'nullable|numeric|min:0|max:9', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }


    public function populateAttributiAjax(Request $request)
    {
       
            //$prodottiAccessori = ProdottiAccessori::findOrFail($request->idprodacc);
            //$CasaEditrices = CasaEditrice::pluck('id','nome')->all();
            //$Categories = Category::pluck('nome','id')->all();
            if((\Auth::user()->isAdmin==1)){
            $attributi=DB::table('attributi_prodottis')->where('categoria',$request->categoria)->where('casaeditrice',$request->casaeditrice)->get();
            }
            else{
                $idCasa=CasaEditrice::where('user_id',\Auth::user()->id)->pluck('id')->first();
                $attributi=DB::table('attributi_prodottis')->where('categoria',$request->categoria)->where('casaeditrice',$idCasa)->get();

            }
            
            //$data=view('prodotti_accessoris.form',compact('prodottiAccessori','attributi','CasaEditrices','Categories'))->render();
            return response()->json(['success'=>$attributi]);
            //return response()->json($request->all());
            
        
       
    }

}

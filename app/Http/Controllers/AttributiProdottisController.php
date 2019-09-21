<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Casa_Editrice as CasaEditrice;
use App\Models\Categorie as Category;
use App\Models\AttributiProdotti;
use Illuminate\Http\Request;
use Exception;
use DB;

class AttributiProdottisController extends Controller
{

    /**
     * Display a listing of the attributi prodottis.
     *
     * @return Illuminate\View\View
     */
    public function index()
    { 
        if((\Auth::user()->isAdmin==1)){
        $attributiProdottis = AttributiProdotti::paginate(25);
        foreach($attributiProdottis as $attributo=>$valore)
        {
         
        $nomecasa=CasaEditrice::where('id',$valore->casaeditrice)->pluck('nome')->first();
        $valore->casaeditrice=$nomecasa;

        }
        
      

        }
        else {
        $idCasa=DB::table('casa__editrices')->select('id')->where('user_id','=',\Auth::user()->id)->first();
        $attributiProdottis = AttributiProdotti::where('casaeditrice',$idCasa->id)->paginate(25);
        foreach($attributiProdottis as $attributo=>$valore)
        {
         
        $nomecasa=CasaEditrice::where('id',$valore->casaeditrice)->pluck('nome')->first();
        $valore->casaeditrice=$nomecasa;

        }
        }

        return view('attributi_prodottis.index', compact('attributiProdottis'));
    }

    /**
     * Show the form for creating a new attributi prodotti.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Categories = Category::pluck('nome','id')->all();
        if((\Auth::user()->isAdmin==1)){
        $CasaEditrices = CasaEditrice::pluck('id','id')->all();
        }
        else 
        {
            $idCasa=CasaEditrice::where('user_id',\Auth::user()->id)->pluck('id')->first();
            $CasaEditrices = CasaEditrice::where('id',$idCasa)->pluck('id','nome')->all();
        }
        return view('attributi_prodottis.create', compact('Categories','CasaEditrices'));
    }

    /**
     * Store a new attributi prodotti in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
       
            $case=CasaEditrice::pluck('id')->all();
            print_r($case);
            foreach($case as $k=>$v)
            {
                DB::table('attributi_prodottis')->insert(['nome_attributo'=>$data['nome_attributo'],'valore'=>$data['valore'],'categoria'=>$data['categoria'],'casaeditrice'=>$v,'created_at'=>now()]);
            }
            
           // AttributiProdotti::create($data);

            return redirect()->route('attributi_prodottis.attributi_prodotti.index')
                ->with('success_message', 'Attributi Prodotti was successfully added.');
        } catch (Exception $exception) {
            print_r($exception->getMessage());
            die();
            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified attributi prodotti.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $attributiProdotti = AttributiProdotti::with('category','casaeditrice')->findOrFail($id);

        return view('attributi_prodottis.show', compact('attributiProdotti'));
    }

    /**
     * Show the form for editing the specified attributi prodotti.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $attributiProdotti = AttributiProdotti::findOrFail($id);
        $Categories = Category::pluck('nome','id')->all();

       if((\Auth::user()->isAdmin==1)){
        $CasaEditrices = CasaEditrice::pluck('id','id')->all();
        }
        else 
        {
            $idCasa=CasaEditrice::where('user_id',\Auth::user()->id)->pluck('id')->first();
            $CasaEditrices = CasaEditrice::where('id',$idCasa)->pluck('id','nome')->all();
        }

        return view('attributi_prodottis.edit', compact('attributiProdotti','Categories','CasaEditrices'));
    }

    /**
     * Update the specified attributi prodotti in the storage.
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
            
            $attributiProdotti = AttributiProdotti::findOrFail($id);
            $attributiProdotti->update($data);

            return redirect()->route('attributi_prodottis.attributi_prodotti.index')
                ->with('success_message', 'Attributi Prodotti was successfully updated.');
        } catch (Exception $exception) {
           
            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified attributi prodotti from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $attributiProdotti = AttributiProdotti::findOrFail($id);
            $attributiProdotti->delete();

            return redirect()->route('attributi_prodottis.attributi_prodotti.index')
                ->with('success_message', 'Attributi Prodotti was successfully deleted.');
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
                'nome_attributo' => 'nullable|string|min:0|max:45',
            'valore' => 'nullable',
            'categoria' => 'required',
            'casaeditrice' => 'nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}

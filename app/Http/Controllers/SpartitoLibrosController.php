<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Autori;
use App\Models\Casa_Editrice as CasaEditrice;
use App\Models\Categorie;
use App\Models\SpartitoLibro;
use Illuminate\Http\Request;
use Exception;
use DB;
use App\Http\Controllers\Auth;

class SpartitoLibrosController extends Controller
{

    /**
     * Display a listing of the spartito libros.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $spartitoLibros;
    

       if((\Auth::user()->isAdmin==1))
        {
        $spartitoLibros = SpartitoLibro::paginate(25);
        }

        else if((\Auth::user()->isVendor==1))
        {
            $idCasa=DB::table('casa__editrices')->select('id')->where('user_id','=',\Auth::user()->id)->first();
            $spartitoLibros = SpartitoLibro::where('casa_editrice','=',$idCasa->id)->paginate(25);
          
            
        }

        return view('spartito_libros.index', compact('spartitoLibros'));
    }

    

    /**
     * Show the form for creating a new spartito libro.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Categories = Categorie::pluck('nome','id')->all();
        if((\Auth::user()->isAdmin==1))
        {
        $Autoris = Autori::pluck('nome','id')->all();
        
        $CasaEditrices = CasaEditrice::pluck('id','nome')->all();
        }
        else{
            $idCasa=CasaEditrice::where('user_id',\Auth::user()->id)->pluck('id')->first();
            $Autoris = Autori::where('casa_editrice',$idCasa)->pluck('nome','id')->all();
            
        
            $CasaEditrices = CasaEditrice::where('id',$idCasa)->pluck('id','nome')->all();
        }
        return view('spartito_libros.create', compact('Categories','Autoris','CasaEditrices'));
    }

    /**
     * Store a new spartito libro in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            SpartitoLibro::create($data);

            return redirect()->route('spartito_libros.spartito_libro.index')
                ->with('success_message', 'Spartito Libro was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified spartito libro.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $spartitoLibro = SpartitoLibro::with('Categorie','autori','casaeditrice')->findOrFail($id);
        
        return view('spartito_libros.show', compact('spartitoLibro'));
    }

    /**
     * Show the form for editing the specified spartito libro.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $Categories = Categorie::pluck('nome','id')->all();
        $spartitoLibro = SpartitoLibro::findOrFail($id);
        
        $autori=explode(',',$spartitoLibro->autore);

       if((\Auth::user()->isAdmin==1))
        {
        $Autoris = Autori::pluck('nome','id')->all();
        
        $CasaEditrices = CasaEditrice::pluck('id','nome')->all();
        }
        else{
            $idCasa=CasaEditrice::where('user_id',\Auth::user()->id)->pluck('id')->first();
            $Autoris = Autori::where('casa_editrice',$idCasa)->pluck('nome','id')->all();
            
        
            $CasaEditrices = CasaEditrice::where('id',$idCasa)->pluck('id','nome')->all();
        }
        return view('spartito_libros.edit', compact('spartitoLibro','Categories','Autoris','CasaEditrices'));
    }

    /**
     * Update the specified spartito libro in the storage.
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
            $data['autore']=implode(',',$data['autore']);
            
            $spartitoLibro = SpartitoLibro::findOrFail($id);
          
            $spartitoLibro->update($data);
           

            return redirect()->route('spartito_libros.spartito_libro.index')
                ->with('success_message', 'Spartito Libro was successfully updated.');
        } catch (Exception $exception) {
          
            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified spartito libro from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $spartitoLibro = SpartitoLibro::findOrFail($id);
            $spartitoLibro->delete();

            return redirect()->route('spartito_libros.spartito_libro.index')
                ->with('success_message', 'Spartito Libro was successfully deleted.');
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
                'codice_interno' => 'nullable|string|min:0|max:100',
            'nome' => 'required|string|min:1|max:100',
            'descrizione' => 'required',
            'pdf_anteprima' => 'nullable|string|min:1|max:100',
            'pdf_da_vendere' => 'nullable|string|min:1|max:100',
            'foto' => 'nullable|string|min:1|max:100',
            'categoria' => 'required',
            'ranking' => 'nullable|numeric|min:-2147483648|max:2147483647',
            'autore' => 'nullable',
            'altro'=>'nullable',
            'casa_editrice' => 'required',
            'durata' => 'required|numeric|min:-2147483648|max:2147483647',
            'pagine' => 'required|numeric|min:-2147483648|max:2147483647',
            'audio' => 'nullable|string|min:0|max:45',
            'versione' => 'required',
            'quantita' => 'required|numeric|min:-2147483648|max:2147483647',
            'peso'=>'nullable|numeric|min:0|max:90000',
            'prezzo_cartaceo' => 'nullable|numeric|min:0|max:90000',
            'prezzo_multimediale' => 'nullable|numeric|min:0|max:90000',
            'prezzo_cartaceo_multimediale' => 'nullable|numeric|min:0|max:90000',  
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}

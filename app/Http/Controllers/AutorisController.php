<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Casa_Editrice;
use App\Models\Autori;
use Illuminate\Http\Request;
use Exception;

class AutorisController extends Controller
{

    /**
     * Display a listing of the autoris.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $autoris = Autori::paginate(25);

        return view('autoris.index', compact('autoris'));
    }

    /**
     * Show the form for creating a new autori.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $CasaEditrices = Casa_Editrice::pluck('id','nome')->all();
        
        return view('autoris.create', compact('CasaEditrices'));
    }

    /**
     * Store a new autori in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Autori::create($data);

            return redirect()->route('autoris.autori.index')
                ->with('success_message', 'Autori was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified autori.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $autori = Autori::with('casaeditrice')->findOrFail($id);

        return view('autoris.show', compact('autori'));
    }

    /**
     * Show the form for editing the specified autori.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $autori = Autori::findOrFail($id);
        $CasaEditrices = Casa_Editrice::pluck('id','nome')->all();

        return view('autoris.edit', compact('autori','CasaEditrices'));
    }

    /**
     * Update the specified autori in the storage.
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
            
            $autori = Autori::findOrFail($id);
          
            #$pathFoto=$request->foto->storeAs('foto',$autori->nome.$request->foto->getClientOriginalName());
            #$data['foto']=$pathFoto;
           
            #$pathCV=$request->url_cv->storeAs('cv',$autori->nome.$request->url_cv->getClientOriginalName());
            #$data['url_cv']=$pathCV;
            
            $autori->update($data);

            return redirect()->route('autoris.autori.index')
                ->with('success_message', 'Autori was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.',$exception->getMessage()]);
        }        
    }

    /**
     * Remove the specified autori from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $autori = Autori::findOrFail($id);
            $autori->delete();

            return redirect()->route('autoris.autori.index')
                ->with('success_message', 'Autori was successfully deleted.');
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
                'nome' => 'required|string|min:1|max:45',
            'cognome' => 'required|string|min:1|max:45',
            'descrizione' => 'nullable',
            'url_cv' => 'nullable',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'url_pagina_personale'=>'nullable|string|min:1|max:45',
            'percentuale' => 'nullable|numeric|min:0|max:100',
            'casa_editrice' => 'nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Exception;

class CategoriesController extends Controller
{

    /**
     * Display a listing of the categories.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $categories = Categorie::paginate(25);

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new categorie.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('categories.create');
    }

    /**
     * Store a new categorie in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Categorie::create($data);

            return redirect()->route('categories.categorie.index')
                ->with('success_message', 'Categorie was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified categorie.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $categorie = Categorie::findOrFail($id);

        return view('categories.show', compact('categorie'));
    }

    /**
     * Show the form for editing the specified categorie.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $categorie = Categorie::findOrFail($id);
        

        return view('categories.edit', compact('categorie'));
    }

    /**
     * Update the specified categorie in the storage.
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
            
            $categorie = Categorie::findOrFail($id);
            $categorie->update($data);

            return redirect()->route('categories.categorie.index')
                ->with('success_message', 'Categorie was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified categorie from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $categorie = Categorie::findOrFail($id);
            $categorie->delete();

            return redirect()->route('categories.categorie.index')
                ->with('success_message', 'Categorie was successfully deleted.');
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
            'descrizione' => 'required', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}

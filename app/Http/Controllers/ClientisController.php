<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Clienti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Exception;
use DB;

class ClientisController extends Controller
{

    /**
     * Display a listing of the clientis.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $clientis = Clienti::with('user')->paginate(25);

        return view('clientis.index', compact('clientis'));
    }

    /**
     * Show the form for creating a new clienti.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $users = User::pluck('id','id')->all();
    
        return view('clientis.create', compact('users'));
    }

    /**
     * Store a new clienti in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            $password=Hash::make($request['password']);
            print_r($password);
            print_r($data);
            $user=DB::table('users')->insert(['name'=>$request['email'],'email'=>$request['email'],'password'=>$password,'isVendor'=>0,'isCustomer'=>1,'isAdmin'=>0]);
            $userId=DB::table('users')->select('id')->where('email','=',$request['email'])->get();
            $data['user_id']=$userId[0]->id;
            //print_r($userId[0]->id);
            //die();
            Clienti::create($data);

            return redirect()->route('clientis.clienti.index')
                ->with('success_message', 'Clienti was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified clienti.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $clienti = Clienti::with('user')->findOrFail($id);

        return view('clientis.show', compact('clienti'));
    }

    /**
     * Show the form for editing the specified clienti.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $clienti = Clienti::findOrFail($id);
        $users = User::pluck('id','id')->all();

        return view('clientis.edit', compact('clienti','users'));
    }

    /**
     * Update the specified clienti in the storage.
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
            
            $clienti = Clienti::findOrFail($id);
            $clienti->update($data);

            return redirect()->route('clientis.clienti.index')
                ->with('success_message', 'Clienti was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified clienti from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $clienti = Clienti::findOrFail($id);
            $clienti->delete();

            return redirect()->route('clientis.clienti.index')
                ->with('success_message', 'Clienti was successfully deleted.');
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
            'email' => 'required|string|min:1|max:45',
            'password'=>'required|string|min:1|max:45',
            'carta_credito' => 'nullable|string|min:0|max:45',
            'citta' => 'nullable|string|min:0|max:45',
            'cap' => 'nullable|string|min:0|max:45',
            'indirizzo' => 'nullable|string|min:0|max:45',
            'numero_civico' => 'nullable|numeric|min:-2147483648|max:2147483647',
            'telefono' => 'nullable|string|min:0|max:45',
            'categorie_preferite' => 'nullable|string|min:0|max:45', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Casa_Editrice;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Hash;
use DB;

class CasaEditricesController extends Controller
{

    /**
     * Display a listing of the casa  editrices.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $casaEditrices = Casa_Editrice::with('user')->paginate(25);

        return view('casa__editrices.index', compact('casaEditrices'));
    }

    /**
     * Show the form for creating a new casa  editrice.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $Users = User::pluck('id','id')->all();
        
        return view('casa__editrices.create', compact('Users'));
    }

    /**
     * Store a new casa  editrice in the storage.
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
            $user=DB::table('users')->insert(['name'=>$request['email'],'email'=>$request['email'],'password'=>$password,'isVendor'=>0,'isCustomer'=>1,'isAdmin'=>0]);
            $userId=DB::table('users')->select('id')->where('email','=',$request['email'])->get();
            $data['user_id']=$userId[0]->id;
            
            Casa_Editrice::create($data);

            return redirect()->route('casa__editrices.casa__editrice.index')
                ->with('success_message', 'Casa  Editrice was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified casa  editrice.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $casaEditrice = Casa_Editrice::with('user')->findOrFail($id);

        return view('casa__editrices.show', compact('casaEditrice'));
    }

    /**
     * Show the form for editing the specified casa  editrice.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $casaEditrice = Casa_Editrice::findOrFail($id);
        $Users = User::pluck('id','id')->all();
        $userId=DB::table('casa__editrices')->select('user_id')->where('id','=',$id)->first();
        
        $infoUser=DB::table('users')->select('email','password')->where('id','=',$userId->user_id)->first();
        $casaEditrice->email=$infoUser->email;
        $casaEditrice->password=$infoUser->password;
       

        return view('casa__editrices.edit', compact('casaEditrice','Users'));
    }

    /**
     * Update the specified casa  editrice in the storage.
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
          
            $casaEditrice = Casa_Editrice::findOrFail($id);
            $casaEditrice->update($data);

            return redirect()->route('casa__editrices.casa__editrice.index')
                ->with('success_message', 'Casa  Editrice was successfully updated.');
        } catch (Exception $exception) {
           
            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified casa  editrice from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $casaEditrice = Casa_Editrice::findOrFail($id);
            $casaEditrice->delete();

            return redirect()->route('casa__editrices.casa__editrice.index')
                ->with('success_message', 'Casa  Editrice was successfully deleted.');
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
            //'user_id' => 'required',
            'nome' => 'required|string|min:1|max:45',
            'email'=>'required|string|min:1|max:45',
            'password'=>'required|string|min:1|max:450',
            'p_iva' => 'required|string|min:1|max:45',
            'codice_fiscale' => 'required|string|min:1|max:45',
            'indirizzo' => 'required|string|min:1|max:45',
            'numero_telefono' => 'required|string|min:1|max:12',
            'indirizzi_rivenditori' => 'nullable|string|min:1|max:120000',
            'stripe_ApiKey' => 'nullable|string|min:0|max:45',
            'paypal_clientID' => 'nullable|string|min:0|max:45',
            'paypal_secretID' => 'nullable|string|min:0|max:45',
            'satispay_securityBearer' => 'nullable|string|min:0|max:150', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}

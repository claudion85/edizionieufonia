<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{

    /**
     * Display a listing of the users.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $users = DB::table('users')->where('isAdmin','=',1)->paginate(25);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        //$Roles = Role::pluck('id','id')->all();
        
        return view('users.create');
    }

    /**
     * Store a new user in the storage.
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
            $data['password']=$password; 
            User::create($data);

            return redirect()->route('users.user.index')
                ->with('success_message', 'User was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified user.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $user = DB::table('users')->where('id','=',$id)->first();

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        //$Roles = Role::pluck('id','id')->all();

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in the storage.
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
            
            $user = User::findOrFail($id);
            $user->update($data);

            return redirect()->route('users.user.index')
                ->with('success_message', 'User was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified user from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return redirect()->route('users.user.index')
                ->with('success_message', 'User was successfully deleted.');
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
                'role_id' => 'nullable',
            'name' => 'required|string|min:1|max:255',
            'email' => 'required|string|min:1|max:255',
            'avatar' => 'nullable|file|string|min:0|max:255',
            'password' => 'required|string|min:1|max:255',
            'remember_token' => 'nullable|string|min:0|max:100',
            'settings' => 'nullable',
            'isVendor' => 'nullable|boolean',
            'isCustomer' => 'nullable|boolean',
            'isAdmin' => 'nullable|boolean', 
        ];
        
        $data = $request->validate($rules);

        $data['isVendor'] = $request->has('isVendor');
        $data['isCustomer'] = $request->has('isCustomer');
        $data['isAdmin'] = $request->has('isAdmin');

        return $data;
    }

}

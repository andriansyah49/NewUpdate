<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request,Builder $htmlBuilder)
    {
        //
        if ($request->ajax()){
            $user = User::select(['id','name','email','password']);
            return Datatables::of($user)->addColumn('action', function($user){
                return view('datatable._act', [
                    'model' => $user,
                    'form_url' => route('user.destroy', $user->id),
                    'edit_url' => route('user.edit', $user->id),
                    'confirm_message' => 'Yakin Mau Menghapus ' . $user->name.'?']);
            })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data'=>'name','name'=>'name','title'=>'Nama'])
        ->addColumn(['data'=>'email','name'=>'email','title'=>'Email'])
        ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'','orderable'=>false, 'searchable'=>false]);
        return view('user.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        $memberRole = Role::where('name','member')->first();
        $user->attachRole($memberRole);
        $user->save();
        // dd($user);
        return redirect('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('user');
    }
}

<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::all();

        if (auth::check() == true) {
            if (auth::user()->profile == "admin") {
                //caso usuário seja admin
                return view('auth.admin.index', compact('admins'));
            } else {
                //caso não seja admin
                return view('home');
            }
        } else {
            //caso não esteja logado
            return view("auth.login");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = null)
    {
        if (isset($id)) {
            //está logado e é admin?
            if (auth::check() && auth::user()->profile == "admin") {
                $admin = User::find($id);
                //esta tentando editar um salesman ou ele mesmo?
                if ($admin->profile == "salesman" || auth::user()->id == $id) {
                    return view('auth.admin.form', compact('admin'));
                } else {
                    return redirect()->route('admin-index');
                }
            } else {
                return view("auth.login");
            }
        } else {
            return view('auth.admin.form');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect()->route('admin-index');
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
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        User::find($id)->update($data);
        return redirect()->route('admin-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('admin-index');
    }
}

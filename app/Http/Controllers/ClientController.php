<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Client;
use App\Adress;
use App\Phone;
use App\User;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::select(
            'clients.id',
            'clients.name as name',
            'users.name as salesman',
            'birth_date',
            'gender',
            'zip_code',
            'state',
            'city',
            'street',
            'number',
            'landline',
            'mobile'
        )
            ->join('adresses', 'clients.adress_id', 'adresses.id')
            ->join('phones', 'clients.phone_id', 'phones.id')
            ->join('users', 'clients.salesman_id', 'users.id')
            ->get();

        $salesmen = User::select()->where('profile', 'salesman');
        // $this->authorize('index', $client);
        return view('auth.client.index', compact('clients', 'salesmen'));


        // if (auth::check() === true) {
        //     if (auth::user()->profile === "admin") {
        //         $users = ['perfil' => 'todos'];
        //     } else {
        //         $users = ['perfil' => 'alguns'];
        //     }
        //     return view("auth.client.index", compact('users'));
        // } else {
        //     //caso não esteja logado
        //     return view("auth.login");
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = null)
    {
        $client = Client::select(
            'clients.id',
            'adress_id',
            'phone_id',
            'clients.name as name',
            'birth_date',
            'gender',
            'zip_code',
            'state',
            'city',
            'street',
            'number',
            'landline',
            'mobile'
        )
            ->join('adresses', 'clients.adress_id', 'adresses.id')
            ->join('phones', 'clients.phone_id', 'phones.id')
            ->where('clients.id', $id)
            ->get();
        $client = $client[0];
        // $client = Client::find($id);
        $salesmen = User::all();
        return view('auth.client.form', compact('client', 'salesmen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all();
        $clients = [];
        $phones = [];
        $token = $dados['_token'];

        $adresses['_token'] = $token;
        $adresses['zip_code'] = $dados['zip_code'];
        $adresses['state'] = $dados['state'];
        $adresses['city'] = $dados['city'];
        $adresses['street'] = $dados['street'];
        $adresses['number'] = $dados['number'];

        $phones['_token'] = $token;
        $phones['landline'] = $dados['landline'];
        $phones['mobile'] = $dados['mobile'];

        $clients['_token'] = $token;
        $clients['name'] = $dados['name'];
        $clients['birth_date'] = $dados['birth_date'];
        $clients['gender'] = $dados['gender'];
        $clients['salesman_id'] = $dados['salesman'];

        $phone = Phone::create($phones);
        $adress = Adress::create($adresses);

        $clients['adress_id'] = $adress->id;
        $clients['phone_id'] = $phone->id;

        Client::create($clients);
        return redirect()->route('client-index');
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
        $dados = $request->all();
        $adress_id = $dados['adress_id'];
        $phone_id = $dados['phone_id'];

        $adresses['zip_code'] = $dados['zip_code'];
        $adresses['state'] = $dados['state'];
        $adresses['city'] = $dados['city'];
        $adresses['street'] = $dados['street'];
        $adresses['number'] = $dados['number'];

        $phones['landline'] = $dados['landline'];
        $phones['mobile'] = $dados['mobile'];

        $clients['name'] = $dados['name'];
        $clients['birth_date'] = $dados['birth_date'];
        $clients['gender'] = $dados['gender'];
        $clients['salesman_id'] = $dados['salesman_id'];

        $adress_id = Adress::find($adress_id)->update($adresses);
        $phone_id = Phone::find($phone_id)->update($phones);
        Client::find($id)->update($clients);
        return redirect()->route('client-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client::destroy($id);
        return redirect()->route('client-index');
    }
}

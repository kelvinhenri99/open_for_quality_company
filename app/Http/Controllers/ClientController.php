<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function all() {

        $clients = (new Client)->clients();

        $searchCode = request('search_code');
        $searchName = request('search_name');
        $searchCity = request('search_city');
        $searchCep = request('search_cep');

        if ($searchCode) {
            $clients = Client::where('code', 'like', '%'.$searchCode.'%')->simplePaginate(20);
        }
        if ($searchName) {
            $clients = Client::where('name', 'like', '%'.$searchName.'%')->simplePaginate(20);
        }
        if ($searchCity) {
            $clients = Client::where('city', 'like', '%'.$searchCity.'%')->simplePaginate(20);
        }
        if ($searchCep) {
            $clients = Client::where('cep', 'like', '%'.$searchCep.'%')->simplePaginate(20);
        }
        if ($searchCode && $searchName) {
            $clients = Client::where('code', 'like', '%'.$searchCode.'%')
                                ->where('name', 'like', '%'.$searchName.'%')
                                ->simplePaginate(20);
        }
        if ($searchCode && $searchCity) {
            $clients = Client::where('code', 'like', '%'.$searchCode.'%')
                                ->where('city', 'like', '%'.$searchCity.'%')
                                ->simplePaginate(20);
        }
        if ($searchCode && $searchCep) {
            $clients = Client::where('code', 'like', '%'.$searchCode.'%')
                                ->where('cep', 'like', '%'.$searchCep.'%')
                                ->simplePaginate(20);
        }
        if ($searchCode && $searchName && $searchCity && $searchCep) {
            $clients = Client::where('code', 'like', '%'.$searchCode.'%')
                                ->where('name', 'like', '%'.$searchName.'%')
                                ->where('city', 'like', '%'.$searchCity.'%')
                                ->where('cep', 'like', '%'.$searchCep.'%')
                                ->simplePaginate(20);
        }
        if ($searchName && $searchCity) {
            $clients = Client::where('name', 'like', '%'.$searchName.'%')
                                ->where('city', 'like', '%'.$searchCity.'%')
                                ->simplePaginate(20);
        }
        if ($searchName && $searchCep) {
            $clients = Client::where('name', 'like', '%'.$searchName.'%')
                                ->where('cep', 'like', '%'.$searchCep.'%')
                                ->simplePaginate(20);
        }
        if ($searchCity && $searchCep) {
            $clients = Client::where('city', 'like', '%'.$searchCity.'%')
                                ->where('cep', 'like', '%'.$searchCep.'%')
                                ->simplePaginate(20);
        }

        return view('client.all', compact('clients'));
    }

    public function create() {

        return view('client.create');
    }

    public function insert(Request $request) {

        $data = $request->all();
        $randow = mt_rand(1000000000, 9999999999);

        $insert = Client::create([
            'id' => $randow,
            'code' => $data['code'],
            'name' => $data['name'],
            'cpf_cnpj' => $data['cpf_cnpj'],
            'cep' => $data['cep'],
            'street' => $data['street'],
            'number' => $data['number'],
            'district' => $data['district'],
            'city' => $data['city'],
            'uf' => $data['uf'],
            'complement' => $data['complement'],
            'phone' => $data['phone'],
            'credit_limit' => $data['credit_limit'],
            'validity' => $data['validity']
        ]);

        return back()->withInput()->with('success', 'Cliente criado com sucesso!');
    }

    public function edit ($id){

        $client = (new Client)->client($id);

        return view('client.edit', compact('client'));
    }

    public function update(Request $request, $id){

        $date = date("Y-m-d H:i:s");

        DB::table('clients')
                ->where('user_id', $id)
                    ->update([
                        'code' => $request->code,
                        'name' => $request->name,
                        'cpf_cnpj' => $request->cpf_cnpj,
                        'cep' => $request->cep,
                        'street' => $request->street,
                        'number' => $request->number,
                        'district' => $request->district,
                        'city' => $request->city,
                        'uf' => $request->uf,
                        'complement' => $request->complement,
                        'phone' => $request->phone,
                        'credit_limit' => $request->credit_limit,
                        'validity' => $request->validity,
                        'updated_at' => $date,
                    ]);

        return back()->withInput()->with('success', 'Cliente editado com sucesso!');
    }

    public function delete($id) {

        DB::table('clients')
            ->where('user_id', $id)
            ->delete();

        return back()->withInput()->with('success', 'Cliente deletado com sucesso!');
    }
}

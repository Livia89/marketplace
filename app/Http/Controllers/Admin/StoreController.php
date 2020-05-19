<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $stores = \App\Models\Store::Paginate(10);
        return view('admin.stores.index', ['stores' => $stores]);
    }

    public function create()
    {
        $users = \App\User::all(['id', 'name']);
        return view("admin.stores.create", ['users' => $users]);
    }

    public function store(Request $request)
    {

        $data = $request->all();
        $user = \App\User::find($data["user"]);
        $store = $user->store()->create($data); // Criando a loja com base de 1:1

        flash("Loja criada com sucesso")->success();
        return redirect()->route('admin.stores.index');

    }

    public function edit($store)
    {
        $store = \App\Models\Store::find($store);

        return view('admin.stores.edit', ['store' => $store]);
    }

    public function update(Request $request, $store)
    {
        $data = $request->all();
        $store = \App\Models\Store::find($store);
        $store->update($data);
        flash("Loja atualizada com sucesso")->success();
        return redirect()->route('admin.stores.index');

    }

    public function destroy($store)
    {
        $store = \App\Models\Store::find($store);
        $store->delete();
        flash("Loja removida com sucesso")->success();
        return redirect()->route('admin.stores.index');
    }

}

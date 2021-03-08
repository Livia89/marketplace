<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\UploadTrait;

use App\Http\Requests\StoreRequest; // Ficheiro de validações
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{

    use UploadTrait; // Permite utilizar o método da trait como se estivesse no mesmo controler 

    public function __construct()
    {
         // $this->middleware('user.has.store')->only(['create', 'store']);  
    }

    public function index()
    {
        
        $store = auth()->user()->store;
        
        return view('admin.stores.index', compact('store'));
    }

    public function create()
    { 

        $users = \App\Models\User::all(['id', 'name']);
        return view("admin.stores.create", ['users' => $users]);
    }

    public function store(StoreRequest $request)
    {

        $data = $request->all();
        $user = auth()->user();
        
        if($request->hasFile('logo')){
            $data['logo'] = $this->imageUpload($request->file('logo'));
        }

        $user->store()->create($data); // Criando a loja com base de 1:1

        flash("Loja criada com sucesso")->success();
        return redirect()->route('admin.stores.index');

    }

    public function edit($store)
    {
        $store = \App\Models\Store::find($store);

        return view('admin.stores.edit', ['store' => $store]);
    }

    public function update(StoreRequest $request, $store)
    {
        $data = $request->all();
        $store = \App\Models\Store::find($store);

        
        if($request->hasFile('logo')){ // delete before updated
            if(Storage::disk('public')->exists($store->logo)){
                Storage::disk('public')->delete($store->logo);
            }

            $data['logo'] = $this->imageUpload($request->file('logo'));
        }

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

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Traits\UploadTrait;

class ProductController extends Controller
{

    use UploadTrait;

    // Atributo para receber um objeto do tipo Product. Quando for iniciado um new ProductController(new Product()) automaticaticamente ser instanciado um obj do tipo Product [Que é o meu model]
    private $product;

    public function __construct(Product $product){
            $this->product = $product; 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $userStore = auth()->user()->store;
        $products = $userStore->products()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = \App\Models\Category::all(['id', 'name']);
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        
        $data = $request->all();

        $store = auth()->user()->store; 
        $product = $store->products()->create($data);  // Cria o produto baseado na loja que vem 
        $categories = $request->get('categories', null);
        $product->categories()->sync($categories);

        
        if($request->hasFile("photos")){
            $images = $this->imageUpload($request->file('photos'), 'image');
            $product->images()->createMany($images);
        }

        flash("Produto criado com sucesso")->success();
        return redirect()->route('admin.products.index');
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($product)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($product)
    {
        $products = $this->product->findOrFail($product);
        $categories = \App\Models\Category::all(['id', 'name']);

        return view('admin.products.edit', compact('products', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $product)
    {
        
        $data = $request->all();
        $product = $this->product->find($product);
        $product->update($data);
        $categories = $request->get("categories", null);
        if(!is_null($categories))
        $product->categories()->sync($categories);

        
        if($request->hasFile("photos")){
            $images = $this->imageUpload($request->file('photos'), 'image');
            $product->images()->createMany($images);
        }
        
        flash("Produto atualizado com sucesso")->success();
        return redirect()->route('admin.products.index');
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($product)
    {
        
        $product = $this->product->find($product);
        $product->categories()->detach();
        $product->images()->delete();
        $product->delete();
        
        flash("Produto excluido com sucesso")->success();
        return redirect()->route('admin.products.index');

    }


}

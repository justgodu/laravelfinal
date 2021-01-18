<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ProductController::getAll();
        return view("index", ["products"=> $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CategoryController::getAll();
        return view("admin.products.create", ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(Input::file("image")){
            $dest = public_path("images");
            $filename=uniqid().".jpg";
            $img=Input::file("image")->move($dest,$filename);
        }
        $product = Product::create([
            "name"=> $request->input('name'),
            "description"=> $request->input('description'),
            "price"=> $request->input('price'),
            'image' => $filename
        ]);
        $product = $product->fresh();
        $product->category()->attach($request->input('category'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::check()) {
            $user = auth()->user()->id;
        }else{
            $user = -1;
        }
        $product = Product::with(['comment'])->where('id',$id)->firstOrFail();
//        return $user;
        return view("singleproduct", ["product" => $product, "user"=>$user]);
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
    }

    public static function getAll(){
        return Product::all();
    }
}

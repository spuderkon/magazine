<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductFormRequest;
use App\Http\Requests\Admin\ProductFormRequestU;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Manufacturer;
use App\Models\AgeAudience;
use App\Models\Material;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Products = DB::table("Product")->paginate(8);
        return view('admin.products.index',[
            'Products' => $Products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Categories = Category::get();
        $Brands = Brand::get();
        $Manufacturers = Manufacturer::get();
        $AgeAudiences = AgeAudience::get();
        $Materials = Material::get();
        return view('admin.products.create',['Categories'=>$Categories,'Brands' => $Brands,
            'Manufacturers' => $Manufacturers, 'AgeAudiences' => $AgeAudiences, 'Materials' => $Materials]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
         $data = $request->validated();
         if($request->hasFile('Images'))
         {
             $files = $request->file('Images');
             $i = 1;
             foreach ($files as $file) {
                 $ext = $file->extension();
                 $file->storeAs($data['VenCode'],$i.'.'.$ext,['disk' =>'public']);
                 $i++;
             }
         }
         Product::create($data);
         return redirect(route('admin.products.index'));
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
    public function edit(Product $product)
    {
        $Categories = Category::get();
        $Brands = Brand::get();
        $Manufacturers = Manufacturer::get();
        $AgeAudiences = AgeAudience::get();
        $Materials = Material::get();
        return view('admin.products.create',['Product' => $product,'Categories'=>$Categories,'Brands' => $Brands,
                                             'Manufacturers' => $Manufacturers, 'AgeAudiences' => $AgeAudiences, 'Materials' => $Materials]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Product $product)
    {

        $data = $request->validate([
            'Name' => 'required|unique:Product,Name,'.$product->Product_id.',Product_id',
            'Category_id' => 'required|numeric',
            'Manufacturer_id' => 'required|numeric',
            'Brand_id' => 'required|numeric',
            'Price' => 'required|numeric|gt:0',
            'Age_audience_id' => 'required|numeric',
            'Weight' => 'nullable|gt:0',
            'Size' => 'nullable',
            'Material_id' => '',
            'Packing_size' => 'nullable',
            'Details_amount' => 'nullable',
            'Description' => 'required',
            'VenCode' => 'required|Unique:Product,VenCode,'.$product->Product_id.',Product_id',
        ]);
        if($request->hasFile('Images'))
        {
            $files = $request->file('Images');
            $i = 1;
            foreach ($files as $file) {
                $ext = $file->extension();
                $file->storeAs($data['VenCode'],$i.'.'.$ext,['disk' =>'public']);
                $i++;
            }
        }


        $product->update($data);

        
        return redirect(route("admin.products.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        File::deleteDirectory(public_path('/images/products/'.$product->VenCode));
        $product->delete();


        return redirect(route("admin.products.index"));
    }
}

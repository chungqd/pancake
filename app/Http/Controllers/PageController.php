<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Product;
use App\ProductType;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex()
    {
    	$slide = Slide::all();
    	$newProducts = Product::where('new', 1)->simplePaginate(4);
    	$productSale = Product::where('promotion_price', '<>', '0')->simplePaginate(8);
    	return view('page.home', compact('slide', 'newProducts', 'productSale'));
    }

    public function getProductType($idType)
    {
    	$productByTypes = Product::where('id_type', $idType)->paginate(6);
    	$typeProduct = ProductType::find($idType);
    	$productDifTypes = Product::where('id_type','<>', $idType)->paginate(3);
    	$types = ProductType::all();
    	return view('page.ProductType', compact('productByTypes', 'productDifTypes', 'types', 'typeProduct'));
    }

    public function getDetailProduct(Request $request)
    {
        $product = Product::find($request->id);
        $productRelat = Product::where('id_type', $product->id_type)->where('id','<>', $product->id)->simplePaginate(3);
    	return view('page.detailProduct', compact('product', 'productRelat'));
    }
    public function Contact()
    {
    	return view('page.contact');
    }
}

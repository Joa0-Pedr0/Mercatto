<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use App\Models\Customer;
use App\Http\Requests\StoreSaleRequest; 
use App\Http\Requests\UpdateSaleRequest;

class SaleController extends Controller
{

    public function index()
    {
        $sales = Sale::with(['customer', 'product'])->get();
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();

        return view('sales.create', compact('customers', 'products'));
    }

    public function store(StoreSaleRequest $request)
    {
        Sale::create($request->validated());

        return redirect()->route('sales.index')->with('success', 'Venda realizada com sucesso!');
    }

    public function edit(Sale $sale)
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('sales.edit', compact('sale', 'customers', 'products'));
    }

    public function update(UpdateSaleRequest $request, Sale $sale)
    {
        $sale->update($request->validated());

        return redirect()->route('sales.index')->with('success', 'Venda atualizada com sucesso!');
    }

    public function destroy(Sale $sale)
    {
        $sale->delete();
        
        return redirect()->route('sales.index')->with('success', 'Venda excluída com sucesso!');
    }
}

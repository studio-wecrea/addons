<?php

namespace App\Http\Controllers;

use App\Http\Requests\Invoice\StoreInvoiceRequest;
use App\Http\Requests\Invoice\UpdateInvoiceRequest;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices= Invoice::findAll();

        return view ('invoice.index')->with('invoices', $invoices);
    }

    public function create()
    {
        return view ('invoice.create');
    }

    public function store(StoreInvoiceRequest $request)
    {
        $vdata = $request->validated();
        $invoice = new Invoice([$vdata]);
        $invoice->save();
        return view ('invoice.index')->with('success', 'New invoice successfully added!');
    }
    
    
    public function edit($id)
    {
        $invoice = Invoice::findOrFail($id);
        return view ('invoice.edit')->with('invoice', $invoice);
    }
    
    public function update(UpdateInvoiceRequest $request, $id)
    {
        $vdata = $request->validated();
        $invoice = Invoice::findOrFail($id);
        $invoice->fill($vdata);
        $invoice->save();
        return view ('invoice.index')->with('success', 'Invoice successfully updated');
    }

    public function show($id)
    {
        $invoice = Invoice::findOrFail($id);
        return view ('invoice.show')->with('invoice', $invoice);
    }

    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();
        return view ('invoice.index')->with('success', 'Invoice successfully deleted!');
    }
}

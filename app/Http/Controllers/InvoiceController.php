<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Invoice;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function index()
    {
        return view('invoice.index')->with([
            'invoices' => Invoice::with('client')->latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('invoice.create')->with([
            'clients' => Client::where('user_id', Auth::user()->id)->get(),
            'tasks'   =>false
        ]);
    }

    public function update(Request $request, Invoice $invoice)
    {
        # code...
    }

    public function edit(Request $request)
    {
        # code...
    }
    public function destroy(Invoice $invoice)
    {
        # code...
    }
    public function search(Request $request)
    {
        $request->validate([
            'client_id' => ['required', 'not_in:none'],
            'status' => ['required', 'not_in:none'],
        ]);



        return view('invoice.create')->with([
            'clients' => Client::where('user_id', Auth::user()->id)->get(),
            'tasks' => $this->getInvoiceData($request),
        ]);
    }

    public function getInvoiceData(Request $request)
    {
        $tasks = Task::latest();

        if( !empty($request->client_id) ){
            $tasks = $tasks->where('client_id', '=', $request->client_id);
        }

        if( !empty($request->status) ){
            $tasks = $tasks->where('status', '=', $request->status);
        }

        if( !empty($request->fromDate) ){
            $tasks = $tasks->whereDate('created_at', '>=', $request->fromDate);
        }
        if( !empty($request->endDate) ){
            $tasks = $tasks->whereDate('created_at', '<=', $request->endDate);
        }

        return $tasks->get();

    }
    // Preview
    public function preview(Request $request)
    {
       return view('invoice.preview')->with([
           'invoice_no'   => 'MSE_'.rand(23425879, 12369874521),
           'user'   => Auth::user(),
           'tasks'  => $this->getInvoiceData($request),
       ]);
    }
}

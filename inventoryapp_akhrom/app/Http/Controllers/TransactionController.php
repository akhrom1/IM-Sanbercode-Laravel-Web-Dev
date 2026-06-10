<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\Product;
use App\Models\User;

class TransactionController extends Controller
{
    //
    public function index()
    {
        $currentUser =  Auth::user();

        if ($currentUser->role == 'admin') {
            $transaction = Transaction::get();
        } else {
            $transaction = Transaction::where('user_id', $currentUser->id)->get();
        }


        return view('transaction.show', ['transaction' => $transaction]);
    }

    public function create()
    {
        $product = Product::get();

        return view('transaction.create', ['product' => $product]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => ['required'],
            'type' => ['required'],
            'amount' => ['required'],
            'notes' => ['required'],
        ]);

        $transaction = new Transaction();

        $currentUser =  Auth::id();

        $transaction->product_id = $request->input('product_id');
        $transaction->type = $request->input('type');
        $transaction->amount = $request->input('amount');
        $transaction->notes = $request->input('notes');
        $transaction->user_id = $currentUser;

        $transaction->save();

        $product = Product::find($request->input('product_id'));
        if ($request->input('type') == 'in') {
            $product->increment('stock', $request->input('amount'));
        } else {
            $product->decrement('stock', $request->input('amount'));
        }


        return redirect('/transaction')->with('success', 'Berhasil Membuat Trasaksi');
    }
}

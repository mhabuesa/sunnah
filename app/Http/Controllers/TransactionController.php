<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index() {
        $trans = Transaction::all();
        return view('backend.transaction.index', compact('trans'));
    }
}
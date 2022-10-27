<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Traits\CartTrait;
use App\Traits\UserHelperTrait;
use Illuminate\Http\Request;

class CheckoutsController extends Controller
{
    use CartTrait, UserHelperTrait;

    public function index()
    {
        $cart = $this->cart($this->getUserId());
        return view('frontend.checkout.index', compact('cart'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(Checkout $checkout)
    {
    }

    public function edit(Checkout $checkout)
    {
    }

    public function update(Request $request, Checkout $checkout)
    {
    }

    public function destroy(Checkout $checkout)
    {
    }
}

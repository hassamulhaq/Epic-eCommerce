<?php

namespace App\Http\Controllers;

use App\Helpers\UserHelper;
use App\Http\Requests\AddToCartRequest;
use App\Http\Services\CartService;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\ProductFlat;
use App\Traits\UserHelperTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\False_;

class CartController extends Controller
{
    use UserHelperTrait;

    protected array $response = [];


    public function __construct(protected CartService $cartService)
    {
    }

    public function index()
    {
        $userId = $this->getUserId();
        $cart = Cart::with('CartDistinctItemsWithProduct')
            ->whereUserId($userId)
            ->whereIsActive(true)
            ->whereIsGuest(is_null($userId))
            ->first();

        return view('frontend.cart.index', compact('cart'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(Cart $cart)
    {
    }

    public function edit(Cart $cart)
    {
    }

    public function update(Request $request, Cart $cart)
    {
    }

    public function destroy(Cart $cart)
    {
    }


    /**
     * @throws \Throwable
     */
    public function addToCart(AddToCartRequest $request) {
        $response = $this->cartService->store($request->validated());
        return \response()->json($response);
    }
}

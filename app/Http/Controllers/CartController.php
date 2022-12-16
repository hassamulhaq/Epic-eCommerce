<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddToCartRequest;
use App\Http\Services\CartService;
use App\Models\Cart;
use App\Traits\UserHelperTrait;
use Illuminate\Http\Request;

class CartController extends Controller
{
    use UserHelperTrait;

    protected array $response = [];


    public function __construct(protected CartService $cartService)
    {
    }

    public function index()
    {
        $cartObject = $this->cartService->getCart();

        return view('frontend.cart.index', compact('cartObject'));
    }

    public function create()
    {
    }


    /**
     * @throws \Throwable
     */
    public function store(AddToCartRequest $request)
    {
        $response = $this->cartService->store($request->validated());
        return \response()->json($response);
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
        $cart->delete();

        return response()->json([
            'success' => true,
            'message' => 'Cart deleted',
            'data' => []
        ]);
    }


    public function getCartItemsGroupBy()
    {
        /*$cart = DB::table('cart_items')
            ->selectRaw('
                product_id,
                SUM(quantity) AS item_quantity,
                SUM(total_weight) AS item_total_weight,
                COUNT(item_count) AS item_count,
                SUM(price) AS item_price,
                SUM(base_price) AS item_base_price,
                SUM(total) AS item_total,
                SUM(base_total) AS item_base_total,
                SUM(tax_percent) AS item_tax_percent,
                SUM(tax_amount) AS item_tax_amount,
                SUM(discount_percent) AS item_discount_percent,
                SUM(discount_amount) AS item_discount_amount
                ')
            ->groupBy('product_id')
            ->get();*/
    }
}

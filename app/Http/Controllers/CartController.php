<?php

namespace App\Http\Controllers;

use App\Helpers\UserHelper;
use App\Http\Requests\AddToCartRequest;
use App\Http\Resources\CartCollection;
use App\Http\Services\CartService;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\ProductFlat;
use App\Traits\UserHelperTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $cartObject = [];

        $userId = $this->getUserId();
        $cart = Cart::whereUserId($userId)
            ->whereIsActive(true)
            ->whereIsGuest(is_null($userId))
            ->first();

        if (! is_null($cart)) {
            $cartItems = DB::table('cart')
                ->selectRaw('cart_items.product_id,
                    SUM(cart_items.quantity) AS item_quantity,
                    SUM(cart_items.total_weight) AS item_total_weight,
                    COUNT(cart_items.item_count) AS item_count,
                    SUM(cart_items.price) AS item_price,
                    SUM(cart_items.base_price) AS item_base_price,
                    SUM(cart_items.total) AS item_total,
                    SUM(cart_items.base_total) AS item_base_total,
                    SUM(cart_items.tax_percent) AS item_tax_percent,
                    SUM(cart_items.tax_amount) AS item_tax_amount,
                    SUM(cart_items.discount_percent) AS item_discount_percent,
                    SUM(cart_items.discount_amount) AS item_discount_amount,
                    product_flat.uuid as product_uuid,
                    product_flat.title as product_title,
                    product_flat.slug as product_slug,
                    product_flat.sku as product_sku')
                ->join('cart_items', 'cart.id', '=', 'cart_items.cart_id', 'inner')
                ->join('products', 'products.id', '=', 'cart_items.product_id', 'inner')
                ->join('product_flat', 'product_flat.product_id', '=', 'cart_items.product_id', 'inner')
                ->where('cart.user_id', '=', $userId)
                ->where('cart.is_active', '=', true)
                ->where('cart.is_guest', '=', is_null($userId))
                ->groupBy('cart_items.product_id')
                ->get();

            $cartObject['cartItems'] = $cartItems;
        }

        $cartObject['cart'] = $cart;


        return view('frontend.cart.index', compact('cartObject'));
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

    public function removeToCart(Request $request)
    {
        dd($request->toArray());
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

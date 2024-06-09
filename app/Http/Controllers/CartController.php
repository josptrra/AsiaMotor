<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItemCount = Cart::where('user_id', Auth::id())->count();
        session(['cartItemCount' => $cartItemCount]);

        return view('dashboard.cart', [
            'datas' => Cart::where('user_id', Auth::id())->get()
        ]);
    }

    public function addCart(Request $request)
    {
    // Validasi request
    $request->validate([
        'pcode' => 'required',
        'pname' => 'required',
        'pprice' => 'required',
        'pimg' => 'required',
        'pqty' => 'required|numeric'
    ]);

    // Dapatkan produk berdasarkan kode produk
    $product = Product::where('product_code', $request->pcode)->first();

    // Validasi apakah produk ada dan stok cukup
    if ($product && $product->product_qty >= $request->pqty) {
        // Tambahkan item ke keranjang
        Cart::create([
                "user_id" =>  $request->user()->id,
                "product_name" => $request->pname,
                "product_price" => $request->pprice,
                'product_image' => $request->pimg,
                'qty' => $request->pqty,
                'total_price' => $request->pprice * $request->pqty,
                'product_code' => $request->pcode
        ]);

            // Kurangi jumlah stok produk
            $product->product_qty -= $request->pqty;
            $product->save();

            // Update session cartItemCount
            $cartItemCount = Cart::where('user_id', Auth::id())->count();
            session(['cartItemCount' => $cartItemCount]);

            // Redirect dengan pesan sukses
            return back()->with('successCart', 'Produk ditambahkan ke keranjang!');
        } else {
            // Redirect dengan pesan error jika stok tidak cukup
            return back()->with('failCart', 'Stok produk tidak mencukupi!');
        }
    }

    public function deleteAll()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();

        // Loop melalui setiap item di keranjang
        foreach ($cartItems as $cartItem) {
            // Cari produk yang sesuai dengan kode produk di keranjang
            $product = Product::where('product_code', $cartItem->product_code)->first();
            if ($product) {
                // Tambahkan kembali stok produk
                $product->product_qty += $cartItem->qty;
                $product->save();
            }
        }

        // Hapus semua item dari keranjang
        Cart::where('user_id', Auth::id())->delete();

        // Reset jumlah item di keranjang
        session(['cartItemCount' => 0]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('successCart', 'Keranjang telah di bersihkan!');
    }

    public function removeFromCart(Request $request)
    {
        // Validasi permintaan
        $request->validate([
            'cart_item_id' => 'required|exists:carts,id',
        ]);

        // Cari item di keranjang
        $cartItem = Cart::where('user_id', Auth::id())->findOrFail($request->cart_item_id);

        // Cari produk yang sesuai dengan kode produk di keranjang
        $product = Product::where('product_code', $cartItem->product_code)->first();
        if ($product) {
            // Tambahkan kembali stok produk
            $product->product_qty += $cartItem->qty;
            $product->save();
        }

        // Hapus item dari keranjang
        $cartItem->delete();

        // Hitung jumlah item di keranjang
        $cartItemCount = Cart::where('user_id', Auth::id())->count();
        session(['cartItemCount' => $cartItemCount]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('successCart', 'Produk telah di buang!');
    }

    public function checkout()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();

        return view('dashboard.checkout', [
            'datas' => $cartItems // Mengirimkan $cartItems sebagai $datas ke tampilan
        ]);
    }
}

?>

<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Orders;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrdersController extends Controller
{

    public function index()
    {
        return view('dashboard.orders');
    }
        
    public function addCart(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'pmode' => 'required|string',
            'products' => 'required|string',
            'amount_paid' => 'required|numeric',
        ]);

        // Simpan pesanan ke dalam database
        $order = new Orders();
        $order->name = $validatedData['name'];
        $order->email = $validatedData['email'];
        $order->phone = $validatedData['phone'];
        $order->address = $validatedData['address'];
        $order->pmode = $validatedData['pmode'];
        $order->products = $validatedData['products'];
        $order->amount_paid = $validatedData['amount_paid'];
        $order->initial_payment = 0;
        $order->remaining_payment = 0;
        $order->user_id = Auth::id();
        $order->save();
    
        // Ambil semua item di keranjang
        $cartItems = Cart::where('user_id', Auth::id())->get();

        // Loop melalui setiap item di keranjang
        foreach ($cartItems as $cartItem) {
            // Cari produk yang sesuai dengan kode produk di keranjang
            $product = Product::where('product_code', $cartItem->product_code)->first();
            if ($product) {
                // Kembalikan jumlah stok produk
                $product->product_qty += $cartItem->qty;
                $product->save();
            }
        }

        // Hapus semua item dari keranjang
        Cart::where('user_id', Auth::id())->delete();

         // Reset jumlah item di keranjang
        session(['cartItemCount' => 0]);
    
        // Atur pesan sukses
        $successMessage = '<div class="text-center">
            <h1 class="display-4 mt-2 text-danger">Terima Kasih!</h1>
            <h2 class="text-success">Pesanan anda telah berhasil!</h2>
            <h4 class="bg-primary text-light rounded p-2">Produk yang di beli : ' . $validatedData['products'] . '</h4>
            <h4>Nama : ' . $validatedData['name'] . '</h4>
            <h4>Email : ' . $validatedData['email'] . '</h4>
            <h4>No.HP : ' . $validatedData['phone'] . '</h4>
            <h4>Total Bayar : ' . number_format($validatedData['amount_paid'], 2) . '</h4>
            <h4>Metode Pembayaran : ' . $validatedData['pmode'] . '</h4>
            <a href="/dashboard" class="btn btn-primary">Kembali ke Home</a>
        </div>';

        return redirect('/order')->with('message', $successMessage); 
    }
}
?>

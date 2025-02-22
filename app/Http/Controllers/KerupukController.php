<?php

namespace App\Http\Controllers;

use App\Models\Kerupuk;
use App\Models\ReviewProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class KerupukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // $kerupuk = Kerupuk::get();

       $items = DB::table('master_barang_v1')
            ->select(
                'master_barang_v1.id_barang',
                'master_barang_v1.nama_barang',
                'master_barang_v1.main_harga_jual',
                'master_barang_v1.main_stok',
                'master_barang_v1.gambar_barang',
                'kategori_barang.kategori',
            )
            ->leftJoin('product_category', 'master_barang_v1.id_barang', '=', 'product_category.barang_id')
            ->leftJoin('kategori_barang', 'product_category.category_id', '=', 'kategori_barang.id')
            ->paginate(12);

        // dd($items);

        // // Get best discounted products
        // $discountedProducts = DB::table('master_barang_v1')
        //     ->select(
        //         'master_barang_v1.id_barang',
        //         'master_barang_v1.nama_barang',
        //         'master_barang_v1.main_harga_jual',
        //         'master_barang_v1.main_stok',
        //         'master_barang_v1.gambar_barang',
        //         'promotions_discount.percent_price',
        //         'promotions_discount.discount_price',
        //         'promotions_discount.start_periode',
        //         'promotions_discount.end_periode'
        //     )
        //     ->join('promotions_discount', 'master_barang_v1.id_barang', '=', 'promotions_discount.product_id')
        //     ->where('promotions_discount.start_periode', '<=', now())
        //     ->where('promotions_discount.end_periode', '>=', now())
        //     ->orderBy('promotions_discount.discount_price', 'desc')
        //     ->get();

        //     foreach($discountedProducts as $product) {
        //         $product->final_price = $product->main_harga_jual;
        //         if ($product->discount_price) {
        //             $product->final_price -= $product->discount_price;
        //         } elseif ($product->percent_price) {
        //             $product->final_price *= (1 - ($product->percent_price / 100));
        //         }
        //     }

        // dd($discountedProducts);

        // Get highly reviewed products
        $highReviewProducts = DB::table('master_barang_v1')
            ->select(
                'master_barang_v1.id_barang',
                'master_barang_v1.nama_barang',
                'master_barang_v1.main_harga_jual',
                'master_barang_v1.main_stok',
                'master_barang_v1.gambar_barang',
                DB::raw('AVG(review_product.star) as avg_rating'),
                DB::raw('COUNT(review_product.id) as review_count')
            )
            ->leftJoin('review_product', 'master_barang_v1.id_barang', '=', 'review_product.product_id')
            ->groupBy(
                'master_barang_v1.id_barang', 
                'master_barang_v1.nama_barang', 
                'master_barang_v1.main_harga_jual', 
                'master_barang_v1.main_stok', 
                'master_barang_v1.gambar_barang'
            )
         //   ->having('review_count', '>', 0)
         //   ->orderBy('avg_rating', 'desc')
           // ->limit(5)
            ->get();
        if($highReviewProducts->count() < 5) {
            $existingIds = $highReviewProducts->pluck('id_barang')->toArray();
            $regularProducts = DB::table('master_barang_v1')
                ->whereNotIn('id_barang', $existingIds)
                ->limit(5 - $highReviewProducts->count())
                ->get();

            $highReviewProducts = $highReviewProducts->concat($regularProducts);
        }
        // dd($items);

        $categories = DB::table('kategori_barang')
            ->select('id', 'kategori')
            ->orderBy('kategori')
            ->get();
        
        // dd($highReviewProducts);

        return view('user.index', compact('items', 'highReviewProducts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'product_id' => 'required|exists:master_barang_v1,id_barang',
            'star' => 'required|integer|between:1,5',
            'comment' => 'required|string|max:250',
            // 'username' => 'required|string|max:255',
        ]);

        // Check for duplicate review
        $existingReview = DB::table('review_product')
            ->where('product_id', $request->product_id)
            ->where('created_by', Auth::user()->id)
            // ->where('created_by', $request->username)
            ->first();

        if($existingReview) {
            return redirect()->back()->withErrors(['errors' => 'You have already reviewed this product.']);
        }

        // Create review
        ReviewProduct::create([
            'product_id' => $request->product_id,
            'star' => $request->star,
            'comment' => $request->comment,
            'created_date' => now(),
            'created_by' => Auth::user()->id
            // 'created_by' => $request->username
        ]);
        
        return redirect()->back()->with('success', 'Review added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function showDetails($id)
    {
        //
        $product = DB::table('master_barang_v1')
            ->select(
                'master_barang_v1.id_barang',
                'master_barang_v1.nama_barang',
                'master_barang_v1.main_harga_jual',
                'master_barang_v1.main_stok',
                'master_barang_v1.gambar_barang',
                'promotions_discount.discount_price',
                'promotions_discount.percent_price',
                'promotions_discount.end_periode',
                'kategori_barang.kategori',
            )
            ->where('master_barang_v1.id_barang', $id)
            ->leftJoin('promotions_discount', function ($join) {
                $join->on('master_barang_v1.id_barang', '=', 'promotions_discount.product_id')
                    ->where('promotions_discount.start_periode', '<=', now())
                    ->where('promotions_discount.end_periode', '>=', now());
            })
            ->leftJoin('product_category', 'master_barang_v1.id_barang', '=', 'product_category.barang_id')
            ->leftJoin('kategori_barang', 'product_category.category_id', '=', 'kategori_barang.id')
            ->first();
        

        $reviews = DB::table('review_product')
            ->join('customers', 'review_product.created_by', '=', 'customers.id')
            ->select('review_product.*', 'customers.username')
            ->where('product_id', $id)
            ->orderBy('created_date', 'desc')
            ->paginate(3);

        // dd($reviews);

        $relatedProducts = DB::table('master_barang_v1')
            ->select([
                'master_barang_v1.id_barang',
                'master_barang_v1.nama_barang',
                'master_barang_v1.main_harga_jual',
                'master_barang_v1.gambar_barang',
            ])
            ->join('product_category', 'master_barang_v1.id_barang', '=', 'product_category.barang_id')
            ->where('product_category.category_id', '=', function ($query) use ($id) {
                $query->select('category_id')
                    ->from('product_category')
                    ->where('barang_id', $id)
                    ->limit(1);
            })
            ->where('master_barang_v1.id_barang', '!=', $id)
            ->limit(4)
            ->get();

        $categories = DB::table('kategori_barang')
            ->select('id', 'kategori')
            ->orderBy('kategori')
            ->get();

        // dd($product);

            
        // Calculate final price
        $finalPrice = $product->main_harga_jual;
        if ($product->discount_price) {
            $finalPrice -= $product->discount_price;
        } elseif ($product->percent_price) {
            $finalPrice *= 1 - ($product->percent_price / 100);
        }
        
        $product->final_price = $finalPrice;

    // dd($reviews);
            
        return view('user.product-details', compact('product', 'reviews', 'relatedProducts', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kerupuk $kerupuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kerupuk $kerupuk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kerupuk $kerupuk)
    {
        //
    }
}

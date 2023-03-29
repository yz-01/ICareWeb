<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Course;
use App\Models\CourseCustomer;
use App\Models\Payment;
use App\Models\PaymentItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::where('customer_id', auth()->guard('customer')->id())->where('is_checkout', 1)->get();
        return view('cart', compact('carts'));
    }

    public function addtoCart(Course $course)
    {
        if (!auth()->guard('customer')->check()) {
            return redirect(route('customer.login'))->with('warning', 'Please login to continue shopping!');
        } else {
            $existingCart = Cart::where('course_id', $course->id)->where('customer_id', auth()->guard('customer')->id())->where('is_checkout', 1)->first();

//            new course add to cart
            if ($existingCart == null) {
                Cart::create([
                    'price' => $course->price,
                    'quantity' => 1,
                    'total_price' => $course->price,
                    'is_checkout' => 1,
                    'course_id' => $course->id,
                    'customer_id' => auth()->guard('customer')->id(),
                ]);
            } else {
                $newqty = $existingCart->quantity + 1;

                $existingCart->update([
                    'quantity' => $newqty,
                    'total_price' => $existingCart->price * $newqty,
                ]);
            }
            return redirect(route('cart.index'))->with('success', 'Added to cart successfully!');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Cart $cart)
    {
        $cart->delete();

        return redirect()->route('cart.index');
    }

    public function checkoutform()
    {
        $user = auth()->guard('customer')->id();

        $carts = Cart::where('customer_id', $user)->where('is_checkout', 1)->get();
        $grandtotal = 0;
        return view('checkout', compact('carts', 'grandtotal'));
    }

    public function checkout(Request $request)
    {
        if (!auth()->guard('customer')->check()) {
            return redirect(route('customer.login'))->with('warning', 'Please login to continue shopping!');
        } else {
            $existingCart = Cart::where('customer_id', auth()->guard('customer')->id())->get();

            Cart::where('customer_id', auth()->guard('customer')->id())->update([
                'is_checkout' => 2,
            ]);

//            create payment record
            $payment = Payment::create([
                'total_price'=>$request->grandtotal,
                'paid_status'=>1,
                'customer_id'=>auth()->guard('customer')->id(),
            ]);
//            create payment items
            if ($payment->paid_status == 1) {
                foreach ($existingCart as $cart) {
                    PaymentItem::create([
                        'quantity' => $cart->quantity,
                        'price' => $cart->price,
                        'total_price' => $cart->total_price,
                        'course_id' => $cart->id,
                        'payment_id' => $payment->id,
                    ]);
                }
                //create course customer
                CourseCustomer::create([
                    'course_id'=>$cart->course->id,
                    'customer_id'=>auth()->guard('customer')->id(),
                    'completed_at'=>Carbon::now()->toDateTimeString(),
                ]);

            }
        }

        return redirect('/')->with('success', 'Your order is completed. Thank you!');
    }
}

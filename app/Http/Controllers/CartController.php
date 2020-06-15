<?php

namespace App\Http\Controllers;

use App\Medicine;
use App\User;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //

    public function add_to_cart(Medicine $med,Request $request){


        $user=Auth::user();

       \Cart::session($user->id)->add(array(
            'id' => $med->id,
            'name' => $med->name,
            'price' => $med->price,
            'quantity'=>1,
            'attributes' => array('image'=>$med->image->path),
            'associatedModel' => $med
        ));

        return redirect('cart/index');
    }

    public  function index(){
        $user=User::find(Auth::user()->id);


        $orderitems= \Cart::session($user->id)->getContent();


        return view('cart.index',compact('orderitems'));
    }

    public function update(Request $request,$id){

        \Cart::session(auth()->id())->update($id,[
            'quantity' => array(
                'relative'=>false,
                'value'=>$request->quantity)

        ]);
        return redirect('/cart/index');
    }

    public function destroy($id){


        \Cart::session(auth()->id())->remove($id);
        return redirect('cart/index');
    }

    public function checkout(){

       $cart= \Cart::session(auth()->id())->getContent();

       return view('cart.checkout',compact('cart'));
    }
}

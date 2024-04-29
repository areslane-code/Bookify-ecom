<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\CouponUser;
use App\Models\Order;
use Illuminate\Http\Request;


class CouponController extends Controller
{
    //

    public function check(Request $request)
    {

        $validated = $request->validate(
            [
                'coupon' => 'required|max:20|min:1'
            ],
            [
                'coupon.required' => 'Le champ du code de promo ne doit pas étre vide.',
                'coupon.max' => 'Le champ du coupon ne doit pas dépasser :max caractères.',
                'coupon.min' => 'Le champ du coupon doit comporter au moins :min caractères.',
            ]
        );

        // coupon
        $coupon = Coupon::where("code", $request->coupon)->first();



        if (isset($coupon) && !blank($coupon)) {
            // check if the user used the coupon before
            $check_availabilty = $coupon->expires_at >= Date(now());

            if ($check_availabilty) {
                // that means checking if the user_id and the coupon_id exist both as a row in CouponUser table

                $checkCouponAlreadyUsed = Order::where('coupon_id', $coupon->id)
                    ->where('user_id', Auth()->id())
                    ->first();

                if (!isset($checkCouponAlreadyUsed)) {
                    session(["coupon" => $coupon]);
                    return back()->with([
                        "coupon_message" => "Code de promotion est appliqué.",
                        "coupon_message_color" => "rgb(101 163 13);",
                    ]);
                } else {
                    return back()->with([
                        "coupon_message" => "Vous avez déja utilisé le code promotion.",
                        "coupon_message_color" => "rgb(250 204 21);",
                    ]);
                }
            } else {
                return back()->with([
                    "coupon_message" => "Le code de promotion saisie est expiré.",
                    "coupon_message_color" => "rgb(220 38 38);",
                ]);
            }
        } else {
            return back()->with([
                "coupon_message" => "Le code de promotion saisie n'existe pas.",
                "coupon_message_color" => "rgb(220 38 38);",
            ]);
        }
    }

    public function cancel(Request $request)
    {
        $request->session()->forget("coupon");
        return back()->with([
            "coupon_message" => "Le code de promotion est annulé",
            "coupon_message_color" => "rgb(220 38 38);",
        ]);
    }
}

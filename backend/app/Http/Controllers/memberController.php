<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class memberController extends Controller
{
    //
    function addMember(Request $req)
    {
        $member = new Member;

        $req->validate([
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'password' => '',

        ]);

        $member->first_name = $req->first_name;
        $member->last_name = $req->last_name;
        $member->email = $req->email;
        $member->password = $req->password;
        $member->save();

        return response()->json([
            'status' => 200,
            'member' => $member,
        ]);



    }


    function memberSignin(Request $req)
    {
        $req->validate([
            'email' => '',
            'password' => ''

        ]);

        $check = Member::where([
            ['email','=',$req->email],
            ['password','=',$req->password]
        ])->first();

        if ($check)
        {
            return response()->json([
                'status' => 200,
                'check' => $check
            ]);


        }
        else
        {
            return response()->json([
                'status' => 404,
                'error' => "Your email or password is incorrect"
            ]);


        }



    }
}

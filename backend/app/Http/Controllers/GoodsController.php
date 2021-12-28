<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pending;
use App\Models\Good;
use App\Models\Member;
use App\Models\Yesvote;
use App\Models\Novote;

class GoodsController extends Controller
{
    //

    function addData(Request $req)
    {
        $pending = new Pending;

        $req->validate([
            'g_name' => '',
            'g_category' => '',
            'g_price' => '',
            'g_rating' => '',
        ]);
        $pending->g_name = $req->g_name;
        $pending->g_category = $req->g_category;
        $pending->g_price = $req->g_price;
        $pending->g_rating = $req->g_rating;
        $pending->save();
        return $pending;
    }
    function addGoods($id)
    {
        $good = new Good;
        $pending = Pending::find($id);


        $good->g_name = $pending->g_name;

        $good->g_category = $pending->g_category;
        $good->g_price = $pending->g_price;

        $good->g_rating = $pending->g_rating;

        $good->created_at = $pending->created_at;
        $good->updated_at = $pending->updated_at;


        $good->save();
        return $good;
    }






    function showData()
    {
        return Pending::all();
    }
    function showGoods()
    {
        return Good::all();
    }


    function showpending($id)
    {
        $data = Pending::find($id);
        return $data;
    }
    function showEdit($id)
    {
        $data = Good::find($id);
        return $data;
    }



    function updatepending(Request $req, $id)
    {
        $good = Good::find($id);
        $pending = new Pending;
        $req->validate([
            'g_name' => '',
            'g_category' => '',
            'g_price' => '',
            'g_rating' => ''
        ]);
        $pending->good_id = $good->id;
        $pending->g_name = $req->input('g_name');
        $pending->g_category = $req->input('g_category');
        $pending->g_price = $req->input('g_price');
        $pending->g_rating = $req->input('g_rating');
        $pending->created_at = $good->created_at;
        $pending->updated_at = date('Y-m-d H:i:s');
        $pending->save();
        return $pending;
        // return $req->input();

    }
    function updateGoods($id)
    {
        $good = Good::find($id);
        $pending = Pending::where('good_id', '=', $id)->first();


        $good->g_name = $pending->g_name;

        $good->g_category = $pending->g_category;
        $good->g_price = $pending->g_price;

        $good->g_rating = $pending->g_rating;

        $good->created_at = $pending->created_at;
        $good->updated_at = $pending->updated_at;


        $good->save();
        return $good;
    }




    function updateyes(Request $req ,$id)
    {
        $members = Member::all()->count();
        $ss = $req->id;
        $voter = Yesvote::where('members_id', '=', $ss)->get();
        $vote = Pending::find($id);
        $count = $vote->yesvote;
        $count = $count + 1;
        $percent = ($count / $members) * 100;
        $vote->yesvote = $count;
        $vote->v_percent = $percent;

        $vote->save();
        $vote->members()->attach($ss);
        return $voter;
    }
    function updateno(Request $req ,$id)
    {

        $ss = $req->id;
        $voter = Novote::where('members_id', '=', $ss)->get();
        $vote = Pending::find($id);
        $count = $vote->novote;
        $count = $count + 1;
        $vote->novote = $count;
        $vote->save();
        $vote->membersNV()->attach($ss);
        return $voter;
    }
    function delete($id){
        $data = Pending::where('id', $id)->delete();
    }

}


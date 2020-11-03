<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Arrear;
use App\Comment;
use Illuminate\Support\Facades\DB;


class PagesController extends Controller
{

    public function index(Request $request) {
        $datas = Arrear::orderBy('id','DESC')->where('arrears_state', '=', 'verified')->get();
        $categorise = json_encode(DB::table('arrears')->select(DB::raw('economic_category as category'), DB::raw('sum(arrears_owed) as total'))->groupBy(DB::raw('economic_category'))->where('arrears_state', '=', 'verified')->get());
      //  echo $categorise[0]->category;
   // dd($categorise);
      // $ArrayCategorise = json_encode($categorise);
       $ArrayCategorise = json_decode($categorise, true);
      //echo $ArrayCategorise[0];
       //echo "=====";
       // print_r($ArrayCategorise[0]['category']);
      //echo "-----";
         // print_f()
     // dd($categorise);

       return view('welcome',compact('datas', 'ArrayCategorise'))
        ->with('i', ($request->input('page', 1) - 1) * 5);

      //  return view('welcome',compact('datas','ArrayCategorise'))
     //   ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function show($id) {
        $arrear = Arrear::find($id);
        $comments = Comment::orderBy('id','DESC')->paginate(3);
        return view('arrears')->with(compact('arrear'))->with(compact('comments'));
    }


    public function showByCat(Request $request, $slug) {
        $decodedSlug = urldecode($slug);
        $datas = Arrear::orderBy('id','DESC')->where(['arrears_state'=>'verified','economic_category'=>$decodedSlug])->get();
        // return view('arrears')->with(compact('arrear'))->with(compact('comments'));
        return view('showcat',compact('datas'))
        ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function showPosts($slug) {
        $post = $this->repos->findBySlug($slug);
        return view('fivepoints.humancapital')->with('post', $post);
    }
}

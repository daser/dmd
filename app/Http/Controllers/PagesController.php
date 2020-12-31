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
        // $categorise = json_encode(DB::table('arrears')->select(DB::raw('economic_category as category'), DB::raw('sum(arrears_owed) as total'))->where('arrears_state', '=', 'verified')->groupBy(DB::raw('economic_category'))->get());

        $categorise = json_encode(DB::table('arrears')->select(DB::raw('economic_category as category'), DB::raw('sum(arrears_owed) as total'))->where('arrears_state', '=', 'verified')->whereRaw('id IN ( SELECT MAX(id) FROM arrears GROUP BY file_reference )', [], 'AND')->groupBy(DB::raw('economic_category'))->get());



    //     $categorise = DB::select('economic_category as category')->addSelect(DB::raw('SUM(arrears_owed) as total'))
    // ->from('arrears')
    // ->where('arrears_state', '=', 'verified')
    // ->whereRaw('id IN ( SELECT MAX(id) FROM arrears GROUP BY file_reference )', [], 'AND')
    // ->groupBy('economic_category')
    // ->get();

      //  echo $categorise[0]->category;
   // dd($categorise);
      // $ArrayCategorise = json_encode($categorise);
       $ArrayCategorise = json_decode($categorise, true);
       // dd($ArrayCategorise);
      //echo $ArrayCategorise[0];
       //echo "=====";
       // print_r($ArrayCategorise[0]['category']);
      //echo "-----";
       // SELECT economic_category as category, SUM(arrears_owed) AS total FROM arrears WHERE arrears_state='verified' GROUP BY economic_category;
         // print_f()
       // SELECT *  FROM arrears WHERE id IN (SELECT MAX(id) FROM arrears GROUP BY file_reference);
     // dd($categorise);
// SELECT economic_category as category, SUM(arrears_owed) AS total FROM arrears WHERE arrears_state='verified' AND id IN (SELECT MAX(id) FROM arrears GROUP BY file_reference) GROUP BY economic_category;

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

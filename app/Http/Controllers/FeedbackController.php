<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FeedbackController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request){

    	$database = (new Factory)->withServiceAccount(__DIR__.'/debtmanagement-a40a0-6089f70f50fb.json')
			->withDatabaseUri('https://debtmanagement-a40a0.firebaseio.com/')->createDatabase();
				$reference = $database->getReference('dmo/posts');
				 $snapshot = $reference->getValue();
				//print_r($reference);
				// foreach($snapshot as $ref=>$res) {
				// 	print_r($snapshot[$ref]['arrears']);
				// }
				// dd();
				// $valueSnap = array_values($snapshot);
				 // print_r($snapshot);

				// dd();
    	 // $datas = EconomicCategory::orderBy('id','DESC')->get();
         return view('admin.feedback.index',compact('snapshot'))
             ->with('i', ($request->input('page', 1) - 1) * 5);
    }

	public function destroy($uid)
    {
    	$database = (new Factory)->withServiceAccount(__DIR__.'/debtmanagement-a40a0-6089f70f50fb.json')
			->withDatabaseUri('https://debtmanagement-a40a0.firebaseio.com/')->createDatabase();
				$reference = $database->getReference('dmo/posts')->getChild($uid)->orderByChild($uid)->getReference();
				$path = $reference->getUri()->getPath();
    			$reference->remove();
    			return redirect()->route('feedback.index')
                        ->with('success','feedback deleted successfully');
				// $snapshot = $reference->getValue();
    }
}

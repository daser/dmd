<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;


class CommentController extends Controller
{
    public function store(Request $request)
    {
    	$request->validate([
            'body'=>'required',
        ]);

		$database = (new Factory)->withServiceAccount(__DIR__.'/debtmanagement-a40a0-6089f70f50fb.json')
			->withDatabaseUri('https://debtmanagement-a40a0.firebaseio.com/')->createDatabase();

    	if($request->hasFile('image_file')){  
        	\Cloudder::upload($request->file('image_file'));
        	$c=\Cloudder::getResult();
        	if($c){
        		 	$insert = $database->getReference('dmo/posts')->push(['arrears'=> $request->hidenID, 'imageName'=>$c['secure_url'], 'description'=>$request->body, 'creditor'=>$request->hiddenCreditor, 'debtor'=>$request->hiddenDebtor]);
        		 	$input = $request->all();   
        			Comment::create($input);
        	// return back();
               return back()
                    ->with('success','You have successfully upload images.')
                    ->with('image',$c['url']);
            }else{
            	dd("Error: Kindly reach out to the admin");
            }

    	}else{

        	$input = $request->all();   
        	Comment::create($input);
        	return back();

    	}

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Arrear;


class OprController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request){
        return view('admin.opr.index');
    }

    public function search(Request $request){

        $this->validate($request, [
            'searchbox' => 'required'
        ]);

        try {
        $datas = Arrear::where('file_reference', $request->searchbox)->orderBy('year_of_entry','desc')->limit(1)->get();
          // dd($datas);
        $searchParam = $request->searchbox;
        return view('admin.opr.index', compact('datas','searchParam'))
                        ->with('success','Arrears Category deleted successfully');
        }catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function store(Request $request){

    	$this->validate($request, [
            'amountbox' => 'required',
            'date_of_entry' => 'required'
        ]);

        try {

    	 		$input = $request->all();
		    	$data = json_decode($input["DBpayload"]);
		    	$inputMod = array();
		    	$inputMod['debtor'] = $data->debtor;
		    	$inputMod['creditor'] = $data->creditor;
		    	$inputMod['contact'] = $data->contact;
		    	$inputMod['arrears_owed'] = $data->arrears_owed;
		    	$inputMod['billing_date'] = $data->billing_date;
		    	$inputMod['amount_settled'] = $data->amount_settled + $input['amountbox'];
		    	$inputMod['nature_of_debt'] = $data->nature_of_debt;
		    	$inputMod['contract_terms'] = $data->contract_terms;
		    	$inputMod['file_reference'] = $data->file_reference;
		    	$inputMod['amount'] = $input['amountbox'];
		    	$inputMod['economic_category'] = $data->economic_category;
		    	$inputMod['arrears_state'] = $data->arrears_state;
		    	$inputMod['date_of_entry'] = $input['date_of_entry'];
		    	$inputMod['slug'] = $data->slug;
		    	$inputMod['comments']=$data->comments;
		    	$inputMod['arrears_type']=$data->arrears_type;
		    	$year = substr($input['date_of_entry'],0, 4);
		    	$inputMod['year_of_entry'] = $year;
		    	// echo $data->amount_settled;
		    	 // dd($data);
		    	// dd($inputMod);
    	 		$user = Arrear::create($inputMod);
            	return redirect()->route('opr.index')
                            ->with('success','Arrears created successfully');

        }catch (Exception $e) {
        	return redirect()->route('opr.index')
                            ->with('error',$e->getMessage());
            // echo 'Error: ' . $e->getMessage();
        }
    	 // dd($js->id);

    	 //


 

    }

}

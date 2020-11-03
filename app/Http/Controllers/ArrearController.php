<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Arrear;
use App\MDA;
use App\NatureOfDebt;
use App\EconomicCategory;
use App\ArrearsCategory;

class ArrearController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $datas = Arrear::orderBy('id','DESC')->get();
        return view('admin.arrears.index',compact('datas'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create(){
        $mdas = MDA::orderBy('id','DESC')->get();
        $debts = NatureOfDebt::orderBy('id','DESC')->get();
        $categories = ArrearsCategory::orderBy('id','DESC')->get();
        return view('admin.arrears.create', compact('mdas'))->with(compact('debts'))->with(compact('categories'));
    }

    public function store(Request $request)
    {
        
        $this->validate($request, [
            'debtor' => 'required',
            'creditor' => 'required',
            'contact' => 'required',
            'arrears_owed' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'billing_date' => 'required',
            'amount_settled' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'nature_of_debt' => 'required',
            'contract_terms' => 'required',
            'file_reference' => 'required',
            'economic_category' => 'required',
            'arrears_state' => 'required',
            'date_of_entry' => 'required'
        ]);

        try {
        
            $str = strtolower($request->creditor . $request->contract_terms);
            $slug = preg_replace('/\s+/', '-', $str);
            $input = $request->all();
            $input['slug'] = $slug;
            $year = substr($input['date_of_entry'],0, 4);
            $input['year_of_entry'] = $year;
            // dd($input);

            $user = Arrear::create($input);

            return redirect()->route('arrears.index')
                            ->with('success','Arrears created successfully');

        }catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

/*
    public function showbycategory($slug){
        try 
    }
*/
    public function show($slug) {
       
        try {
        $arrear = Arrear::where('slug', $slug)->get();
        // dd($arrear);
        return view('admin.arrears.show', compact('arrear'))
                        ->with('success','Arrears Category deleted successfully');
        }catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function edit($slug) {
       
        try {
        $arrear = Arrear::where('slug', $slug)->get();
        $debts = NatureOfDebt::orderBy('id','DESC')->get();
        $categories = ArrearsCategory::orderBy('id','DESC')->get();
        $mdas = MDA::orderBy('id','DESC')->get();
        // dd($arrear);
        return view('admin.arrears.edit', compact('arrear'))->with(compact('debts'))
                        ->with(compact('categories'))->with(compact('mdas'))
                        ->with('success','Arrears Category deleted successfully');
        }catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function update(Request $request, $slug)
    {
        $this->validate($request, [
            'debtor' => 'required',
            'creditor' => 'required',
            'contact' => 'required',
            'arrears_owed' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'billing_date' => 'required',
            'amount_settled' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'nature_of_debt' => 'required',
            'contract_terms' => 'required',
            'file_reference' => 'required',
            'economic_category' => 'required',
            'arrears_state' => 'required',
        ]);

        try {
            $mda = Arrear::where('slug', $slug)->first();

            $mda->debtor = $request->get('debtor');
            $mda->creditor = $request->get('creditor');
            $mda->contact = $request->get('contact');
            $mda->date_of_entry = $request->get('date_of_entry');
            $mda->arrears_owed = $request->get('arrears_owed');
            $mda->arrears_type = $request->get('arrears_type');
            $mda->billing_date = $request->get('billing_date');
            $mda->amount_settled = $request->get('amount_settled');
            $mda->nature_of_debt = $request->get('nature_of_debt');
            $mda->contract_terms = $request->get('contract_terms');
            $mda->file_reference = $request->get('file_reference');
            $mda->economic_category = $request->get('economic_category');
            $mda->comments = $request->get('comments');
            $mda->arrears_state = $request->get('arrears_state');
            $str = strtolower($request->creditor);
            $slug = preg_replace('/\s+/', '-', $str);
            $mda->slug = $slug;

            $year = substr($request->get('date_of_entry'),0, 4);
            $mda->year_of_entry = $year;
          
            $mda->save();

            return redirect()->route('arrears.index')->with('success',
                'Arrears successfully updated.');

        }catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function destroy($slug)
    {
        try {
        $mda = Arrear::where('slug', $slug)->delete();
        return redirect()->route('arrears.index')
                        ->with('success','Arrears deleted successfully');
        }catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
 }

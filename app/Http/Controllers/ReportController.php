<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Arrear;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function yearly(Request $request){

    }

    public function index(Request $request)
    {
        //dd("dd");
        try {
            // $year = date("Y");
            $varYear = $request->query('year');
//dd($varYear);
            if($varYear){
                $year = $varYear;
            }else{
                $year = 2019;
            }    
            $a_year_back = $year - 1;
            $lastyear = $year - 1;
            $lastlastyear = $lastyear - 1;
            // dd($a_year_back); 
                // year 2018
                $arrears_by_outstanding2018 = Arrear::where('economic_category', '=', 'Contractor\'s Arrears')
                    ->where('year_of_entry', '=', $a_year_back)->get();
                $arrears_by_settled2018 = Arrear::where('economic_category', '=', 'Contractor\'s Arrears')
                    ->where('year_of_entry', '=', $a_year_back)->get();
                
                    $incurred_amount2018 = 0;
                    $outstanding_amount2018 = 0;
                    $settled_amount2018 = 0;

                    foreach($arrears_by_outstanding2018 as $outstanding) {
                        $outstanding_amount2018 += $outstanding->arrears_owed;
                    }

                    foreach($arrears_by_settled2018 as $settled) {
                        $settled_amount2018 += $settled->amount_settled;
                    }

                    $incurred_amount2018 = $outstanding_amount2018 + $settled_amount2018;
                    // outstanding 2017
                    $outstanding_2017 = abs($incurred_amount2018 - ($outstanding_amount2018 + $settled_amount2018) - $settled_amount2018);
                    // $outstanding_2017 = $incurred_amount2018;
                
                // year 2019
                $arrears_by_incurred2019 = Arrear::where('economic_category', '=', 'Contractor\'s Arrears')
                    ->where('year_of_entry', '=', $year)->get();
                $arrears_by_settled2019 = Arrear::where('economic_category', '=', 'Contractor\'s Arrears')
                    ->where('year_of_entry', '=', $year)->get();      
                    
                    $amount_owed19 = 0;
                    // $outstanding_amount = 0;
                    $settled_amount = 0;
            
                    foreach($arrears_by_incurred2019 as $incurred) {
                        $amount_owed19 += $incurred->arrears_owed;
                    }
            
                    foreach($arrears_by_settled2019 as $settled) {
                        $settled_amount += $settled->amount_settled;
                    }

                    $incurred_amount = $amount_owed19 + $settled_amount;
                    $outstanding_amount = $outstanding_amount2018 + $amount_owed19;

                    // $outstanding_amount = $incurred_amount - ($amount_owed19 + $settled_amount) - $settled_amount;

                    $total1_diff = $outstanding_amount2018 - $outstanding_amount;
                    $percentage1 = $outstanding_amount2018 == 0 ? 0 : ($total1_diff/$outstanding_amount2018)  * 100;
                   
                    // pension gratuity 
                    $arrears_by_outstanding2018 = Arrear::where('economic_category', '=', 'Pension And Gratuity Arrears')
                        ->where('year_of_entry', '=', $a_year_back)->get();
                    $arrears_by_settled2018 = Arrear::where('economic_category', '=', 'Pension And Gratuity Arrears')
                        ->where('year_of_entry', '=', $a_year_back)->get();

                    $incurred_amount12018 = 0;
                    $outstanding_amount12018 = 0;
                    $settled_amount12018 = 0;
            
                    foreach($arrears_by_outstanding2018 as $outstanding) {
                        $outstanding_amount12018 += $outstanding->arrears_owed;
                    }
            
                    foreach($arrears_by_settled2018 as $settled) {
                        $settled_amount12018 += $settled->amount_settled;
                    }
             
                    $incurred_amount12018 = $outstanding_amount12018 + $settled_amount12018;
                    // outstanding 2017
                    $outstanding_12017 = abs($incurred_amount12018 - ($outstanding_amount12018 + $settled_amount12018) - $settled_amount12018);
                    // $outstanding_12017 = $incurred_amount12018;

                $arrears_by_incurred2019 = Arrear::where('economic_category', '=', 'Pension And Gratuity Arrears')
                    ->where('year_of_entry', '=', $year)->get();
                $arrears_by_settled2019 = Arrear::where('economic_category', '=', 'Pension And Gratuity Arrears')
                    ->where('year_of_entry', '=', $year)->get();
                
                    $incurred_amount1x = 0;
                    $outstanding_amount1 = 0;
                    $settled_amount1 = 0;
            
                    foreach($arrears_by_incurred2019 as $incurred) {
                        $incurred_amount1x += $incurred->arrears_owed;
                    }
            
                    foreach($arrears_by_settled2019 as $settled) {
                        $settled_amount1 += $settled->amount_settled;
                    }

                    $incurred_amount1 = $incurred_amount1x + $settled_amount1;
                    $outstanding_amount1 = $outstanding_amount12018 + $incurred_amount1x;

                    // $outstanding_amount1 = $incurred_amount1 - ($incurred_amount1x + $settled_amount1) - $settled_amount1;
            
                    $total2_diff = $outstanding_amount12018 - $outstanding_amount1;
                    $percentage2 = $outstanding_amount12018 == 0 ? 0 : ( $total2_diff/$outstanding_amount12018 )  * 100;

                // Salary Arrears
                $arrears_by_outstanding32018 = Arrear::where('economic_category', '=', 'Salary Arrears And Other Staff Claims Arrears')
                    ->where('year_of_entry', '=', $a_year_back)->get();
                $arrears_by_settled32018 = Arrear::where('economic_category', '=', 'Salary Arrears And Other Staff Claims Arrears')
                    ->where('year_of_entry', '=', $a_year_back)->get();

                $incurred_amount22018 = 0;
                $outstanding_amount22018 = 0;
                $settled_amount22018 = 0;

                foreach($arrears_by_outstanding32018 as $outstanding) {
                    $outstanding_amount22018 += $outstanding->arrears_owed;
                }

                foreach($arrears_by_settled32018 as $settled) {
                    $settled_amount22018 += $settled->amount_settled;
                }
             
                $incurred_amount22018 = $outstanding_amount22018 + $settled_amount22018;

                $outstanding_22017 = abs($incurred_amount22018 - ($outstanding_amount22018 + $settled_amount22018) - $settled_amount22018);

                // $outstanding_22017 = $incurred_amount22018;
            //    2019
                $arrears_by_incurred3 = Arrear::where('economic_category', '=', 'Salary Arrears And Other Staff Claims Arrears')
                    ->where('year_of_entry', '=', $year)->get();
                $arrears_by_settled3 = Arrear::where('economic_category', '=', 'Salary Arrears And Other Staff Claims Arrears')
                    ->where('year_of_entry', '=', $year)->get();

                    $incurred_amount2x = 0;
                    $outstanding_amount2 = 0;
                    $settled_amount2 = 0;

                    foreach($arrears_by_incurred3 as $incurred) {
                        $incurred_amount2x += $incurred->arrears_owed;
                    }
                    foreach($arrears_by_settled3 as $settled) {
                        $settled_amount2 += $settled->amount_settled;
                    }

                    $incurred_amount2 = $incurred_amount2x + $settled_amount2;

                    $outstanding_amount2 = $outstanding_amount22018 + $incurred_amount2x;
         
                    // $outstanding_amount2 = $incurred_amount2 - ($incurred_amount2x - $settled_amount2) - $settled_amount2;

                $total3_diff = $outstanding_amount22018 - $outstanding_amount2;
                $percentage3 = $outstanding_amount22018 == 0 ? 0 : ( $total3_diff/$outstanding_amount22018 )  * 100;

                // judgement Debt
                $arrears_by_outstanding42018 = Arrear::where('economic_category', '=', 'Judgement Debt')
                    ->where('year_of_entry', '=', $a_year_back)->get();
                $arrears_by_settled42018 = Arrear::where('economic_category', '=', 'Judgement Debt')
                    ->where('year_of_entry', '=', $a_year_back)->get();

                $incurred_amount32018 = 0;
                $outstanding_amount32018 = 0;
                $settled_amount32018 = 0;

                foreach($arrears_by_outstanding42018 as $outstanding) {
                    $outstanding_amount32018 += $outstanding->arrears_owed;
                }

                foreach($arrears_by_settled42018 as $settled) {
                    $settled_amount32018 += $settled->amount_settled;
                }

                $incurred_amount32018 = $outstanding_amount32018 + $settled_amount32018;

                $outstanding_32017 = abs($incurred_amount32018 - ($outstanding_amount32018 + $settled_amount32018) - $settled_amount32018);
                // $outstanding_32017 = $incurred_amount32018;

                $arrears_by_incurred4 = Arrear::where('economic_category', '=', 'Judgement Debt')
                    ->where('year_of_entry', '=', $year)->get();
                $arrears_by_settled4 = Arrear::where('economic_category', '=', 'Judgement Debt')
                    ->where('year_of_entry', '=', $year)->get();

                    $incurred_amount3x = 0;
                    $outstanding_amount3 = 0;
                    $settled_amount3 = 0;
                 
                    foreach($arrears_by_incurred4 as $incurred) {
                        $incurred_amount3x += $incurred->arrears_owed;
                    }

                    foreach($arrears_by_settled4 as $settled) {
                        $settled_amount3 += $settled->amount_settled;
                    }

                    $incurred_amount3 = $incurred_amount3x + $settled_amount3;
                    $outstanding_amount3 = $outstanding_amount32018 + $incurred_amount3x;
                    // $outstanding_amount3 = $incurred_amount3 - ($incurred_amount3x + $settled_amount3) - $settled_amount3;

                $total4_diff = $outstanding_amount32018 - $outstanding_amount3;
                $percentage4 = $outstanding_amount32018 == 0 ? 0 : ( $total4_diff/$outstanding_amount32018 )  * 100;

                // others 
                $others2018 = Arrear::where('economic_category', '=', 'Other Arrears - Type Y')
                ->where('year_of_entry', '=', $a_year_back)->get();
                $otherss42018 = Arrear::where('economic_category', '=', 'Other Arrears - Type Y')
                    ->where('year_of_entry', '=', $a_year_back)->get();

                $incurred_amount42018 = 0;
                $outstanding_amount42018 = 0;
                $settled_amount42018 = 0;

                foreach($others2018 as $outstanding) {
                    $outstanding_amount42018 += $outstanding->arrears_owed;
                }

                foreach($otherss42018 as $settled) {
                    $settled_amount42018 += $settled->amount_settled;
                }

                $incurred_amount42018 = $outstanding_amount42018 + $settled_amount42018;

                $outstanding_42017 = abs($incurred_amount42018 - ($outstanding_amount42018 + $settled_amount42018) - $settled_amount42018);

                // others 2019
                $arrears_by_incurred5 = Arrear::where('economic_category', '=', 'Other Arrears - Type Y')
                    ->where('year_of_entry', '=', $year)->get();
                $arrears_by_settled5 = Arrear::where('economic_category', '=', 'Other Arrears - Type Y')
                    ->where('year_of_entry', '=', $year)->get();

                    $incurred_amount4x = 0;
                    $outstanding_amount4 = 0;
                    $settled_amount4 = 0;
                 
                    foreach($arrears_by_incurred5 as $incurred) {
                        $incurred_amount4x += $incurred->arrears_owed;
                    }

                    foreach($arrears_by_settled5 as $settled) {
                        $settled_amount4 += $settled->amount_settled;
                    }

                    $incurred_amount4 = $incurred_amount4x + $settled_amount4;

                    $outstanding_amount4 = $outstanding_amount42018 + $incurred_amount4x;

                    // $outstanding_amount4 = $incurred_amount4 - ($incurred_amount4x + $settled_amount4) - $settled_amount4;

                $total5_diff = $outstanding_amount42018 - $outstanding_amount4;
                $percentage5 = $outstanding_amount42018 == 0 ? 0 : ( $total5_diff/$outstanding_amount42018 )  * 100;
                    
            return view('admin.reports.index',compact(
                'incurred_amount', 'settled_amount','outstanding_amount',
                'incurred_amount2018', 'settled_amount2018', 'outstanding_amount2018', 
                'incurred_amount1', 'settled_amount1', 'outstanding_amount1',
                'incurred_amount12018', 'settled_amount12018', 'outstanding_amount12018',
                'incurred_amount2', 'settled_amount2', 'outstanding_amount2',
                'incurred_amount22018', 'settled_amount22018', 'outstanding_amount22018', 
                'incurred_amount3', 'settled_amount3', 'outstanding_amount3',
                'incurred_amount32018', 'settled_amount32018', 'outstanding_amount32018', 
                'total1_diff', 'total2_diff', 'total3_diff', 'total4_diff', 'total5_diff',
                'outstanding_2017', 'outstanding_12017', 'outstanding_22017', 'outstanding_32017',
                'outstanding_42017', 'incurred_amount42018', 'settled_amount42018', 'outstanding_amount42018',
                'incurred_amount4', 'settled_amount4', 'outstanding_amount4',
                'percentage1', 'percentage2', 'percentage3', 'percentage4', 'percentage5','year','lastyear','lastlastyear'
            ));
        
       
        }catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}

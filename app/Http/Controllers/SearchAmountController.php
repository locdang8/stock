<?php

namespace App\Http\Controllers;

// use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchAmountController extends Controller
{
    //
    public function getamount(Request $request) {
        if($request->ajax()) {
            $output = '';
            $templates = DB::table('template')->where('id', '=', $request->search)->get();
            foreach ($templates as $key => $template) {
                $output = "<input type='text' id='actual_number' class='form-control' name='actual_number' value='{$template->amount}'>";
            }
            return Response($output);
        }
    }


}

<?php

namespace App\Http\Controllers;

use App\Models\Donations;
use App\Models\Expenses;
use App\Models\Orphans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Webcontroller extends Controller
{
    public function pdfreport($from_date,$to_date,$report_type)
    {
        if($report_type == "Orphan"){
            $reports = Orphans::whereBetween('created_at',[$from_date,$to_date])->get();
        }
        
        if($report_type == "Donations"){
            $reports = Donations::whereBetween('created_at',[$from_date,$to_date])->get();
        }
        
        if($report_type == "Expenses"){
            $reports = Expenses::whereBetween('created_at',[$from_date,$to_date])->get();
        }
        
        return view('pdfreport',compact('reports','from_date','to_date','report_type'));
    }
    
    public function pdfdownload($from_date,$to_date,$report_type)
    {
        $pdf = App::make('dompdf.wrapper');
        
        if($report_type == "Orphan"){
            $reports = Orphans::whereBetween('created_at',[$from_date,$to_date])->get();
        }
        
        if($report_type == "Donations"){
            $reports = Donations::whereBetween('created_at',[$from_date,$to_date])->get();
        }
        
        if($report_type == "Expenses"){
            $reports = Expenses::whereBetween('created_at',[$from_date,$to_date])->get();
        }
        
        $pdf->loadView('pdfdownload',compact('reports','from_date','to_date','report_type'));
        
        return $pdf->stream("REPORT-FROM-{$from_date}-TO-{$to_date}.pdf");
    }
}

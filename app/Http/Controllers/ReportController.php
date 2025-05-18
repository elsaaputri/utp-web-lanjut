<?php 

namespace App\Http\Controllers; 

use Illuminate\Http\Request; 
use App\Models\Payment; 
use App; 
use Auth; 

class ReportController extends Controller 
{ 
    public function report1($pid) 
    { 
        $payment = Payment::find($pid); 
        $pdf = App::make('dompdf.wrapper'); 
        
        $print = "<div style='margin:20px; padding:20px;'>"; 
        $print .= "<h1>Payment Receipt</h1>"; 
        $print .= "<p><b>Receipt No: </b> " . $pid . " </p>"; 
        $print .= "<p><b>Paid Date: </b> " . $payment->paid_date . " </p>"; 
        $print .= "<p><b>Enrollment No: </b> " . $payment->enrollment->enroll_no . " </p>"; 
        $print .= "<p><b>Student Name: </b> " . $payment->enrollment->student->name . " </p>"; 
        $print .= "<hr>"; 

        // Table creation
        $print .= "<table style='width:100%;'>"; 
        $print .= "<tr>"; 
        $print .= "<td>Batch</td>"; 
        $print .= "<td>Amount</td>"; 
        $print .= "</tr>"; 

        $print .= "<tr>"; 
        $print .= "<td><h3>" . $payment->enrollment->batch->name . "</h3></td>"; 
        $print .= "<td><h3>" . $payment->amount . "</h3></td>"; 
        $print .= "</tr>"; 

        $print .= "</table>"; 
        $print .= "<hr>"; 
        
        $print .= "<span>Printed Date: " . date('Y-m-d') . "</span>"; 
        $print .= "</div>"; 
        
        $pdf->loadHTML($print); 
        return $pdf->stream(); 
    } 
}

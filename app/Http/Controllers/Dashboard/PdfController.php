<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Models\Supplier;

class PdfController extends Controller
{
    public function index(){

        $supplier = Supplier::all();

        $data = [
            'title' => 'kocak',
            'supplier' => $supplier
        ];

        $pdf = Pdf::loadView('dashboard.supplier.generate-supplier-pdf', $data);
        return $pdf->download('invoice.pdf');
    }
}

<?php

namespace App\Exports;

use App\Billing;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OrderExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View
    {
        return view('backend.report.export_excel', [
            'billing'=> Billing::all()

        ]);
    }
}

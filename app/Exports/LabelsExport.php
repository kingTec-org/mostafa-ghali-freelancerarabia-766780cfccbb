<?php

namespace App\Exports;

 use App\Models\Label\Label;
 use Maatwebsite\Excel\Concerns\FromCollection;
 use Maatwebsite\Excel\Concerns\WithHeadingRow;

 class LabelsExport implements FromCollection , WithHeadingRow
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Label::where('language_id',2)->get();
    }
}

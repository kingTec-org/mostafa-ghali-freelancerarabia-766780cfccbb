<?php

namespace App\Imports;

 use App\Models\Category\SubCategory;
 use Maatwebsite\Excel\Concerns\ToModel;
 use Maatwebsite\Excel\Concerns\WithHeadingRow;

 class SubCategoryImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
         return  SubCategory::firstOrCreate(['name_en'     => $row['sub_en']],[

                   'name_ar'    => $row['sub_ar'],
                   'category_id'    => $row['category'],
          ]);
    }
}

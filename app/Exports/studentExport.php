<?php
  
namespace App\Exports;
  
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
  
class studentExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::where('role_id',3)->select('first_name','last_name','email','mobile_no')->get();
    }
}
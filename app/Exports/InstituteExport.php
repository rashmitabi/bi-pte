<?php
  
namespace App\Exports;
  
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
  
class InstituteExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::where('role_id',2)->select('first_name','last_name','email','mobile_no')->with(['institue'])->get();
    }
}
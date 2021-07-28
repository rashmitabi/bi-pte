<?php
  
namespace App\Exports;
  
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class studentExport implements FromCollection, WithHeadings
{
	public function headings(): array
    {
        return array('First Name', 'Last Name', 'Email', 'Mobile Number');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $input = request()->all();
        return User::whereIn('id',$input['ids'])->select('first_name','last_name','email','mobile_no')->latest()->get();
    }
}
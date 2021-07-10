<?php
  
namespace App\Exports;
  
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class InstituteExport implements FromCollection, WithHeadings
{

	public function headings(): array
    {
        return array('First Name', 'Last Name', 'Email', 'Mobile Number', 'State');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $input = request()->all();
        
        return $users = User::whereIn('id',$input['ids'])->select('first_name','last_name','email','mobile_no', 'state')->with(['institue'])->get();

        // $result = array('First Name', 'Last Name', 'Email', 'Mobile Number', 'State');
        // foreach($users as $user){
        // 	array_push($result, array($user->first_name, $user->last_name, $user->email, $user->mobile_no, $user->state));
        // }

        // return $result;
    }
}
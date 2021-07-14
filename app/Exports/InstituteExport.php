<?php
  
namespace App\Exports;
  
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class InstituteExport implements FromCollection, WithHeadings, WithMapping
{

	public function headings(): array
    {
        return array('Institute Name', 'Email', 'Mobile Number', 'State');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $input = request()->all();
        return $users = User::whereIn('id',$input['ids'])->with(['institue'])->get();
    }
    public function map($users): array
    {
        return [
            $users->institue->institute_name,
            $users->email,
            $users->mobile_no,
            $users->state,
        ];
    }
}
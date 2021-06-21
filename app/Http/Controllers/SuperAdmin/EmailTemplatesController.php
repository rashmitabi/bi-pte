<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmailTemplates;
use DataTables;

class EmailTemplatesController extends Controller
{
    private $moduleTitleP = 'superadmin.email.';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax())  {
            $data = EmailTemplates::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('name', function($row){
                        return $row->name;
                    })
                    ->addColumn('subject', function($row){
                        return $row->subject;
                    })
                    ->addColumn('created_at', function($row){
                        return $row->created_at->format('d/m/Y');
                    })
                    ->addColumn('status', function($row){
                        if($row->status == "E"){
                            $status = "Enable";
                            $iconClass = "red";
                        }else{
                            $status = "Disable";
                            $iconClass = "green";
                        }
                        return $status;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<ul class="actions-btns">
                            <li class="action email-edit" data-toggle="modal" data-target="#editemail" data-id="'.$row->id.'" data-url="'.route('email.edit', $row->id).'"><a href="javascript:void(0);"><i class="fas fa-pen"></i></a></li>
                            <li class="action"><a href="#" class="delete_modal" data-toggle="modal" data-target="#delete_modal"  data-url="'.route('email.destroy', $row->id).'" data-id="'.$row->id.'"><i class="fas fa-trash"></i></a></li>
                            <li class="action shield '.(($row->status == "E") ? "red" : "green").'"><a href="'.route('superadmin-email-changestatus', $row->id ).'"><img src="'.asset('assets/images/icons/blocked.svg').'" class=""></a></li>
                            </ul>';
                        return $btn;
                    })
                    ->rawColumns(['checkbox','action'])
                    ->make(true);
        }
        return view($this->moduleTitleP.'index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->moduleTitleP.'addemail');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      =>'required|min:3|max:50',
            'subject'   =>'required|min:3|max:50',
            'body'      =>'required',
            'status'    =>'nullable|in:E,D'
        ]);

        $input              = \Arr::except($request->all(),array('_token'));
        $input['user_id']   = \Auth::user()->id;
        $result             = EmailTemplates::create($input);

        if($result){
            return redirect()->route('email.index')
            ->with('success','Email Template created successfully');
        }else{
            return redirect()->route('email.index')
            ->with('error','Sorry!Something wrong.Try again later!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $EmailTemplate = EmailTemplates::find($id);

        $html_email = view($this->moduleTitleP.'edit', compact('EmailTemplate'))->render();

        return response()->json([
            'success' => 1,
            'html'=>$html_email    
        ]);
    }
    public function changeStatus($id)
    {
        $email = EmailTemplates::find($id);
        if($email->status == 'D'){
            $email->status = 'E';
        }else{
            $email->status = 'D';
        }
        $result = $email->update();
        if($result){
            return redirect()->route('email.index')
                        ->with('success','Status Update successfully');
        }else{
            return redirect()->route('email.index')
                        ->with('error','Status Not Updated!');
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'      =>'required|min:3|max:50',
            'subject'   =>'required|min:3|max:50',
            'body'      =>'required',
            'status'    =>'nullable|in:E,D'
        ]);

        $input  = \Arr::except($request->all(),array('_token'));

        $result = EmailTemplates::where('id',$id)->update($input);
        if($result){
            \Session::put('success', 'Email update Successfully!');
            return true;
        }else{
            \Session::put('error', 'Sorry!Something wrong.try Again.');
            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = EmailTemplates::where('id',$id)->delete();
        if($result)
        {
            return redirect()->route('email.index')
                        ->with('success','Email Template deleted successfully!');
        }
        else
        {
            return redirect()->route('email.index')
                        ->with('error','Sorry!Something wrong.Try again later!');
        }
    }
}

<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modules; 
use DataTables;
use App\Http\Requests\UpdateModulesRequest;


class ModulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $moduleTitleP = 'superadmin.modules.';

    public function index(Request $request)
    {
        if($request->ajax())  {
            $data = Modules::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('status', function($row){
                        if($row->status == "E"){
                            $status = "Enable";
                        }else{
                            $status = "Disable";
                        }
                        return $status;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<ul class="actions-btns">
                            <li class="action" data-toggle="modal" data-target="#editmodules"><a href="javascript:void(0);" class="modules-edit" data-id="'.$row->id .'" data-url="'.route('modules.edit', $row->id).'"><i class="fas fa-pen"></i></a></li>
                            <li class="action shield '.(($row->status == "E") ? "green" : "bg-danger").'"><a href="'.route('superadmin-module-changestatus', $row->id ).'"><img src="'.asset('assets/images/icons/blocked.svg').'" class=""></a></li>
                            </ul>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Modules  $modules
     * @return \Illuminate\Http\Response
     */
    public function show(Modules $modules)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Modules  $modules
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $module = Modules::find($id);
        $html_role = view($this->moduleTitleP.'edit', compact('module'))->render();

        return response()->json([
            'success' => 1,
            'html'=>$html_role    
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Modules  $modules
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateModulesRequest $request, $id)
    {
        $input  = \Arr::except($request->all(),array('_token'));
        if(!isset($input['status'])){
            $input['status'] = 'D';
        }
        $res = Modules::where('id',$id)->update($input);
        
        if($res){
            \Session::put('success', 'Modules update Successfully!');
            return true;
        }else{
            \Session::put('error', 'Sorry!Something wrong.try Again.');
            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Modules  $modules
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modules $modules)
    {
        //
    }

    public function changeStatus($id)
    {
        $module = Modules::find($id);
        if($module->status == 'D'){
            $module->status = 'E';
        }else{
            $module->status = 'D';
        }
        $result = $module->update();
        if($result){
            return redirect()->route('modules.index')
                        ->with('success','Status Update successfully');
        }else{
            return redirect()->route('modules.index')
                        ->with('error','Status Not Updated!');
        }
    }
   
}

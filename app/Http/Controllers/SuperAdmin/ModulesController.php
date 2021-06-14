<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modules;
use DataTables;


class ModulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = Modules::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('checkbox', function($row){
                        $checkbox = '<input type="checkbox" class="form-check-input position-relative ml-0" id="exampleCheck1">';
                        return $checkbox;
                    })
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
                            <li class="action"><a href="#"><i class="fas fa-pen"></i></a></li>
                            <li class="action shield green"><a href="'.route('superadmin-module-changestatus', $row->id ).'"><img src="'.asset('assets/images/icons/blocked.svg').'" class=""></a></li>
                            </ul>';
                        return $btn;
                    })
                    ->rawColumns(['checkbox','action'])
                    ->make(true);
        }
        return view('superadmin/modules/index');
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
    public function edit(Modules $modules)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Modules  $modules
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modules $modules)
    {
        //
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

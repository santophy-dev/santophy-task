<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\AddEditEmployeeRequest;

class EmployeeController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $data = User::get();
            return DataTables::of($data)
                        ->addColumn('image', function ($row) {
                            $src = url('uploads/user/' . $row->image);
                            return '<img class="image-ratio" style="height:70px;width:120px;" src="'.$src.'" />';
                        })
                        ->addColumn('action', function ($row) {
                            $btn = '<a style="width: 100px; margin-right: 10px;" href="' . url('edit', $row->id) . '" class="edit btn btn-primary mr-3"><i class="fas fa-eye"></i> Edit</a>';
                            $btn .= '<button style="width: 100px; margin-right: 10px;" onClick="deleteEmp('.$row->id.')" class="edit btn btn-danger mr-3"><i class="fas fa-eye"></i> Delete</button>';
                            return '<div style="display:flex;">'.$btn.'</div>';
                        })            
                        ->addIndexColumn()
             ->rawColumns(['action','image'])
            ->make(true);
        }
        return view('index');
    }

    public function add(){
        return view('add');
    }

    public function edit($id){
        $user = User::find($id);
        if(!empty($user)){
            return view('add', compact('user'));
        }
        abort(404);
    }

    public function save(AddEditEmployeeRequest $request){
        try{
            User::saveData($request);
            return response()->json([
                        'success' => true,
                        'message' => 'Employee details saved successfully.',
                            ], 200);
        } catch(\Exception $e) {
            return response()->json([
                        'success' => false,
                        'message' => $e->getMessage().'  '.$e->getLine().'Something went wrong.',
                            ], 422);
        }        
    }

    public function delete($id){
        try{
            User::where('id',$id)->delete();
            return response()->json([
                        'success' => true,
                        'message' => 'Employee deleted successfully.',
                            ], 200);
        } catch(\Exception $e) {
            return response()->json([
                        'success' => false,
                        'message' => $e->getMessage().'  '.$e->getLine().'Something went wrong.',
                            ], 422);
        }        
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
class CrudUserController extends Controller
{


	public function list(){
		$users = User::get();
		return response()->json(['status' => true, 'data' => $users ]);
	}
	public function save(Request $request, ){
        $id = request('id');
		$validator = Validator::make($request->all(), [
			'name' => 'required',
			'email' => 'required',
			'password' => 'required',
			'role' => 'required',
		]);

		if($validator->fails()){
			return response()->json(['status' => false, 'error' => $validator->errors() ]);
		}else{
			if(!empty($id)){
				$users = User::where('id', $id)->update([
					'name' => $request->get('name'),
					'email' => $request->get('email'),
					'password' => hash::make($request->get('password')),
					'role' => $request->get('role'),
				]);
				if($users){
					return response()->json(['status' => true, 'message' => 'users updated successfully!']);
				}
			}else{
				$users = User::create([
					'name' => $request->get('name'),
					'email' => $request->get('email'),
					'password' => hash::make($request->get('password')),
					'role' => $request->get('role'),
				]);
				if($users){
					return response()->json(['status' => true, 'message' => 'users saved successfully!']);
				}
			}
		}
	}


	public function find(){
        $key = request()->get('key');
		$users = User::where('email', 'like', "%$key%")
            ->orWhere('name', 'like', "%$key%")
            ->get();

            if ($users->isNotEmpty()) {
            return response()->json(['status' => true, 'data' => $users]);
            } else {
            return response()->json(['status' => false, 'message' => 'No users found']);
            }
	}


	public function delete(){
        $id = request('id');
		$users = User::findOrFail($id);
		if($users->delete()){
			return response()->json(['status' => true, 'message' => 'User deleted successfully!' ]);
		}
	}
}


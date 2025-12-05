<?php

use Illuminate\Support\Facades\Auth;
use App\Models\FranchiseUsers;
use App\Models\Access\FranchiseUserPermission;

if (!function_exists('f_can_api')) {

	function f_can_api($user_id, $permission)
	{
	    $user = FranchiseUsers::find($user_id);
	    
	    $user_permissions = FranchiseUserPermission::where('user_id', $user->id)->with('prmsn')->get();
	    $ups = collect($user_permissions)->pluck('prmsn.name')->all();
	    if(count($ups) > 0)
	    {
	        return in_array($permission, $ups) ? true : false;
	    }
	    else
	    {
	        return false;
	    } 
        
	}
	
	
	function fhasRole($role)
	{
		if(Auth::check()) {
			
			$user = Auth::user();
			
			if(isset($user->role->name)) {
			    return $role == $user->role->name;
			}
		}
	
		return false;
	}
	
	function getFranchiseUserPermissions($user_id)
	{
	    $user = FranchiseUsers::where('status',1)->where('id', $user_id)->first();
	    
	    $role_permissions =  FranchiseUserPermission::where('user_id', $user->id)->with('prmsn')->get();
	    
	    $rps = collect($role_permissions)->pluck('prmsn.name')->all();
	    
	    return $rps;
	}
}


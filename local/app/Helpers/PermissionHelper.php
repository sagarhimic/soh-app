<?php

use Illuminate\Support\Facades\Auth;
use App\Models\Access\UserPermission;
use App\Models\User;
use App\Models\FranchiseUsers;
use App\Models\Access\FranchiseUserPermission;

if (!function_exists('can')) {

	function can($permission)
	{
		if(Auth::check()) {
		    
		    //$user = Auth::user();
			
		    $user_id = Auth::user()->id;
			
			$user_permissions = UserPermission::where('user_id', $user_id)->with('prmsn')->get();
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
		
		return false;
	}
	
	function can_api($user_id, $permission)
	{
	    $user = User::find($user_id);
	    
	    $user_permissions = UserPermission::where('user_id', $user->id)->with('prmsn')->get();
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
	
	
	function hasRole($role)
	{
		if(Auth::check()) {
			
			$user = Auth::user();
			
			if(isset($user->role->name)) {
			    return $role == $user->role->name;
			}
		}
	
		return false;
	}
	
	function getUserPermissions($user_id)
	{
	    $user = User::where('role_id',1)->where('id', $user_id)->first();
	    
	    $role_permissions = UserPermission::where('user_id', $user->id)->with('prmsn')->get();
	    
	    $rps = collect($role_permissions)->pluck('prmsn.name')->all();
	    
	    return $rps;
	}
}


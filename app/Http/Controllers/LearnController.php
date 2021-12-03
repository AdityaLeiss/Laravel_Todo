<?php

namespace App\Http\Controllers;
use App\Models\Learn;
use App\Models\User;

use Illuminate\Http\Request;

class LearnController extends Controller
{
    public function index(learn $learn)
    {
        $learns = auth()->user()->learns();
        
        return view('dashboard', compact('learns'));
    }
    public function add()
    {
    	return view('add');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'learn' => 'required'
        ]);
    	$learns = new learn();
    	$learns->jadwal = $request->learn;
        $learns->tanggal = $request->date;
        $learns->status = "Soon";
    	$learns->user_id = auth()->user()->id;
    	$learns->save();
    	return redirect('/dashboard'); 
    }

    public function edit(learn $learns)
    {

    	if (auth()->user()->id == $learns->user_id)
        {            
                return view('edit', compact('learns'));
        }           
        else {
             return redirect('/dashboard');
         }            	
    }

    public function update(Request $request, learn $learns)
    {
    	if(isset($_POST['delete'])) {
    		$learns->delete();
    		return redirect('/dashboard');
    	}
        elseif(isset($_POST['status'])) {
    		$learns->status = "Done";
            $learns->save();
    		return redirect('/dashboard');
    	}
    	else
    	{
            $this->validate($request, [
                'jadwal' => 'required'
            ]);
    		$learns->jadwal = $request->jadwal;
            $learns->tanggal = $request->date;
	    	$learns->save();
	    	return redirect('/dashboard'); 
    	}    	
    }
}

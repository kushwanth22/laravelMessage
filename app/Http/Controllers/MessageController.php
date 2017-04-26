<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session\Store;
use DB;
use Auth;
use App\User;
use App\Messages;
use View;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$msgView = Messages::find($id);
        //$email = Auth::user()->email;
		//get data
		//$messages = DB::table('messages')->where('id', $email);
		//select * from messages m, users u where m.receiver=u.email and u.email = 'mahesh1@gmail.com'
			
		$view = DB::table('messages')
			->where('messages.id', $id)
            ->get();
		
		//load the view and pass the nerds
        //return View('home')->with('messages', $messages);
		return View::make('home')->with(['view' => $view, 'view_data', 5]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
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
		$status = DB::select("select * from messages where id = $id")->get()->toArray;
		print_r ($status);
		exit;
		
		if($status[0]->imp==1){
			
			$status[0]->imp=0;
		}else{
			$status[0]->imp=1;	
		}
		$status->save();
		
		$session->flash('mark', 'Mark successfully');
		
		return view('home');
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Store $session)
    {  
        $msgDelete = Messages::find($id);
		$msgDelete->delete();
		$session->flash('msgDelete_sucsess', 'Message delete succussfully');
		return redirect()->route('home');
    }
}

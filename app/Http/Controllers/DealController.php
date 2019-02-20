<?php

namespace App\Http\Controllers;
use validator;
use App\Deal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deals=DB::table('deals')->leftJoin('users','deals.userId','=','users.id')
            ->orderBy('deals.created_at')
            ->get();
        return view('user.deals',compact('deals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function browse(){
        $deals=DB::table('deals')->get();
        return view('user.browsedeal',compact('deals'));
    }
//    public function create()
//    {
//        $deals=DB::table('deals')->get();
//        return view('user.browsedeal',compact('deals'));
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'Heading'=>'required|string',
            'Description'=>'required|min:15',
            'Image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'begin'=>'required|date',
            'end'=>'required|date',
        ]);
        $deal=new Deal();
        $deal->Heading=$request->Heading;
        $deal->Description=$request->Description;
        $deal->Image=$request->Image;
        if ($request->hasFile('Image')) {
            $image = $request->file('Image');
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $name);
            $deal->Image = $name;
        }
        $deal->userId=Auth::user()->id;
        $deal->begin=$request->begin;
        $deal->end=$request->end;
        $deal->save();
        session()->flash("notif","Success to Insert Your Deal,Thanks for Improving Our Website");
      return back();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deal $id)
    {
        $id->delete();
        session()->flash("notif","Success to delete This Deal");
        return back();
    }
}

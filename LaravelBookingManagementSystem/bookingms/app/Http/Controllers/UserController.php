<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bookings;
use App\Models\WebPage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $data = User::get();
        return view('AdminDashboard.Users.index',['data'=>$data]);

    }
    public function adminDashboard(){
        $data['totalUsers']= 0 ;
        $data['adminUsers']= 0 ;
        $data['clientUsers']= 0 ;
        $data['totalBookings']= 0 ;
        $data['completedBookings'] =0 ;
        $data['totalWebPages']= 0 ;
        $data['activeWebpages']= 0;
        $data['totalUsers']= User::count();
        $data['adminUsers']= User::where('user_type',1)->count();
        $data['clientUsers']= User::where('user_type',2)->count();
        $data['totalBookings']= Bookings::count();
        $data['completedBookings'] =Bookings::where('status',3)->count();
        $data['totalWebpages']= WebPage::count();
        $data['activeWebpages']= WebPage::where('status',1)->count();
        return view('AdminDashboard.index',['data'=>$data]);

    }
    public function userDashboard(){
        $data['totalBookings']= Bookings::where('user_id',Auth::id())->count() ;
        $data['completedBookings'] = Bookings::where('status',3)->where('user_id',Auth::id())->count() ; 
        return view('UserDashboard.index',['data'=>$data]);
    }
    public function add(){ 
        return view('AdminDashboard.Users.addEdit');

    }
    public function save(Request $request){
        $user = new User([
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'phone_no'=>$request->get('phone_no'),
            'password'=>Hash::make('secret'),
            'user_type'=>$request->get('user_type'),
        ]);
        $user->save();
        return redirect()->route('user');


    }
    public function edit($id){
        $data = User::find($id);
        return view('AdminDashboard.Users.addEdit',['data'=>$data]);

    }
    public function update(Request $request,$id){
        $user = User::find($id);
        $user->name=$request->get('name');
        $user->email=$request->get('email');
        $user->phone_no=$request->get('phone_no');
        $user->user_type=$request->get('user_type');
        $user->save();
        return redirect()->route('user');


    }
    public function viewDelete($id){
        return view('AdminDashboard.Users.delete');
    }
    public function delete($id){
        User::where('id',$id)->delete();
        return redirect()->route('user');

    }
    public function getProfile(){
        $data = User::find(Auth::id());
        if(Auth::user()->user_type == 1){
            $view = 'AdminDashboard.Profile.index';
        }else{
            $view = 'userDashboard.Profile.index';
        }
        return view($view,['data'=>$data]);

    }
    public function saveProfile(Request $request){
        $user = User::find(Auth::id());
        $user->name=$request->get('name');
        $user->email=$request->get('email');
        $user->phone_no=$request->get('phone_no');
        // $user->user_type=$request->get('user_type');
        $user->save();
        return redirect()->route('user.profile.get');
    }
}

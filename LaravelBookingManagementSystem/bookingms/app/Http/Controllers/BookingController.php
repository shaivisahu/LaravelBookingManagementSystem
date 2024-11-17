<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Bookings;
use App\Models\User;

class BookingController extends Controller
{
    public function index(){
        $query = Bookings::select('bookings.*','users.name as user_name')
            ->leftJoin('users','bookings.user_id','=','users.id');
        $data = $query->get();
        return view('adminDashboard.Bookings.index',['data'=>$data]);

    }
    public function userBookings(){
        $query = Bookings::select('bookings.*','users.name as user_name')
            ->leftJoin('users','bookings.user_id','=','users.id')
            ->where('bookings.user_id',Auth::user()->id);
        $data = $query->get();
        return view('userDashboard.Bookings.index',['data'=>$data]);

    }
    public function add(){
        $data = User::get();
        if(Auth::user()->user_type == 1){
            return view('AdminDashboard.Bookings.addEdit',['data'=>$data]);
        }else{
            return view('userDashboard.Bookings.addEdit',['data'=>$data]);
        }
        
    }
    public function save(Request $request){
        $user = new Bookings([
            'name'=>$request->get('booking_name'),
            'booking_datetime'=>$request->get('booking_on'),
            'status'=>$request->get('booking_status'),
            'user_id'=>Auth::user()->user_type==1 ? $request->get('user_name'): Auth::user()->id
        ]);
        $user->save();
        if(Auth::user()->user_type == 1){
            $route = 'booking.all';
        }else{
            $route = 'booking.my';
        }
        return redirect()->route($route);
    }
    public function getBookingById($id){
        $data = User::get();
        $booking = Bookings::find($id);
        if(Auth::user()->user_type == 1){
            return view('AdminDashboard.Bookings.addEdit',['data'=>$data,'booking'=>$booking]);
        }else{
            return view('UserDashboard.Bookings.addEdit',['data'=>$data,'booking'=>$booking]);
        }
        

    }
    public function updateBookingById(Request $request,$id){
        $booking = Bookings::find($id);
        $booking->name=$request->get('booking_name');
        $booking->booking_datetime=$request->get('booking_on');
        $booking->status=$request->get('booking_status');
        $booking->user_id=Auth::user()->user_type==1 ? $request->get('user_name'): Auth::user()->id;
        $booking->save();
        if(Auth::user()->user_type == 1){
            $route = 'booking.all';
        }else{
            $route = 'booking.my';
        }
        return redirect()->route($route);


    }
    public function viewDelete($id){
        if(Auth::user()->user_type == 1){
            $view = 'AdminDashboard.Bookings.delete';
        }else{
            $view = 'userDashboard.Bookings.delete';
        }
        return view($view);


    }
    public function delete($id){
        $status = Bookings::where('id',$id)->delete();
        if(Auth::user()->user_type == 1){
            $route = 'booking.all';
        }else{
            $route = 'booking.my';
        }
        return redirect()->route($route);


    }
    
}

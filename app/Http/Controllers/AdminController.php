<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\FoodChef;
use App\Models\Order;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    //User
    public function users() {
        $data = User::orderBy('id','DESC')->get();
        return view('admin.users', compact('data'));
    }

    public function deleteUser($id) {
        $data = User::find($id);
        if($data->delete()) {
            return redirect()->back()->with('success', 'The User has been deleted succesfully');
        } else {
            return redirect()->back()->with('error', 'The User has not been deleted');
        }

    }


    //Food
    public function foodMenu() {
        $data = Food::orderBy('id', 'DESC')->get();
        return view('admin.foodMenu', compact('data'));
    }

    public function upload(Request $request) {
        $data = new Food;

        $image=$request->image;
        $imagename = time(). '.'.$image->getClientOriginalExtension();
        $request->image->move('foodImage', $imagename);
        $data->image=$imagename;

        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;

        if($data->save()) {
            return redirect()->back()->with('success', 'The Food has been added succesfully');
        } else {
            return redirect()->back()->with('error', 'The Food has not been added');
        }

    }

    public function delete($id) {
        $data = Food::findorFail($id);
    
        if( $data->delete()) {
            return redirect()->back()->with('successDelete', 'The Food has been deleted succesfully');
        } else {
            return redirect()->back()->with('errorDelete', 'The Food has not been deleted');
        }
    }

    public function updateView($id) {
        $data = Food::find($id);
        return view('admin.updateView', compact('data'));
    }

    public function updateFood(Request $request, $id) {
        $data = Food::findorFail($id);

        $image=$request->image;
        $imagename = time(). '.'.$image->getClientOriginalExtension();
        $request->image->move('foodImage', $imagename);
        $data->image=$imagename;

        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;

        if($data->update()) {
            return redirect()->back()->with('successEditFood', 'The Food has been edited succesfully');
        } else {
            return redirect()->back()->with('errorEditFood', 'The Food has not been edited');
        }

    }


    //Reservations
    public function reservation(Request $request) {
        $data = new Reservation;

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->guest = $request->guest;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->message = $request->message;
        if($data->save()) {
            return redirect()->back()->with('successRez', 'You have made a reservation. Enjoy!');
        } else {
            return redirect()->back()->with('errorRez', 'Something went wrong during your reservation. Try again!');
        }
    }

    public function viewReservation() {
        $data = Reservation::orderBy('id', 'DESC')->get();
        return view('admin.reservationAdmin', compact('data'));
    }

    public function deleteReservation($id) {
        $data = Reservation::findorFail($id);
        
        if( $data->delete()) {
            return redirect()->back()->with('successDeleteRes', 'The Reservation has been deleted succesfully');
        } else {
            return redirect()->back()->with('errorDeleteRes', 'The Reservation has not been deleted');
        }
   }

   public function updateViewReservation($id) {
        $data = Reservation::find($id);
        return view('admin.updateViewRes', compact('data'));
   }

   public function updateReservation(Request $request, $id) {
    $data = Reservation::findorFail($id);

    $data->name = $request->name;
    $data->email = $request->email;
    $data->phone = $request->phone;
    $data->guest = $request->guest;
    $data->date = $request->date;
    $data->time = $request->time;
    $data->message = $request->message;
 

    if($data->update()) {
        return redirect()->back()->with('successEditRes', 'The Reservation has been edited succesfully');
    } else {
        return redirect()->back()->with('errorEditRes', 'The Reservation has not been edited');
    }
   }



   //Chefs
   public function viewChef() {
        $data = FoodChef::orderBy('id', 'DESC')->get();
        return view('admin.adminChef', compact('data'));
    }

    public function uploadChef(Request $request) {
        $data = new FoodChef;

        $image=$request->image;
        $imagename = time(). '.'.$image->getClientOriginalExtension();
        $request->image->move('chefsImage', $imagename);
        $data->image=$imagename;

        $data->name = $request->name;
        $data->specialty = $request->specialty;

        if($data->save()) {
            return redirect()->back()->with('successUploadChef', 'The Chef has been added succesfully');
        } else {
            return redirect()->back()->with('errorUploadChef', 'The Chef has not been added');
        }

    }

    public function updateChef($id) {
        $data = FoodChef::findorFail($id);
        return view('admin.updateChef', compact('data'));
    }

    public function updateFoodChef(Request $request, $id) {
        $data = FoodChef::findorFail($id);

        $image=$request->image;
        $imagename = time(). '.'.$image->getClientOriginalExtension();
        $request->image->move('chefsImage', $imagename);
        $data->image=$imagename;

        $data->name = $request->name;
        $data->specialty = $request->specialty;

        if($data->update()) {
            return redirect()->back()->with('successEditChef', 'The Chef has been edited succesfully');
        } else {
            return redirect()->back()->with('errorEditChef', 'The Chef has not been edited');
        }
    }

    public function deleteChef($id) {
        $data = FoodChef::findorFail($id);
        if( $data->delete()) {
            return redirect()->back()->with('successDeleteChef', 'The Chef has been deleted succesfully');
        } else {
            return redirect()->back()->with('errorDeleteChef', 'The Chef has not been deleted');
        }
    }


    //Orders
    public function viewOrder() 
    {
        $data = Order::all();
        return view('admin.viewOrder', compact('data'));
    }
}

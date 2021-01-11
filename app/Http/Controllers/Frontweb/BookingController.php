<?php

namespace App\Http\Controllers\Frontweb;

use Cartalyst\Stripe\Exception\CardErrorException;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use Session;
use App\User;
use App\Models\{
    //TeacherSkill
    CoachStudentList, 
    StudentProfile,
    TeacherService,
    BookingSlots,
    Booking,

};
use DB;

use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{

    public function bookingIndex($bookingType, $subjectId){

    $checkRole = DB::table('model_has_roles')->where('model_id', Auth::id())->first();

    if($checkRole->role_id == 1){

        $subject = TeacherService::findOrFail($subjectId);

        $data = [
            'student' => User::findOrFail(Auth::id()),
            'coach' => User::findOrFail($subject->user_id),
            'subject' => $subject,
        ];

        if($bookingType == 'package-booking'){
            return view('checkout.checkout-wrapper-package',$data);
         }


        if($bookingType == 'free-booking'){

             if(Booking::where('student_id', Auth::id())->where('coach_id', $subject->user_id)->where('type', 'Free')->count() > 0){
                
                return back()->with('error_message', 'You have already booked your Free Session with this Coach.');
             }

             return view('checkout.checkout-wrapper-free',$data);
           }

        return view('checkout.checkout-wrapper',$data);
     }

     return back()->with('error_message', 'Please log in as a coachee to book a Session!');

    }

    public function addBooking(Request $request, $bookingType, $subjectId){


        $student = User::findOrFail(Auth::id());
        $subject = TeacherService::findOrFail($subjectId);
        $coach = User::findOrFail($subject->user_id);

    if(BookingSlots::where('coach_id', $subject->user_id)->where('bookingdate', $request->bookingdate)->where('bookingtime', $request->bookingtime)->count() > 0){
        return back()->with('error_message', 'Sorry, this time slot is not available!');
    }


        if($bookingType == 'package-booking'){

                try {
                    $charge = Stripe::charges()->create([
                        'amount' => $subject->price,
                        'currency' => 'USD',
                        'source' => $request->stripeToken,
                        'description' => 'Payment for package booking for '.$subject->title,
                        //'receipt_email' => $request->email,
                        'metadata' => [
                        ],
                    ]);
                    // SUCCESSFUL
                    $booking = Booking::create([
                        'student_id'=>Auth::id(),
                        'coach_id'=>$coach->id,
                        'subject_id'=>$subjectId,
                        'subject_name'=>$subject->title,
                        'bookingdate'=>'N/A',
                        'bookingtime'=>'N/A',
                        'bookingend'=>'N/A',
                        'price'=>$subject->price,
                        'type'=>'Package',
                        'payment'=>'Successful',
                        'txn_id'=>uniqid().Auth::id(),
                        'session_id'=>'session_'.uniqid().rand(99,1000).Auth::id()
                    ]);

                    CoachStudentList::where('student_id', Auth::id())->where('coach_id', $coach->id)->updateOrCreate(
                        [
                            'student_id'=>Auth::id(),
                            'coach_id'=>$coach->id
                        ],
                     );
                 
                 return redirect()->route('student.profile.dashboard')->with('success_message', 'Your Package Was Booked Successfully!');

                   } catch (CardErrorException $e) {
                     return back()->withErrors('Error! ' . $e->getMessage());
                 }
            }

        if($bookingType == 'free-booking'){

                    $booking = Booking::create([
                    'student_id'=>Auth::id(),
                    'coach_id'=>$coach->id,
                    'subject_id'=>$subjectId,
                    'subject_name'=>$subject->title,
                    'bookingdate'=>$request->bookingdate,
                    'bookingtime'=>$request->bookingtime,
                    'bookingend'=>date('H:i', strtotime($request->bookingtime) + 15*60),
                    'bookinghrs'=>0.15,
                    'subject_id'=>$subjectId,
                    'price'=>0.00,
                    'type'=>'Free',
                    'txn_id'=>'N/A',
                    'payment'=>'N/A',
                    'session_id'=>'session_'.uniqid().rand(99,1000).Auth::id()
                    ]);

                    CoachStudentList::where('student_id', Auth::id())->where('coach_id', $coach->id)->updateOrCreate(
                        [
                            'student_id'=>Auth::id(),
                            'coach_id'=>$coach->id
                        ],
                    );

                    $slot1 = BookingSlots::create([
                        'coach_id'=>$coach->id,
                        'b_id'=>$booking->id,
                        'bookingdate'=>$request->bookingdate,
                        'bookingtime'=>$request->bookingtime,
                    ]);

                    for ($i=1; $i <= 15 ; $i++) {
                        BookingSlots::create([
                                'coach_id'=>$coach->id,
                                'b_id'=>$booking->id,
                                'bookingdate'=>$request->bookingdate,
                                'bookingtime'=>date('H:i', strtotime($request->bookingtime) + $i*60),
                            ]);
                    }

                return redirect()->route('student.profile.bookings')->with('success_message', 'Your Free Session Was Booked Successfully!');
            }

            try {
            $charge = Stripe::charges()->create([
                'amount' => $request->price,
                'currency' => 'USD',
                'source' => $request->stripeToken,
                'description' => 'Payment for booking '.$request->bookinghrs.' hour(s) of session for '.$subject->title.' with '.$coach->name,
                //'receipt_email' => $request->email,
                'metadata' => [
                ],
            ]);
            // SUCCESSFUL
            $booking = Booking::create([
                'student_id'=>Auth::id(),
                'coach_id'=>$coach->id,
                'subject_id'=>$subjectId,
                'subject_name'=>$subject->title,
                'bookingdate'=>$request->bookingdate,
                'bookingtime'=>$request->bookingtime,
                'bookinghrs'=>$request->bookinghrs,
                'bookingend'=> date('H:i', strtotime($request->bookingtime) + $request->bookinghrs*60*60),
                'subject_id'=>$subjectId,
                'price'=>$request->price,
                'type'=>'Paid',
                'payment'=>'Successful',
                'txn_id'=>uniqid().Auth::id(),
                'session_id'=>'session_'.uniqid().rand(99,1000).Auth::id()
            ]);

            CoachStudentList::where('student_id', Auth::id())->where('coach_id', $coach->id)->updateOrCreate(
                [
                    'student_id'=>Auth::id(),
                    'coach_id'=>$coach->id
                ],
             );

            $slot1 = BookingSlots::create([
                        'coach_id'=>$coach->id,
                        'b_id'=>$booking->id,
                        'bookingdate'=>$request->bookingdate,
                        'bookingtime'=>$request->bookingtime,
                    ]);

            for ($i=1; $i <= $request->bookinghrs*60 ; $i++) {
                BookingSlots::create([
                        'coach_id'=>$coach->id,
                        'b_id'=>$booking->id,
                        'bookingdate'=>$request->bookingdate,
                        'bookingtime'=>date('H:i', strtotime($request->bookingtime) + $i*60),
                    ]);
            }

            //Mail::send(new OrderPlaced($order));
            //return redirect()->route('confirmation.index')->with('success_message', 'Thank you! Your payment has been successfully accepted!');
            //return back()->with('success_message', 'Thank you! Your payment was successful!');
            return redirect()->route('student.profile.bookings')->with('success_message', 'Your Session Was Booked Successfully!');

           } catch (CardErrorException $e) {
             return back()->withErrors('Error! ' . $e->getMessage());
           }
       
    }

    public function updateBooking(Request $request, $id){

        $slot_old = BookingSlots::where('b_id', $id)->delete();
        $booking = Booking::findOrFail($id);
        $booking->update([
                'bookingdate'=>$request->bookingdate,
                'bookingtime'=>$request->bookingtime,
                'bookingend'=> date('H:i', strtotime($request->bookingtime) + $booking->bookinghrs*60*60),
                'joined'=>0
            ]);
        $slot1 = BookingSlots::create([
                'coach_id'=>$booking->coach_id,
                'b_id'=>$id,
                'bookingdate'=>$request->bookingdate,
                'bookingtime'=>$request->bookingtime,
            ]);
        if($booking->type == 'Free'){
            for ($i=1; $i <= 15 ; $i++) {
                BookingSlots::create([
                    'coach_id'=>$booking->coach_id,
                    'b_id'=>$id,
                    'bookingdate'=>$request->bookingdate,
                    'bookingtime'=>date('H:i', strtotime($request->bookingtime) + $i*60),
                ]);
            }
        }

        else{
            for ($i=1; $i <= $booking->bookinghrs*60 ; $i++) {
                BookingSlots::create([
                    'coach_id'=>$booking->coach_id,
                    'b_id'=>$id,
                    'bookingdate'=>$request->bookingdate,
                    'bookingtime'=>date('H:i', strtotime($request->bookingtime) + $i*60),
                ]);
            }
        }

        return redirect()->route('profile.dashboard')->with('success_message', 'Session Booking Updated!');

    } 

     public function cancelBooking($id){
        $slot_old = BookingSlots::where('b_id', $id)->delete();
        $booking = Booking::findOrFail($id);
        $booking->update([
                'joined'=>2, //2 -> cancelled
            ]);

        return redirect()->route('profile.dashboard')->with('success_message', 'Session Booking Cancelled!');
    } 
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;
use App\Models\User;

class Registercontroller extends Controller
{
    public function index()
    {
        return view("register");
    }
    public function register(Request $request)  
    {
        $request->validate([
            'name'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
            'confirm_password'=> 'required|same:password',
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return redirect()->route('register')->with('success', 'Registration Successful');


        
    }

    public function login()
    {
        return view('login');
    }

    public function user_login(Request $request) {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
           
        ]);
        
        // if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        //     // Authentication passed, redirect to home
            return redirect()->route('home');
        // }
    
        // Authentication failed, redirect back with an error message
        // return redirect()->route('login')->with('error', 'Invalid credentials');
       
        // print_r($request->all());
            
         }
    
         public function home()
         {
              $users = User::all();
              return view('home', compact('users'));
            // return view('home');
         }

         public function navbar()
         {
            return view ('navbar');
         }

         public function manage()
         {
            $users = User::orderBy('id', 'ASC')->get();
            return view('manage', compact('users'));
            // return view ('manage');
         }

         public function read($id)
         {
            $user = User::find($id);
            return view('read', compact('user'));
            // return view('read');
         }

         public function update($id)
         {
            $user = User::find($id);
            return view('update',compact('user'));
         }

         public function user_update(Request $request) {
            $request->validate([
                'name' => 'required|string|max:255',
                'country' => 'required|string',
                'state' => 'required|string',
                'city' => 'required|string',
                'userimage' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
           $user = User::find($request->id);
           $user->name = $request->name;
           $user->country = $request->country;
           $user->state = $request->state;
           $user->city = $request->city;
           if ($request->hasFile('userimage')) {
            $imagePath = $request->file('userimage')->store('user_images', 'public');
            $user->image_path = $imagePath;
        }
          $user->save();
          return redirect()->route('update')->with('error', 'Invalid credentials');

         }

         public function manage_admission()
         {
            $users = User::where('role', 'admission')->get();
            return view('manage_admission', ['users' => $users]);
            // return view('manage_admission');
         }
         
         public function manage_teacher()
         {
            $users = User::where('role', 'teacher')->get();
            return view('manage_teacher', ['users' => $users]);
            // return view('manage_teacher');
         }

         public function manage_student()
         {
            $users = User::where('role', 'student')->get();
            return view('manage_student', ['users' => $users]);
            // return view('manage_student');
         }
        
         public function delete(Request $request)
         {
            {
               try {
                   // Get the delete ID from the request
                   $deleteId = $request->input('delete_id');
       
                   // Find the user by ID and delete
                   $user = User::find($deleteId);
       
                   if ($user) {
                       $user->delete();
                       return response()->json(['message' => 'Record deleted successfully']);
                   } else {
                       return response()->json(['message' => 'User not found'], 404);
                   }
               } catch (\Exception $e) {
                   return response()->json(['message' => 'Error deleting record', 'error' => $e->getMessage()], 500);
               }
           }
         }

        public function change(Request $request){
            if($request->has('teacher_btn_set')){
                $user = User::find($request->teacher_id);
                $user->role = 'teacher';
                $user->save();
            }
            if($request->has('student_btn_set')){
                $user = User::find($request->student_id);
                $user->role = 'student';
                $user->save();
            }
            if($request->has('admission_btn_set')){
                $user = User::find($request->admission_id);
                $user->role = 'admission';
                $user->save();
            }
        }

        public function profile()
        {
            return view('profile');
        }

        public function admission()
        {
            try {
                $users = User::whereIn('role', ['user', 'student'])
                    ->orderBy('id', 'ASC')
                    ->get();
        
                if ($users->count() > 0) {
                    return view('admission', ['users' => $users]);
                } else {
                    return view('login')->with('error', 'No records were found.');
                }
            } catch (\Exception $e) {
                return view('login')->with('error', 'Oops! Something went wrong. Please try again later.');
            }
            // return view('admission');
        }

        public function manage_user_ad()
        {
            try {
                $users = User::whereIn('role', ['student', 'user'])
                    ->orderBy('id', 'ASC')
                    ->get();
        
                return view('manage_user_ad', ['users' => $users]);
            } catch (\Exception $e) {
                return view('login')->with('error', 'Oops! Something went wrong. Please try again later.');
            }
            // return view('manage_user_ad');
        }

        public function manage_student_ad()
        {
            try {
                $students = User::where('role', 'student')->get();
        
                return view('manage_student_ad', ['students' => $students]);
            } catch (\Exception $e) {
                return view('login')->with('error', 'Oops! Something went wrong. Please try again later.');
            }
            // return view('manage_student_ad');
        }

        public function teacher()
        {
            try {
                $students = User::where('role', 'student')->orderBy('id')->get();
    
                if ($students->count() > 0) {
                    return view('teacher', ['students' => $students]);
                } else {
                    return view('login')->with('error', 'No records were found.');
                }
            } catch (\Exception $e) {
                return view('login')->with('error', 'Oops! Something went wrong. Please try again later.');
            }
            // return view('teacher');
        }
        
        public function manage_student_marks()
        {
            return view('manage_student_marks');
        }

       


        
}

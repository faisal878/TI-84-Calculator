<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Otp;
use App\Models\Otps;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // Import Auth facade
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = Role::where('name', '!=', 'Super Admin')->get();
        return view('admin.management.create-new-user', compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function validator(array $data)
    {
        return FacadesValidator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:11'], 
            'password' => ['required', 'string', 'min:8', 'confirmed'], 
            'password_confirmation' => ['required_with:password|same:password'], // Fixed case
        ]);
    }

    public function register(Request $request)
    {
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('users', 'public'); // saves in storage/app/public/users
        }

        if ($request->has('id')) {
            $user = User::findOrFail(decrypt($request->id));
            
            $oldData = clone $user;
            // Only update non-empty fields
            $user->first_name   = $request->filled('first_name') ? $request->first_name : $user->first_name;
            $user->last_name    = $request->filled('last_name') ? $request->last_name : $user->last_name;
            $user->phone        = $request->filled('phone') ? $request->phone : $user->phone;
            $user->email        = $request->filled('email') ? $request->email : $user->email;
            $user->cnic         = $request->filled('cnic') ? $request->cnic : $user->cnic;
            $user->designation  = $request->filled('designation') ? $request->designation : $user->designation;
            $user->image        = $imagePath ?? $user->image;

            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }

            if (empty($user->username)) {
                 $firstInitial = strtolower(Str::slug($user->first_name));
                $lastPart = strtolower(Str::substr($user->last_name, 0, 1));
                $baseUsername = $firstInitial;
                
                $lastSimilar = \App\Models\User::where('username', 'LIKE', $baseUsername . '%')
                    ->orderBy('username', 'desc')
                    ->first();

                if ($lastSimilar) {
                    $number = (int) preg_replace('/\D/', '', Str::after($lastSimilar->username, $baseUsername));
                    $number++;
                } else {
                    $number = 1;
                }
                $formattedNumber = str_pad($number, 3, '0', STR_PAD_LEFT);
                $username = $baseUsername . $formattedNumber;
                $user->username = $username;
            }
            $user->save();
            if($request->role){
                $role = decrypt($request->role);
                $user->assignRole($role);
            }
            // log_activity('update', $user, $oldData->toArray(), $user->toArray());
            return redirect()->back()->with('success', 'Registration successful!');

        } else {
 
            $firstName = $request->first_name ?? 'user';
            $lastName  = $request->last_name ?? Str::random(3);

            $firstInitial = strtolower(Str::slug($firstName));
            $lastPart = strtolower(Str::substr($lastName, 0, 1));
            $baseUsername = $firstInitial;

            $lastSimilar = \App\Models\User::where('username', 'LIKE', $baseUsername . '%')
                ->orderBy('username', 'desc')
                ->first();

            // 3. Extract number
            if ($lastSimilar) {
                $number = (int) preg_replace('/\D/', '', Str::after($lastSimilar->username, $baseUsername));
                $number++;
            } else {
                $number = 1;
            }

            // 4. Format final username
            $formattedNumber = str_pad($number, 3, '0', STR_PAD_LEFT);
            $username = $baseUsername . $formattedNumber;

            $user = User::create([
                'first_name'  => $request->first_name,
                'last_name'   => $request->last_name,
                'username'    => $username, // <<== include this
                'phone'       => $request->phone,
                'email'       => $request->email ?? null,
                'cnic'        => $request->cnic,
                'designation' => $request->designation,
                'image'       => $imagePath,
                'password'    => Hash::make($request->password),
            ]);
        }

        $role = decrypt($request->role);
        $user->assignRole($role);
        // log_activity('update', $user, null, $user->toArray());
        return redirect()->route('user-management')->with('success', 'Registration successful!');
    }

    public function authentication(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);

        
        if (Auth::attempt($credentials)) {
            
            $user = Auth::user();
            $isApi = $request->wantsJson() || $request->is('api/*');

            if (!$isApi) {
                $request->session()->regenerate();
            }

            event(new \Illuminate\Auth\Events\Login(
                Auth::getDefaultDriver(),
                $user,
                $request->has('remember')
            ));

            // log_activity('login', $user, null, $user->toArray());

           
           
            return redirect()->route('dashboard');
        }

        if ($request->wantsJson() || $request->is('api/*')) {
        //    return apiResponse(false, 'Invalid credentials', null, 401);
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function store(Request $request)
    {

        $email = Crypt::decrypt($request->email);

        $user = User::select()->where('email', $email)->first();
        if ($user) {
        
            if ($request->has('Password')) {
                $user->password = Hash::make($request->Password);
            }

            $user->save();
            return redirect()->route('login');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = User::all();
        return view('admin.management.user-management',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id = decrypt($id);
        $user = User::find(intval($id));
        $role = Role::where('name', '!=', 'Super Admin')->get();
        return view('admin.management.edit-user',compact('user','role'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request)
    // {
    //     $source = $request->email;

    //     $user = User::select()->where('email', $source)->first();

    //     if($user){
    //         $OTP = rand(100000, 999999);
    //         $details =[
    //             'source' => $source,
    //             'otp' => $OTP,
    //         ];
            
    //         Mail::raw('Your OTP code is '.$OTP, function ($message) use ($source) {
    //             $message->to($source)->subject('Authenticate Your Account with OTP');
    //         });

    //         DB::beginTransaction();
    //             try{
    //                 $expiresAt = Carbon::now()->addMinutes(2);
    //                 $store =[
    //                     'source' => $source,
    //                     'otp' => $OTP,
    //                     'expires_at' => $expiresAt,
    //                 ];
    //                 Otps::create($store);
    
    //                 DB::commit();
    //                 $encryptedData = Crypt::encrypt($source);
    //                 return redirect()->route('enter.otp', ['email' => $encryptedData]);
    
    //            }catch(\Exception $ex){
    //                 return redirect()->back()->with('error', 'Something went wrong.');
    //            }
    //     }else{
    //         return redirect()->back()->with('error', 'User is not found.');
    //     }
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail(decrypt($id));
        $user->delete(); // Soft delete

        // log_activity('delete', $user, $user->toArray(), null);

        return response()->json(['success' => true], 200);
    }

    public function logout(Request $request)
    {
        $user = $request->user();
      
        if ($user) {
            // log_activity('logout', $user, null, [
            //     'ip' => $request->ip(),
            //     'user_agent' => $request->userAgent()
            // ]);
        }

        

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'You have been logged out successfully!');
    }


    // public function activitLogs($id) {
    //     $id = decrypt($id);
    //     $user = User::find(intval($id));
    //     $activityLogs = ActivityLog::with('mode') // eager load related model
    //         ->where('user_id', $user->id)
    //         // ->where('user_id', '1')
    //         ->whereNotIn('model_type', ['App\Models\AccountBalances'])
    //         ->latest()
    //         ->paginate(25);
    //     return view('amdin.management.activity-logs', compact('activityLogs', 'user'));
    // }

    public function showLoginForm(){
        return view('admin.login');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Friendship;

class UsersController extends Controller
{
	
    public function login()
    {
    	
    		return view('login.login');
    	
    	
    }

    public function store(Request $request)
    {
    	 $data = $request->only('email', 'password');

    	
    	/* $data['password'] = Hash::make($data['password']);*/
    	if (Auth::attempt($data)) {
    		return redirect()->route('dashboard');
    	} else {
    		return redirect()->route('login')->withErrors(['Invalid Email and password']);
    	}
    	
    }

    public function dashboard()
    {
    	return view('dashboard.index');
    }
    public function logout(Request $request)
     {
	  Auth::logout();
	  return redirect('/');
	}

	public function updatePassword()
	{
		return view('users.edit');
	}

	public function passwordStore(Request $r)
	{
		$r->validate([
			'password' => 'min:8',
    		'confirmed' => 'required_with:password|same:password|min:8'
		]);
		$id = Auth::id();
		$user = User::find($id);
		$password = Hash::make($r->password);
		$user->update([
			'password' => $password
		]);
		return 'password update Successfully';
	}
	public function editPic()
	{
		return view('users.editPic');
	}
	public function updatePic(Request $request)
	{
		$newImageName = time().'-'.$request->name. '.' . $request->photo->extension();

        $photo = $request->photo->move(public_path('users_photo'),$newImageName);

        $id = Auth::id();
		$user = User::find($id);

		$user->update([
			'photo'=> $newImageName
		]);

		return redirect('/dashboard');


	}
	public function index()
	{
		 $this->data['friends'] = Friendship::select('*')
    	 ->where('accept_id','=', Auth::id())
    	 ->where('status',1)
    	 ->where('reject',0)
    	 ->get();
		$this->data['users'] = User::all();
		return view('users.index',$this->data);
	}

	public function create_user()
	{
		return view('users.create');
	}
	public function create_user_store(Request $request)
	{
		
		
       $request->validate([
        	'name' => 'required',
        	'email' => 'required',
        	'password' => 'required',
        	'photo' => 'required'

        ]);
        $user = new User();
        
       $newImageName = time().'-'.$request->name. '.' . $request->photo->extension();

        $photo = $request->photo->move(public_path('users_photo'),$newImageName);

        $password = Hash::make($request->input('password'));

       $user = new User();
       $user->name = $request->input('name');
       $user->email = $request->input('email');
       $user->password = $password;
       $user->photo = $newImageName;
       $user->save();
       $user->profile()->create([
       		'user_id'=> $user->id,
       		'f_name' => $request->f_name,
       		'm_name' => $request->m_name,
       		'phone' => $request->phone,
       		'skill' => $request->skill,

       		'experience' => $request->experience,
       		'education' => $request->education,
       		'location' => $request->location,
       		'note' => $request->note
       ]);

        return redirect('/users/create')->with('message','User created Successfully');
	}
}

<?php
namespace App\Http\Controllers\Auth;
use App\User;
use JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Auth;
class RegisterController extends Controller
{
    use RegistersUsers;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
    }
    public function store(Request $request)
    {
        $this->validator($request->all());
        $user = $this->create($request->all());
        $credentials = $request->only(['email', 'password']);
        try {
            if(!$token = JWTAuth::attempt($credentials)) 
            {
              return response()->json(
                  [
                      'message' => 'Bed credentials!',
                      'error' => 'bed credentials'
                  ], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        //autorizuj korisnika i vrati ga sa tokenom 
        $authorisedUser = Auth::user();
        return response()->json(compact('token', 'authorisedUser'));
      }
    }
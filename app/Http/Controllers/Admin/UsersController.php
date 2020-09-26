<?php

namespace Bett\Http\Controllers\Admin;

use Bett\Http\Controllers\SiteController;
use Bett\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class UsersController extends SiteController
{
    public function __construct()
    {
        $this->template = 'admin.users.frame';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->IsForecaster(0)->paginate(12);

        $this->vars['content'] = view('admin.users.index')->with('users', $users)->render();

        return $this->renderOutput();
    }

    public function addUser(Request $request)
    {
        $data = $request->get('data');
        /**
         * Validation
         */
        $validator = Validator::make($data, [
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|max:60',
            'is_forecaster' => 'boolean'
        ]);

        $validator->sometimes('information', 'required|min:15|max:1000', function($input){
            return (int)$input->is_forecaster === 1;
        });

        $validator->sometimes('sort_id', 'exists:sorts,id', function ($input) {
            return (int)$input->is_forecaster === 1;
        });

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }

        /**
         * Add User
         */
        if($data['avatar']) {
            $avatarName = uniqid() . '.' . explode('/', explode(':', substr($data['avatar'], 0, strpos($data['avatar'], ';')))[1])[1];
            Image::make($data['avatar'])->save(public_path('avatars/') . $avatarName);
            $data['avatar'] = $avatarName;
        }
        $data['password'] = bcrypt($data['password']);
        $user = new User($data);
        $user->save();

        return response()->json($user);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateUser(Request $request)
    {
        $data = $request->get('data');
        /**
         * Validation
         */

        $validator = Validator::make($data, [
            'name' => 'required|string|max:50',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($data['id'])
            ],
            'is_forecaster' => 'boolean',
        ]);

        $validator->sometimes('information', 'required|min:15|max:1000', function ($input) {
            return (int)$input->is_forecaster === 1;
        });

        $validator->sometimes('sort_id', 'exists:sorts,id', function ($input) {
            return (int)$input->is_forecaster === 1;
        });

        $validator->sometimes('password', 'required|string|min:6|max:60', function($input){
            return !empty($input->password);
        });

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        /**
         * Edit User
         */
        $user = User::find((int)$data['id']);
        if($data['avatar'] && $data['avatar']!==asset('/avatars/'.$user->avatar)) {
            $avatarName = $data['id'] . '.' . explode('/', explode(':', substr($data['avatar'], 0, strpos($data['avatar'], ';')))[1])[1];
            Image::make($data['avatar'])->save(public_path('avatars/') . $avatarName);
            $data['avatar'] = $avatarName;
        }else{
            $data['avatar'] = $user->avatar;
        }

        if(!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }


        $user->update($data);
        if($user->avatar) {
            $user->avatar = asset('avatars/' . $user->avatar);
        }
        return response()->json($user);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getUser(Request $request)
    {
        $user_id = $request->get('user_id');
        $user = User::find($user_id);
        if($user->avatar) {
            $user->avatar = asset('avatars/' . $user->avatar);
        }
        return response()->json($user);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

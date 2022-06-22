<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use File;
use Image;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function saveData($request){
        $post = $request->all();

        if(!empty($post['id'])){
            $user = User::where('id', $post['id'])->first();
        } else {
            $user = new User();
        }

        $user->name = ucwords($post['name']);
        $user->email = $post['email'];
        $user->phone = $post['phone'];
        $user->address = $post['address'];
        $user->date_of_birth = $post['date_of_birth'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $uploadImageTempPath = public_path() . '/uploads/user';
            if (!is_dir($uploadImageTempPath)) {
                File::makeDirectory($uploadImageTempPath, $mode = 0777, true, true);
            }
            $fileName = $file->getClientOriginalName();
            $fileExtendedName = time() . $fileName;
            $file->move($uploadImageTempPath, $fileExtendedName);

            $user->image = $fileExtendedName;
        }

        $user->save();
    }    
}

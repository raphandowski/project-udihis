<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserController
 *
 * @author irene
 */
class UserController extends BaseController {

    
    public function __construct(){
            $this->beforeFilter('auth', array('except'=>array('getIndex','login')));
    }

    protected $layout = 'layouts.master';



    public function getIndex() {
        $this->layout->content = View::make('login.login_page');
    }
    public function login() {

        $userdata = array(
            'username' => Input::get('username'),
            'password' => Input::get('password')
            );

   if (Auth::attempt($userdata)) {

       if(Auth::user()->default_password == 1 ){

           return Redirect::to();

       }else{
           $level = Auth::user()->level;
           switch ($level) {
               case 0:
                   # code...
                   return Redirect::to('admin');
                   break;
               case 1:
                   # code...
                   return Redirect::to('dashboard');
                   break;
               case 2:
                   # code...
                   return Redirect::to('laboratory');
                   break;
               case 3:
                   # code...
                   return Redirect::to('reception');
                   break;
               case 4:
                   # code...
                   return Redirect::to('doctor');
               case 5:
                   # code...
                   return Redirect::to('billing');
                   break;
               case 6:
                   # code...
                   return Redirect::to('nurse');
                   break;
               case 7:
                   # code...
                   return Redirect::to('hr');
                   break;
                case 8:
                   # code...
                   return Redirect::to('supplies');
                   break;

               default:
                   # code...
                   break;
           }

       }




   }
   else{

        return View::make('login.login_page')->with('emsg', 'username/password incorrect!');
   }
       

}
        public function logout(){
            Auth::logout();
            return Redirect::to('login');
            
        }

        public function destroy($id){
            $user = User::find($id);
            $user->delete();
        }

        public function loaduser($id){
            $user = User::find($id);
            return View::make('admin.useredit', compact('user'));
        }

    public function accountUpdate($id)
    {
      $file = Input::file('img'); // your file upload input field in the form should be named 'file'
       $destinationPath = public_path().'/uploads';
       $filename = $file->getClientOriginalName();
       //$extension =$file->getClientOriginalExtension(); //if you need extension of the file
       $uploadSuccess = Input::file('img')->move($destinationPath, $filename);
       $RandNumber          = rand(0, 9999999999);
       if( $uploadSuccess ) {
           require_once('PHPImageWorkshop/ImageWorkshop.php');
           chmod($destinationPath."/".$filename, 0777);
           $layer = PHPImageWorkshop\ImageWorkshop::initFromPath(public_path().'/uploads/'.$filename);
           unlink(public_path().'/uploads/'.$filename);
           $layer->resizeInPixel(400, null, true);
           $layer->applyFilter(IMG_FILTER_CONTRAST, -16, null, null, null, true);
           $layer->applyFilter(IMG_FILTER_BRIGHTNESS, 9, null, null, null, true);
           $dirPath =public_path().'/uploads/' ."profiles";
           $filename = "_".$RandNumber.".png";
           $createFolders = true;
           $backgroundColor = null; // transparent, only for PNG (otherwise it will be white if set null)
           $imageQuality = 100; // useless for GIF, usefull for PNG and JPEG (0 to 100%)
           $layer->save($dirPath, $filename, $createFolders, $backgroundColor, $imageQuality);
           chmod($dirPath ."/".$filename , 0777);
       }

    $user = User::find($id);
      $inputs         = Input::all();
        $user            = User::find($id);
        $user->username = Input::get('username');
        $user->first_name = Input::get('firstname');
        $user->middle_name = Input::get('middlename');
        $user->last_name = Input::get('lastname');
        $user->profile_pic = $filename;
        $user->save();

        Session::flash('message', 'Successfully updated!');
        return Redirect::back();

    } 
      public function passwordUpdate($id){
    $validator = Validator::make(Input::all(), 
      array(
        'password1' => 'requred',
        'password2' => 'requred|min:6',
        'password3' => 'requred|same:password2',
        )
      );
    if ($validator->fails()){
return Redirect::back()->withErrors($validator)
                       ->withImputs();
    }

    else
    {


    }
    }
}

<?php


namespace App\Controllers;

use App\Models\User_model;
use App\Models\Profile_model;
use Ramsey\Uuid\Uuid;

class Auth extends BaseController
{
    public function index(): string
    {
        return view('auth/login');
    }
   
    public function register(): string
    {
        return view('auth/signup');
    }
    public function signup()
    {
        //var_dump($this->request->getPost());exit;
        if ($this->request->getPost('password') != $this->request->getPost('cpassword')) {
            session()->setFlashdata('msg', 'Passwords do not match');
            return redirect()->to('register');
        }

        $userModel = new User_model();
       $userModel->where('username', $this->request->getPost('email'))->first();
       if($userModel->where('username', $this->request->getPost('email'))->first()) {
            session()->setFlashdata('msg', 'User already exists');
            return redirect()->to('register');
        }


        $user_id = Uuid::uuid4()->toString();
        $userModel = new User_model();
        $data2 = [
            'user_id' => $user_id,
            'username'     => $this->request->getPost('email'),
            'password'  => hash('SHA512', $this->request->getPost('password')),
        ];
       $userModel->insert($data2);
        $data = [
            'profile_id' => Uuid::uuid4()->toString(),
            'user_id' => $user_id,
            'firstname' => $this->request->getPost('firstname'),
            'surname'   => $this->request->getPost('surname'),
            'email'     => $this->request->getPost('email'),
            'phone'     => $this->request->getPost('phone'),
            'role'      => $this->request->getPost('role'),
            'gender'    => $this->request->getPost('gender'),
            'address'   => $this->request->getPost('address'),

        ];
        $profileModel = new Profile_model();
        $flag = $profileModel->insert($data);
        if(!$flag) {
            session()->setFlashdata('msg', 'User registered successfully');
            return redirect()->to('/');
        }
        else{
            session()->setFlashdata('msg', 'User registration failed');
            return redirect()->to('register');
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
    public function login()
    {
    
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $userModel = new User_model();
        $user=  $userModel
        ->join('profile', 'users.user_id = profile.user_id')
        ->where('username', $username)
        ->where('password', hash('SHA512', $password))
        ->first();
      
        if(!$user) {
            session()->setFlashdata('msg', 'Incorrect username or password');
            return redirect()->to('login');
        }

       // session()->set('user', $user);
        $_SESSION['role'] = $user['role'];
        $_SESSION['firstname'] = $user['firstname'];
        $_SESSION['surname'] = $user['surname'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['phone'] = $user['phone'];
        $_SESSION['gender'] = $user['gender'];
        $_SESSION['address'] = $user['address'];
        $_SESSION['profile_id'] = $user['profile_id'];
        $_SESSION['user_id'] = $user['user_id'];

        if($user['role'] == 'Admin') {
            session()->setFlashdata('msg', 'Admin login successful');
            return redirect()->to('admin');
        }
        if($user['role'] == 'Driver') {
            session()->setFlashdata('msg', 'Driver login successful');
            return redirect()->to('driver');
        }
        if($user['role'] == 'Rider') {
            session()->setFlashdata('msg', 'Rider login successful');
            return redirect()->to('rider');
        }
       
    }
}

<?php

namespace App\Controllers;

use mysqli;
use WebFramework\AppController;
use WebFramework\Router;
use WebFramework\Request;

use App\Models\User;

class AuthController extends AppController
{
    public function register_view(Request $request){

        session_destroy();
        if (isset($_SESSION['errors']) && isset($_SESSION['user'])){
            $errors = $_SESSION['errors'];
            $user = $_SESSION['user'];
        }else{
            $errors = "";
            $user = "";
        }

        return $this->render('auth/register.html.twig', ['base' => $request->base, 'errors' => $errors, 'user' => $user,
            'error' => $this->flashError]);
    }

    public function register(Request $request)
    {
        session_unset();
        session_destroy();
        session_start();
        $username = "";
        $email = "";
        $errors = [];

        //username
        if ((strlen($request->params['username'])) > 3 && (strlen($request->params['username'])) <= 10) {
            $username = $request->params['username'];
            $user['username'] = $username;

        } else {
            $errors['username'] = 'Invalid username';
        }
        //email
        if (filter_var($request->params['email'], FILTER_VALIDATE_EMAIL)) {
            $email = $request->params['email'];
            $user['email'] = $email;
        } else {
            $errors['email'] = 'Invalid email';

        }


        if (isset($request->params['password']) && ($request->params['password'] == $request->params['passwordConf']) && ( (strlen($request->params['password'])) >= 8 && (strlen($request->params['username'])) <= 20 )) {
            $password = $request->params['password'];
            $hash_pass = password_hash($password, PASSWORD_BCRYPT);
            //password
        } else {
            $errors['passwordConf'] = 'Invalid password.';
        }

// Check if email already exists

        $conn = new mysqli('localhost', 'admin', 'mysql', 'mvc');
        $emailCheck = $request->params['email'];
        $sql = "SELECT * FROM users WHERE email LIKE '$emailCheck'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $errors['email'] = "Email already exists";
        }


        if (count($errors) === 0) {

            $role = "user";
            $userBanned = 0;
            $userAcountActive = 0;

            $user = new User();
            $user->setUsername($username);
            $user->setEmail($email);
            $user->setPassword($hash_pass);
            $user->setRole($role);
            $user->setIsUserBanned($userBanned);
            $user->setIsAcountActive($userAcountActive);


            try {
                $user->validate();
            } catch (\Exception $e) {
                $this->flashError->set($e->getMessage());
                $this->redirect('/' . $request->base . 'auth/register', '302');
                return;
            }

            $query = "INSERT INTO users SET username='$username', email='$email', password='$hash_pass', role ='$role', status_user='$userBanned', status_account='$userAcountActive'";
            $stmt = $conn->prepare($query);
            //$stmt->bind_param('ssssii', $username, $email, $password, $role, $userBanned, $userAcountActive);
            $result = $stmt->execute();

            if ($result) {
                $user_id = $stmt->insert_id;
                $stmt->close();

                // TO DO: send verification email to user
                // sendVerificationEmail($email, $token);

                $_SESSION['id'] = $user_id;
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;
                $_SESSION['verified'] = false;
                $_SESSION['message'] = 'You are logged in!';
                $_SESSION['type'] = 'alert-success';
                $_SESSION['role'] = $role;
                $_SESSION['status_user'] = $userBanned;
                $_SESSION['status_account'] = $userAcountActive;

                header('location: home.php');
            } else {
                $_SESSION['error_msg'] = "Database error: Could not register user";
            }

        } else {
            $_SESSION['user']=$user;
            $_SESSION['errors'] = $errors;
            header('location: /PHP_Rush_MVC/WebRoot/');
        }


    }


    public function login_view(Request $request)
    {
        session_destroy();

        if (isset($_SESSION['errors'])){
            $errors = $_SESSION['errors'];
        }else{
            $errors = "";
        }

        return $this->render('auth/login.html.twig', ['base' => $request->base, 'errors' => $errors,
            'error' => $this->flashError]);
    }

    public function login(Request $request)
    {
        session_destroy();
        session_start();
        $errors=[];
        $conn = new mysqli('localhost', 'admin', 'mysql', 'mvc');

        if (empty($request->params['email'])) {
            $errors['email'] = 'Email required';
        }
        if (empty($request->params['password'])) {
            $errors['password'] = 'Password required';
        }
        $email = $request->params['email'];
        $password = $request->params['password'];


        if (count($errors) === 0) {

            $query = "SELECT * FROM users WHERE email='$email'";
            $stmt = $conn->prepare($query);
           // $stmt->bind_param('ss', $username, $password);

            if ($stmt->execute()) {
                $result = $stmt->get_result();
                $user = $result->fetch_assoc();

                if (password_verify($password, $user['password'])) { // if password matches
                    $stmt->close();

                    $_SESSION['id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['verified'] = $user['verified'];
                    $_SESSION['role'] = $user['role'];
                    $_SESSION['message'] = 'You are logged in!';
                    $_SESSION['type'] = 'alert-success';
                    header('location: home.php');
                    exit(0);
                } else { // if password does not match

                    $errors['login_fail'] = "Wrong email or password! Try again!";
                    $_SESSION['errors'] = $errors;
                    header('location: /PHP_Rush_MVC/WebRoot/login');
                }
            } else {
                $_SESSION['message'] = "Database error. Login failed!";
                $_SESSION['type'] = "alert-danger";
            }
        }

    }


    public function logout()
    {
        unset($_SESSION);
        session_destroy();
        header("Location: /PHP_Rush_MVC/WebRoot/login");

    }






















}

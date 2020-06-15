<?php

namespace App\Controllers;

use mysqli;
use PDO;
use WebFramework\AppController;
use WebFramework\ORM;
use WebFramework\Router;
use WebFramework\Request;

use App\Models\User;

class UserController extends AppController
{
    public function user_view(Request $request)
    {

        $sql = "SELECT * from users;";
        $orm = ORM::getInstance();

        $users = $orm->queryDB($sql);


        return $this->render('auth/admin/users.html.twig', [
            'base' => $request->base,
            'users' => $users,
            'error' => $this->flashError,
            //'isAdmin' => $this->checkIsAdmin(),
            //'isWriter' => $this->checkIsWriter(),
            //'isUser' => $this->checkIsUser(),
        ]);
    }

        /*public function checkIsAdmin()
        {
            return $_SESSION['role'] === "admin";
        }

        public function checkIsWriter()
        {
            return $_SESSION['role'] === "writer";
        }

        public function checkIsUser()
        {
            return $_SESSION['role'] === "user";
        }*/


    public function edit($id)
    {
        $id = $_GET['id'];

        $sql = "SELECT * from users where id LIKE '$id';";
        $orm = ORM::getInstance();

        $user = $orm->queryDB($sql);

        return $this->render('auth/admin/editUser.html.twig', [
            'user' => $user,
        ]);

    }

    public function deleteUser(Request $request){
        $id = $_GET['id'];

        $sql = "DELETE from users where id LIKE '$id';";
        $orm = ORM::getInstance();

        $user = $orm->queryDB($sql);

        echo "success";

    }

    public function updateUser(Request $request){
        $id = $_GET['id'];

        $sql = "SELECT * from users where id LIKE '$id';";
        $orm = ORM::getInstance();
        $user = $orm->queryDB($sql);

        $user[0]['username'] = $request->params['username'];
        $user[0]['role'] = $request->params['role'];
        $user['action']='update_user';

        $orm->persist($user);

    }


    public function addUser(Request $request)
    {
        if (isset($_SESSION['userCreationerrors'])){
            $creationErrors = $_SESSION['userCreationerrors'];
        }else{
            $creationErrors = [];
        }

        return $this->render('auth/admin/createUser.html.twig', ['base' => $request->base, 'creationErrors' => $creationErrors,
            'error' => $this->flashError]);
    }


    public function createUser(Request $request)
    {
        $errors = [];
        $username = "";
        $email = "";
        if (!isset($request->params['role'])){
            $role="user";
        }else{
            $role=$request->params['role'];
        }


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
            $result = $stmt->execute();

            if ($result) {
                $stmt->close();

                header('location: /PHP_Rush_MVC/WebRoot/admin/users');
            } else {
                $_SESSION['error_msg'] = "Database error: Could not register user";
            }

        } else {
            $_SESSION['userCreationerrors'] = $errors;
            header('location: /PHP_Rush_MVC/WebRoot/admin/users/createUser');
        }


    }










}

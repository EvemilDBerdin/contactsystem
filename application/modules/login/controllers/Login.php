<?php

class Login extends MY_Controller
{
    public function index()
    {
        (isset($_SESSION['userdata'])) && redirect(base_url('systems'));
        $data['title'] = SYSTEMTITLE;

        $this->load->view('login', $data); 
    }

    public function auth()
    {
        try {
            $username = $_POST['username'];
            $password = md5($_POST['password']);

            $options['where'] = array(
                'email' => $username,
            );
            $result = getrow('tbl_users', $options, 'row');
            if ($result) {
                $options1 = array(
                    'where' => array(
                        'email' => $username,
                        'password' => $password
                    ), 
                );
                $res = getrow('tbl_users', $options1, 'row');
                if ($res) {
                    $this->session->set_userdata('type', $res->user_type);
                    $this->session->set_userdata('userdata', $res);
                    response('200', "success", "You are successfull login."); 

                } else {
                    response(400, "error", "incorrect password!");
                }

            } else {
                response(400, "error", "Username doesnt exists!");
            }
        } catch (Exception $error) {
            response(400, "error", $error);
        }
    }

    public function registrationForm()
    {
        try {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];

            if ($password == $cpassword) {
                $options['where'] = array(
                    'email' => $email,
                );
                $result = getrow('tbl_users', $options, 'row');
                if ($result) {
                    response(400, "error", "Email already exists!");
                } else {
                    $time = time() . 1234567890;
                    $uniqidd = uniqid($time);
                    
                    $data = array(
                        'username' => $username,
                        'password' => md5($password),
                        'email' => $email,
                        'user_type' =>$uniqidd
                    );
                    insert('tbl_users', $data);
                    $this->session->set_userdata('type', $uniqidd);
                    $this->session->set_userdata('userdata', $data);
                    response(200, "success", "Thank you for registering!");
                }
            } else {
                response(400, "error", "Password doesnt match!");
            }
        } catch (Exception $error) {
            response(400, "error", $error);
        }
    }

    public function logout()
    {
        if (isset($_SESSION['userdata'])) {
            session_unset();
            session_destroy();
            redirect(base_url());
        } else {
            redirect(base_url());
        }
    }
}

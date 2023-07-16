<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Auth_model');
    }
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Login Page";
            $this->load->view('templates/header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/footer');
        } else {
            $this->login();
        }
    }

    private function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->Auth_model->get_user_by_email($email);
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'roleId' => $user['roleId']
                ];
                $this->session->set_userdata($data);
                redirect('user');
            } else {
                $this->session->set_flashdata('message', "Your password is wrong!");
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', "The email isn't registered!");
            redirect('auth');
        }
    }

    public function register()
    {
        $this->form_validation->set_rules("firstname", "Firstname", "required");
        $this->form_validation->set_rules('lastname', 'Lastname', "required");
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Register Page";
            $this->load->view('templates/header', $data);
            $this->load->view('auth/register');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'email' => $this->input->post('email'),
                'roleId' => "2",
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            ];

            $this->Auth_model->create_user($data); // Use the Auth_model to create user
            $this->session->set_flashdata('message', "Congratulations! Your account has been created, let's login right now!");
            redirect('auth');
        }
    }
}

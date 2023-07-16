<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_model');
    }

    public function index()
{
    $data['title'] = "Dashboard";
    $data['user'] = $this->User_model->get_user_by_email($this->session->userdata('email'));
    $data['firstname'] = $data['user']['firstname'];
    $this->load->view('templates/header', $data);
    $this->load->view('user/dashboard', $data);
    $this->load->view('templates/footer');
}

public function profile()
{
    $data['title'] = "Profile";
    $data['user'] = $this->User_model->get_user_by_email($this->session->userdata('email'));
    $data['role'] = $this->User_model->get_role_by_id($this->session->userdata('roleId'));
    $data['id'] = $data['user']['id'];
    $data['firstname'] = $data['user']['firstname'];
    $data['lastname'] = $data['user']['lastname'];
    $data['email'] = $data['user']['email'];
    $data['roleId'] = $data['role']['name'];
    $this->load->view('templates/header', $data);
    $this->load->view('user/profile', $data);
    $this->load->view('templates/footer');
}

    public function password()
    {
        $this->form_validation->set_rules("oldPassword", "OldPassword", "required");
        $this->form_validation->set_rules('newPassword', 'NewPassword', "required");
        if ($this->form_validation->run() == false) {
            $data['title'] = "Password";
            $this->load->view('templates/header', $data);
            $this->load->view('user/password', $data);
            $this->load->view('templates/footer');
        }else{
            $oldPassword = $this->input->post('oldPassword');
            $newPassword = $this->input->post('newPassword');
            $user = $this->User_model->get_user_by_email($this->session->userdata('email'));
            // $user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            if($user){
                if(password_verify($oldPassword, $user['password'])){
                    $data = [
                        'password' => password_hash($this->input->post('newPassword'), PASSWORD_DEFAULT)
                    ];
                    $this->db->where(['email' => $user['email']]);
                    $this->db->update('users',['password' => $data['password']]);
                    redirect('user');
                }else{
                    $this->session->set_flashdata('message', "Your Old password is wrong!");
                    redirect('user/password');
                }
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                User wasnt found!
              </div>');
                redirect('user/password');
            }
            $data['user'] = $this->User_model->update_password($this->session->userdata('email'))->row_array();
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('roleId');
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', "Logout successfully!");
        redirect('auth');   
    }
}

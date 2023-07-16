<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_user_by_email($email)
    {
        return $this->db->get_where('users', ['email' => $email])->row_array();
    }

    public function get_role_by_id($roleId)
    {
        return $this->db->get_where('roles', ['id' => $roleId])->row_array();
    }

    public function update_password($email, $newPassword)
    {
        $data = [
            'password' => password_hash($newPassword, PASSWORD_DEFAULT)
        ];

        $this->db->where('email', $email);
        return $this->db->update('users', $data);
    }
}
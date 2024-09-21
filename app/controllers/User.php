<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class User extends Controller
{
    // call user_model
    public function __construct()
    {
        parent::__construct();
        $this->call->model('user_model');
    }
    //diplay all user_model data from database to user_table
    public function user()
    {
        $data['user'] = $this->user_model->display_users();
        $this->call->view('user_table', $data);
    }
    //get data from user_table and pass it to user_model's create method
    public function create()
    {
        if ($this->form_validation->submitted()) {
            $last_name =   $this->io->post('last_name');
            $first_name = $this->io->post('first_name');
            $email = $this->io->post('email');
            $gender = $this->io->post('gender');
            $address = $this->io->post('address');

            if ($this->user_model->create($last_name, $first_name, $email, $gender, $address)) {
                set_flash_alert('success', 'User successfully added!');
                redirect();
            } else {
                set_flash_alert('error', 'Failed to add user!');
                redirect();
            }
        }
    }
    //get data from user_table via id and pass it to user_model's fetch_user method
    public function fetch_user($id)
    {
        $data['id'] = $this->user_model->fetch_user($id);
        echo json_encode($data);
    }
    //get data from user_table  and pass it to user_model's update method
    public function update()
    {
        if ($this->form_validation->submitted()) {
            $id = $this->io->post('id');
            $last_name =   $this->io->post('last_name');
            $first_name = $this->io->post('first_name');
            $email = $this->io->post('email');
            $gender = $this->io->post('gender');
            $address = $this->io->post('address');

            if ($this->user_model->update($id, $last_name, $first_name, $email, $gender, $address)) {
                set_flash_alert('success', 'User successfully updated!');
                redirect();
            } else {
                set_flash_alert('error', 'Failed to update user!');
                redirect();
            }
        }
    }
    // get id from user_table and pass it to user_model's delete method
    public function delete()
    {
        if ($this->form_validation->submitted()) {
            $id = $this->io->post('id');
            if ($this->user_model->delete($id)) {
                set_flash_alert('success', 'User successfully deleted!');
                redirect();
            } else {
                set_flash_alert('error', 'Failed to delete user!');
                redirect();
            }
        }
    }
}

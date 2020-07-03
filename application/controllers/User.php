<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function index()
        {
            //load model
            $this->load->model('m_user');

            $data = array(
                'data_user' => $this->m_user->get_user()->result()
            );
            //load view
            $this->load->view('user', $data);
        }

    public function tambah()
        {
          //load view
          $this->load->view('user_add');
        }


    public function simpan()
        {
       //load model
       $this->load->model('m_user');

        //get data dari form
        $name            = $this->input->post('name');
        $email           = $this->input->post('email');
        $password        = $this->input->post('password');

        $data = array(
             'name'         => $name,    
             'email'        => $email,
             'password'     => $password    
        );

        //insert data via model
        $this->m_user->save_user($data);

        //redirect ke controller siswa
        redirect('user');

         }

         public function edit($id)
            {
              //load model 
              $this->load->model('m_user');

              //get ID dari URL segment ke 3
              $id = $this->uri->segment(3);

              $data = array(
                 'user' => $this->m_user->edit_user($id)
              );

               //load view
               $this->load->view('user_edit', $data);
            }

            public function update()
                {
                   //load model
                   $this->load->model('m_user');

                   //get data dari form
                   $id['id'] = $this->input->post("id");
                   $name            = $this->input->post('name');
                   $email    = $this->input->post('email');
                   $password            = $this->input->post('password');

                   $data = array(
                      'name'         => $name,    
                      'email' => $email,
                      'password'       => $password    
                   );

                   //update via model    
                   $this->m_user->update_user($data, $id);

                   //redirect ke controller siswa
                   redirect('user');
                }

                function hapus($id){
                $this->load->model('m_user');
                $where = array('id' => $id);
                $this->m_user->hapus_data($where,'user');
                redirect('user');
                }
}
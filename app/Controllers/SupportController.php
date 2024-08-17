<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Support extends CI_Controller {

    public function __construct() {
        parent::__construct(); // Correctly calling the parent constructor
        $this->load->model('SupportModel');
        $this->load->library('form_validation');
        $this->load->library('logger');
    }

    public function submit() {
        // Log the start of the request
        log_message('info', 'Support form submission started.');

        // Validate input
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('message', 'Message', 'required');

        if ($this->form_validation->run() === FALSE) {
            $errorMessage = validation_errors();
            log_message('error', 'Support form validation failed: ' . $errorMessage);

            $response = array('status' => 'error', 'message' => $errorMessage);
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'message' => $this->input->post('message'),
            );

            if ($this->SupportModel->insert_support_request($data)) {
                log_message('info', 'Support form submitted successfully for email: ' . $this->input->post('email'));

                $response = array('status' => 'success', 'message' => 'Support request submitted successfully!');
            } else {
                log_message('error', 'Failed to insert support request for email: ' . $this->input->post('email'));

                $response = array('status' => 'error', 'message' => 'An error occurred while submitting your request.');
            }
        }

        // Log the completion of the request
        log_message('info', 'Support form submission ended.');

        echo json_encode($response);
    }
}

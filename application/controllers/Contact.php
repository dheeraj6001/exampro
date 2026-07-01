<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('form_validation', 'email'));
    }

    public function send()
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim|max_length[100]');
        $this->form_validation->set_rules('last_name',  'Last Name',  'required|trim|max_length[100]');
        $this->form_validation->set_rules('email',      'Email',      'required|trim|valid_email|max_length[200]');
        $this->form_validation->set_rules('message',    'Message',    'required|trim|max_length[2000]');

        $data['page_title'] = 'Contact';
        $data['meta_desc']  = 'Get in touch with NexaStudio — we respond within 24 hours.';

        if ($this->form_validation->run() === FALSE)
        {
            $data['error'] = strip_tags(validation_errors());
            $this->load->view('templates/header', $data);
            $this->load->view('pages/contact', $data);
            $this->load->view('templates/footer');
            return;
        }

        // In a real project configure $config['smtp_*'] in config/email.php
        // and remove the demo shortcut below.
        $sent = $this->email
            ->from($this->input->post('email'), $this->input->post('first_name') . ' ' . $this->input->post('last_name'))
            ->to('hello@nexastudio.com')
            ->subject('New enquiry from ' . $this->input->post('first_name'))
            ->message(
                "Name:    " . $this->input->post('first_name') . " " . $this->input->post('last_name') . "\n" .
                "Email:   " . $this->input->post('email') . "\n" .
                "Phone:   " . $this->input->post('phone') . "\n" .
                "Service: " . $this->input->post('service') . "\n\n" .
                $this->input->post('message')
            )
            ->send();

        $data['success'] = TRUE;
        $this->load->view('templates/header', $data);
        $this->load->view('pages/contact', $data);
        $this->load->view('templates/footer');
    }

    /** JSON proxy for the demo-request form: forwards to the external enquiry API. */
    public function enquiry()
    {
        header('Content-Type: application/json; charset=UTF-8');

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['success' => false, 'message' => 'Method not allowed']);
            return;
        }

        $body = json_decode(file_get_contents('php://input'), true) ?? [];
        if (empty($body['email']) || empty($body['firstName']) || empty($body['lastName'])) {
            http_response_code(422);
            echo json_encode(['success' => false, 'message' => 'Missing required fields']);
            return;
        }

        // The upstream Enquiry schema only accepts {name, email, subject, message, type};
        // fold the extra demo-request details into the message body.
        $details = array_filter([
            'Phone'            => $body['phone']          ?? '',
            'Organisation'     => $body['orgName']         ?? '',
            'Organisation Type' => $body['orgType']        ?? '',
            'Candidate Range'  => $body['candidateRange']  ?? '',
        ]);
        $detailLines = array_map(fn($k, $v) => "$k: $v", array_keys($details), $details);

        $payload = [
            'name'    => $body['name'] ?? trim(($body['firstName'] ?? '') . ' ' . ($body['lastName'] ?? '')),
            'email'   => $body['email'],
            'subject' => 'Demo Request' . (!empty($body['orgName']) ? ' — ' . $body['orgName'] : ''),
            'message' => trim(implode("\n", $detailLines) . "\n\n" . ($body['message'] ?? '')),
            'type'    => 'demo_request',
        ];

        $this->load->library('apiclient');
        $result = $this->apiclient->post('/public/post/enquiry', $payload);

        http_response_code($result['status'] ?: 502);
        echo json_encode([
            'success' => $result['ok'],
            'message' => $result['error'] ?? ($result['body']['message'] ?? ($result['ok'] ? 'Enquiry submitted' : 'Submission failed')),
        ]);
    }
}

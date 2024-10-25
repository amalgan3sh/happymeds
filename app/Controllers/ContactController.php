<?php

namespace App\Controllers;

use App\Models\InquiryModel;

class ContactController extends BaseController
{
    public function submitInquiry()
    {
        $inquiryModel = new InquiryModel();

        // Get the input data from the request
        $type = $this->request->getPost('inquiry_type'); // 'general', 'business', or 'support'
        $data = [
            'first_name'   => $this->request->getPost('firstname'),
            'last_name'    => $this->request->getPost('lastname'),
            'email'        => $this->request->getPost('email'),
            'phone_number' => $this->request->getPost('phonenumber'),
            'company'      => $this->request->getPost('company') ?? null,
            'message'      => $this->request->getPost('message'),
            'type'         => $type,
        ];

        // Insert data into the database
        if ($inquiryModel->insert($data)) {
            return redirect()->back()->with('success', 'We have received your inquiry and our representative will contact you shortly.');
        } else {
            return redirect()->back()->with('error', 'There was an issue submitting your inquiry. Please try again later.');
        }
    }
}
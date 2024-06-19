<?php
namespace App\Models;

use CodeIgniter\Model;

class RegistrationModel extends Model {
    protected $table = 'users'; // your table name
    protected $allowedFields = ['user_name', 'email', 'phone','password','company_name','user_type']; // fields allowed for mass assignment

    public function create_customer($company_name, $email, $password) {
        // Check if the email is already registered
        $existingCustomer = $this->get_customer_by_email($email);
        if ($existingCustomer !== null) {
            // Account is already registered, return a message or throw an exception
            return 'exists';
        }
        // Insert data into the database
        $data = [
            'company_name' => $company_name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT), // Hash the password
            'user_type' => 'customer',
        ];

        return $this->insert($data);
    }
    private function get_customer_by_email($email) {
        // Implement a method to retrieve a customer by email from the database
        // This method may vary depending on your database structure and ORM usage
        // Here's a simplified example assuming you're using CodeIgniter's Query Builder
        $query = $this->db->table('users')->where('email', $email)->get();
        return $query->getRow();
    }

    public function create_brand_partner($company_name, $phone, $email, $password) {
        // Check if the email is already registered
        $existingCustomer = $this->get_customer_by_email($email);
        if ($existingCustomer !== null) {
            // Account is already registered, return a message or throw an exception
            return 'exists';
        }
    
        // Generate username from company name
        $username = $this->generate_username($company_name);
    
        // Insert data into the database
        $data = [
            'company_name' => $company_name,
            'phone' =>  $phone,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT), // Hash the password
            'user_name' => $username, // Adjusted to user_name column
            'user_type' => 'partner',
        ];
    
        return $this->insert($data);
    }
    
    private function generate_username($company_name) {
        // Convert company name to lowercase and remove spaces
        $username = strtolower(str_replace(' ', '', $company_name));
        // Check if this username already exists in the users table
        $suffix = '';
        $counter = 1;
        while ($this->is_username_taken($username . $suffix)) {
            $suffix = '_' . $counter;
            $counter++;
        }
        return $username . $suffix;
    }
    
    private function is_username_taken($username) {
        // Query the users table to check if the username already exists
        $query = $this->db->table('users')
                         ->selectCount('user_name')
                         ->where('user_name', $username)
                         ->get();
        // Fetch the result
        $row = $query->getRow();
        // Check if any rows were found with this username
        return ($row->user_name > 0);
    }
    

    public function customerLogin($phone, $password): bool|int
    {
        // Attempt to retrieve the user with the provided phone number or email
        $user = $this->getUserByPhoneOrEmail($phone);

        if ($user) {
            // Verify the password
            if (password_verify($password, $user->password)) {
                // Password is correct, return the user_id for successful login
                return $user->user_id;
            } else {
                // Password is incorrect
                return false;
            }
        }
        // User doesn't exist with the provided phone number or email
        return false;
    }


    public function getUserByPhoneOrEmail($phoneOrEmail)
    {
        // Assuming your table is named 'users' and primary key is 'user_id'
        return $this->db->table('users')
                        ->where('phone', $phoneOrEmail)
                        ->orWhere('email', $phoneOrEmail)
                        ->get()
                        ->getRow();
    }


    
    public function otpLogin($phone, $otp)
    {
        // Check if the provided phone number exists in the database
        $user = $this->getUserByPhoneOrEmail($phone);

        if ($user) {
            // Phone number exists, update the OTP column with "2255"
            $this->db->table('users')->where('phone', $phone)->update(['otp' => '2255']);
            
            // Check if the provided OTP is "2255"
            if ($otp === '2255') {
                return true; // Return true to indicate successful login
            }
        }
        
        // Either phone number doesn't exist or OTP is incorrect
        return false;
    }

    public function getUserDataById($userId)
    {
        return $this->db->table('users')
                        ->where('user_id', $userId)
                        ->get()
                        ->getRowArray();
    }


}

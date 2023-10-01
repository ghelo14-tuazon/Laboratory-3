<?php

namespace App\Controllers;
use App\Models\AdminModel;
use App\Models\UserModel;
use App\Models\MainModel;
use App\Models\CategoryModel;
use App\Controllers\BaseController;

class MainController extends BaseController
{
    public function test()
    {
        $main = new MainModel();
    
        // Fetch all categories
        $categoryModel = new CategoryModel(); // Replace with your actual model name
        $categories = $categoryModel->findAll();
    
        $categoryId = $this->request->getGet('categoryFilter');
    
        // Fetch students based on the selected category
        $data['sk'] = $main->findAll();
    
        // If a category is selected, filter the students by category name
        if (!empty($categoryId)) {
            $selectedCategory = $categoryModel->find($categoryId);
            if ($selectedCategory) {
                $data['sk'] = $main->where('category', $selectedCategory['name'])->findAll();
            }
        }
    
        $data['categories'] = $categories;
    
        return view('Main', $data);
    }
    
    public function create()
    {
        // Fetch categories from your database or data source
        $categoryModel = new CategoryModel(); // Replace with your actual model name
        $data['categories'] = $categoryModel->findAll();
    
        return view('create', $data);
    }
    
    
    public function save()
    {
        // Load the default database connection
        $db = \Config\Database::connect();
    
        // Get POST data
        $data = [
            'name' => $this->request->getPost('name'),
            'category_id' => $this->request->getPost('category_id'),
            'category' => $this->request->getPost('category'),
            'description' => $this->request->getPost('description'),
            'quantity' => $this->request->getPost('quantity'),
            'price' => $this->request->getPost('price'),
            'image_name' => '', // Initialize image_name
            'image_data' => '', // Initialize image_data
        ];
    
        // Handle image upload
        $image = $this->request->getFile('image');
    
        // Check if an image was uploaded
        if ($image->isValid() && !$image->hasMoved()) {
            // Generate a unique name for the uploaded file
            $newName = $image->getRandomName();
    
            // Move the uploaded image to the specified folder
            if ($image->move(FCPATH . 'upload', $newName)) {
                // Store the file path and original filename in the database
                $data['image_data'] = 'upload/' . $newName;
                $data['image_name'] = $newName; // Store the generated image name
            } else {
                // Handle the case where image move fails (e.g., display an error message)
                return redirect()->to('/create')->with('error', 'Failed to upload image');
            }
        }
    
        // Insert data into the database
        $builder = $db->table('students'); // Replace 'students' with your actual table name
        $builder->insert($data);
    
        // Check if the insert was successful
        if ($db->affectedRows() > 0) {
            // Redirect to the product listing page or another appropriate page
            return redirect()->to('/test')->with('success', 'Product created successfully');
        } else {
            // Handle the case where the insert failed (e.g., display an error message)
            return redirect()->to('/create')->with('error', 'Failed to create product');
        }
    }

    public function update($id)
    {
        // Fetch the product details from the database
        $productModel = new MainModel();
        $product = $productModel->find($id);

        if (!$product) {
            // Handle the case where the product is not found, e.g., display an error message
            return redirect()->to('/test')->with('error', 'Product not found');
        }

        // Fetch all categories from the database
        $categoryModel = new CategoryModel(); // Replace with your actual model name
        $categories = $categoryModel->findAll();

        // Pass the product and categories to the view
        return view('update', ['user' => $product, 'categories' => $categories]);
    }

    public function saveUpdate()
{
    $db = \Config\Database::connect();

    // Get the product's ID
    $id = $this->request->getPost('id');

    // Fetch the existing product data
    $productModel = new MainModel();
    $existingProduct = $productModel->find($id);

    if (!$existingProduct) {
        // Handle the case where the existing product is not found, e.g., display an error message
        return redirect()->to('/test')->with('error', 'Product not found');
    }

    // Get other form inputs
    $name = $this->request->getPost('name');
    $category = $this->request->getPost('category');
    $description = $this->request->getPost('description');
    $quantity = $this->request->getPost('quantity');
    $price = $this->request->getPost('price');

    // Handle image upload if a new image is selected
    $image = $this->request->getFile('image');

    if ($image->isValid() && !$image->hasMoved()) {
        // Generate a new image name
        $newName = $image->getRandomName();

        // Move the uploaded image to a directory (e.g., public/upload)
        if ($image->move(FCPATH . 'upload', $newName)) {
            // Delete the old image if a new image is uploaded
            if ($existingProduct['image_name']) {
                // Check if the old image file exists before attempting to delete it
                $oldImagePath = FCPATH . 'upload/' . $existingProduct['image_name'];
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Update the product information, including the image name
            $data = [
                'name' => $name,
                'category' => $category,
                'description' => $description,
                'quantity' => $quantity,
                'price' => $price,
                'image_name' => $newName, // Store the new image name in the database
                'image_data' => 'upload/' . $newName, // Store the file path in the database
            ];

            // Update data in the database
            $builder = $db->table('students'); // Replace 'students' with your actual table name
            $builder->where('id', $id);
            $builder->update($data);

            // Redirect to the product's information page
            return redirect()->to("/student/{$id}");
        } else {
            // Handle the case where image move fails (e.g., display an error message)
            return redirect()->to("/update/{$id}")->with('error', 'Failed to update image');
        }
    } else {
        // If no new image is selected, update other product information but keep the existing image name
        $data = [
            'name' => $name,
            'category' => $category,
            'description' => $description,
            'quantity' => $quantity,
            'price' => $price,
        ];

        // Update data in the database
        $builder = $db->table('students'); // Replace 'students' with your actual table name
        $builder->where('id', $id);
        $builder->update($data);

        // Redirect to the product's information page
        return redirect()->to("/student/{$id}");
    }
}
public function addCategory()
{
    // Load the view for adding a category (you need to create this view)
    return view('add-category');
}

    // Add a new method to handle the category submission
    public function saveCategory()
    {
        // Load the default database connection
        $db = \Config\Database::connect();
    
        // Get POST data for the new category
        $categoryName = $this->request->getPost('name');
    
        // Insert the new category into the "categories" table
        $categoryData = ['name' => $categoryName];
        $builder = $db->table('categories'); // Replace 'categories' with your actual table name
        $builder->insert($categoryData);
    
        // Redirect back to the "/test" page when successful
        return redirect()->to('/test')->with('success', 'Category added successfully');
    }
    public function show($studentId)
    {
        $studentModel = new MainModel();
        $student = $studentModel->find($studentId);

        if ($student) {
            return view('product_info', ['student' => $student]);
        } else {
            // Handle not found error
            return view('not_found_view');
        }
    }

    public function delete($id)
    {
        // Load the default database connection
        $db = \Config\Database::connect();

        // Attempt to delete the record from the "students" table
        $builder = $db->table('students');

        // Check if the record with the given ID exists
        $record = $builder->where('id', $id)->get()->getRow();

        if (!$record) {
            // Record not found, handle the error (e.g., show a message or redirect)
            return redirect()->to('/test')->with('error', 'Record not found');
        }

        // Delete the record
        $builder->where('id', $id)->delete();

        // Redirect back to the list of records or another page
        return redirect()->to('/test')->with('success', 'Record deleted successfully');
    }
   // MainController.php
   
   public function login()
   {
       // Check if the admin is already logged in
       $session = session();
       $admin_id = $session->get('admin_id');
   
       if (!empty($admin_id)) {
           // Redirect to the admin dashboard or another authenticated page
           return redirect()->to(base_url('test'));
       }
   
       if ($this->request->getServer('REQUEST_METHOD') === 'POST') {
           // Handle the POST request for admin login
           // Get user input
           $email = $this->request->getPost('email');
           $password = $this->request->getPost('password');
   
           // Check if the provided email matches the default email
           if ($email === 'admin@gmail.com') {
               // Check if the provided password matches the default password
               if ($password === '12345') {
                   // Admin login successful, set admin session
                   $session->set('admin_id', 1); // You can store any admin data you need
                   // Redirect to the admin dashboard or another authenticated page
                   return redirect()->to(base_url('test'));
               }
           }
   
           // Admin login failed, show an error
           echo '<div style="background-color: #ffcccc; color: #ff0000; padding: 10px; border: 1px solid #ff0000; text-align: center;">Admin login failed. Please check your credentials.</div>';
       }
    // Load the login view
    return view('login');
}

   
public function logout()
{
    $session = session();
    $session->remove('admin_id'); // Clear admin session

    // Redirect to the admin login page
    return redirect()->to(base_url('login'));
}


public function index()
    {
        $studentModel = new MainModel();
        $data['products'] = $studentModel->findAll();

        return view('index', $data); // Load the 'product_list' view and pass data
    }
public function register()
{
    if ($this->request->getServer('REQUEST_METHOD') === 'POST') {
        // Handle the POST request
        // Get user input
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Check if the email already exists in the database
        $userModel = new AdminModel();
        $existingUser = $userModel->where('email', $email)->first();

        if ($existingUser) {
            // Email already exists, show an error message or redirect back to the registration form with an error message
            echo '<div style="background-color: #ffaaaa; color: #aa0000; padding: 10px; border: 1px solid #aa0000; text-align: center; font-weight: bold;">Email already exists</div>';
        } else {
            // Email does not exist, insert the new user into the database
            $userModel->insert([
                'username' => $username,
                'email' => $email,
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)// You should hash the password for security
            ]);

            // Redirect to login or a success page
            echo '<div style="background-color: #aaffaa; color: #00aa00; padding: 10px; border: 1px solid #00aa00; text-align: center; font-weight: bold;">Registration Successful</div>';
        }
    }

    // Load the registration view
    return view('register');
}
public function userregister()
{
    if ($this->request->getServer('REQUEST_METHOD') === 'POST') {
        $model = new \App\Models\UserModel(); if ($this->request->getServer('REQUEST_METHOD') === 'POST')

        $rules = [
            'username' => 'required|min_length[3]|max_length[255]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[8]'
        ];

        if (!$this->validate($rules)) {
            // Validation failed, return to the registration form with errors
            return view('userregister', ['validation' => $this->validator]);
        } else {
            // Validation passed, insert the user into the database
            $model->save([
                'username' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ]);

            // Registration successful, you can redirect to a login page or another page
            return redirect()->to('userlogin')->with('success', 'Registration successful. You can now log in.');
        }
    }

    // Load the registration view
    return view('userregister');
}

public function userlogin()
{
    // Check if the user is already logged in
    $session = session();
    $user_id = $session->get('user_id');

    if (!empty($user_id)) {
        // Redirect to the user dashboard or another authenticated page
        return redirect()->to(base_url('index'));
    }

    if ($this->request->getServer('REQUEST_METHOD') === 'POST') {
        $model = new \App\Models\UserModel();

        $rules = [
            'email' => 'required|valid_email',
        ];

        if (!$this->validate($rules)) {
            // Validation failed, return to the user login form with errors
            return view('user_login', ['validation' => $this->validator]);
        } else {
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');

            // Check if the email exists in the database
            $user = $model->where('email', $email)->first();

            if ($user && password_verify($password, $user['password'])) {
                // User login successful, set user session
                $session->set([
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'email' => $user['email']
                ]);

                // Redirect to the user dashboard or another authenticated page
                return redirect()->to(base_url('index'));
            } else {
                // User login failed, show an error
                return redirect()->back()->with('error', 'User login failed. Please check your credentials.');
            }
        }
    }

    // Set headers to prevent caching
  
    // Load the login view
    return view('userlogin');
}

public function userlogout()
{
    $session = session();
    $session->remove('user_id'); // Clear user session

    // Redirect to the user login page
    return redirect()->to(base_url('userlogin'));
}


// Controller method to display a list of products
public function displayProducts()
{
    $studentModel = new MainModel();
    $data['products'] = $studentModel->findAll();

    // Debugging: Check if any data is returned
    // Remove or comment out these lines after debugging.
    echo '<pre>';
    print_r($data['products']);
    echo '</pre>';

    return view('index', $data); // Load the 'index' view and pass data
}
 public function viewProduct($studentId)
    {
        $studentModel = new MainModel();
        $student = $studentModel->find($studentId);

        if ($student) {
            return view('product_view', ['student' => $student]);
        } else {
            // Handle not found error
            return view('not_found_view');
        }
    }
// In your controller



}
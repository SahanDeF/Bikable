<?php 
    class Admins extends Controller{
        // admin connect to the database
        private $adminModel;

        public function __construct(){
            // connect to the database
            $this->adminModel = $this->model('Admin');
        }

        public function adminLandPage(){
            /**
             *  Two tasks
             *      1.) Load the data
             *      2.) View the data 
            */

            // load admin's landpage
            //code will implement here

            //view details
            $this->view('admins/adminLandPage');
        }

        /////////////////////////////////////////////////
        // OWNER LANDPAGE ADMIN/ MECHANIC/ BICYCLE/ OWNER RIDERS, BUTTONS IMPLEMENT
        /////////////////////////////////////////////////
        // test comment

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //////////////////////////// ADD USER INTO THE SYSTEM /////////////////////////////////////////////////////
        //////////////////////////////////////////////////////////////////////////////////////////////////////////
        public function addUserToTheSystemButton(){
            /**
             *  Two tasks 1
             *      1.) Load the form      
            */

            // load the data form UI
            $this->view('admins/addUser');
        }

        // after addUser form filled if they are valid then insert data into the system
        public function addUserToTheSystemFormSubmitButton(){
            /**
             *  Task
             *      This function task is validate data from the addUser form and,
             *          generate the password and send it the user 
            */
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // process form
                //init data
                $data = [
                    'fName' => trim($_POST['first_name']),
                    'lName' => trim($_POST['last_name']),
                    'email' => trim($_POST['email']),
                    'status' => trim($_POST['status']),
                    'nic' => trim($_POST['nic_number']),
                    'pNumber' => trim($_POST['contact_number']),
                    'userRole' => trim($_POST['user_role']),

                    'userPassword' => '', // this generate after confirmed entered details are ready.

                    'fName_err' => '',
                    'lName_err' => '',
                    'email_err' => '',
                    'status_err' => '',
                    'nic_err' => '',
                    'pNumber_err' => '',
                    'userRole_err' => ''
                ];

                //validate submitted data
                //validate first_name
                if(empty($data['fName'])){
                    $data['fName_err'] = '*enter first name';
                } 

                //validate last name
                if(empty($data['lName'])){
                    $data['lName_err'] = '*enter last name';
                }

                //validate email
                if(empty($data['email'])){
                    $data['email_err'] = '*enter email Number';
                }else{
                    //check weather email is availble in database
                    if($this->adminModel->findUserByEmail($data['email'])){
                        // true means that email is already taken.
                        $data['email_err'] = "*email is already taken";
                    }else{
                        //pass
                    }
                }

                //validate status
                if(empty($data['status'])){
                    $data['status_err'] = '*select user status';
                }

                //validate NIC
                if(empty($data['nic'])){
                    $data['nic_err'] = '*enter NIC number';
                }else{
                    //check weather nic is availble in database
                    if($this->adminModel->findNicNumber($data['nic'])){
                        // true means that email is already taken.
                        $data['nic_err'] = "*NIC is already taken";
                    }else{
                        //pass
                    }
                }

                //validate phone number
                if(empty($data['pNumber'])){
                    $data['pNumber_err'] = '*enter phone Number';
                }else{
                    //check weather phone number is availble in database
                    if($this->adminModel->findPhoneNumber($data['pNumber'])){
                        // true means that email is already taken.
                        $data['pNumber_err'] = "*Phone Number is already taken";
                    }else{
                        //pass
                    }
                }


                if(empty($data['fName_err']) && empty($data['lName_err']) && empty($data['email_err']) && empty($data['status_err'])  && empty($data['nic_err']) && empty($data['pNumber_err']) && empty($data['userRole_err'])){
                    //every things up to ready 

                    // hash password
                    // $data['userPassword'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    $data['userPassword'] = $this->generatePassword();
                    //in future this password should send to the email address.

                    // register user
                    if($this->adminModel->addUserIntoTheSystem($data)){
                        // next implementation should be land into the right position according to the role
                        redirect('admins/adminLandPage');
                    }else{
                        die('something went wrong');
                    }
                }else{
                    $this->view('admins/addUser', $data);
                }

            }else{
                //init data
                $data = [
                    'fName' => '',
                    'lName' => '',
                    'pNumber' => '',
                    'email' => '',
                    'password' => '',
                    'nic' => '',

                    'fName_err' => '',
                    'lName_err' => '',
                    'pNumber_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'nic_err' => '',

                ];
                $this->view('admins/addUser', $data);
            }
        }


        // admin controll administrator
        public function administrator(){
            /**
             *     Tasks
             *          1.) Load the data 
             *          2.) View the data
            *  */ 

            // load admin's administrator control
            //code will implement here

            //view details
            $this->view('admins/administrator');
        }

        // admin controll Mechanic data view
        public function mechanic(){
            /**
             *     Tasks
             *          1.) Load the data 
             *          2.) View the data
            *  */ 

            // load admin's mechanic control
            //code will implement here

            //view details
            $this->view('admins/mechanic');
        }

        // admin controll Mechanic data view
        public function riders(){
            /**
             *     Tasks
             *          1.) Load the data 
             *          2.) View the data
            *  */ 

            // load admin's mechanic control
            //code will implement here

            //view details
            $this->view('admins/riders');
        }

        public function bicycleAdmin(){
            /**
             *     Tasks
             *          1.) Load the data 
             *          2.) View the data
            *  */ 

            // load admin's mechanic control
            //code will implement here

            //view details
            $this->view('admins/bicycleAdmin');
        }

        // admin controll repair log
        public function addNewRepairLog(){
            /**
             *  Tasks 
             *        1.) add repair log to the system
             * 
            */

            // this is not load data from the database
            $this->view('admins/addNewRepairLog');
        }

        // admin controll docking areas
        public function dockingAreas(){
            /**
             * Task
             *      1.) add docking area to the system
             */

            //this is not load data from the database
            $this->view('admins/dockingareas');
        }

        // admin controll bicycle details
        public function bicyclesControl(){
            /**
             * Task 
             *      1.) handle bicycles in the system.
             */

            //this is not load data from the database
            $this->view('admins/bicycles');
        }

        // admin views the the rides and controll
        public function ridesControl(){
            /**
             *  Task
             *      1.) handle rides in the system
             */

             //this is not load data from the database
            $this->view('admins/rides');
        }

        // admin vies the reports and controll
        public function reportsControl(){
            /**
             * Task 
             *      1.) handle reports in the system
             */

            //this is not load data from the data
            $this->view('admins/reports');
        }

        //////////////////////////////////////////////////////////////////////////////////////////////////////////
        private function generatePassword() {
            $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
            $pass = array();
            $alphaLength = strlen($alphabet) - 1;
            for ($i = 0; $i < 8; $i++) {
                $n = rand(0, $alphaLength);
                $pass[] = $alphabet[$n];
            }
            return implode($pass);
        }

    }
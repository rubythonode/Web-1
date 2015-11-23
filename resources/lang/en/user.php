<?php
return [

        'user'                         =>'User',
        'users'                        =>'Users',
        'account'                      =>'Account',
        'birthday'                     =>'Birthday',
        'user_creation'                =>'User Creation',
        'creation_date'                =>'Creation Date',
        'company_phone'                =>'Telephone',
        'dashboard'                    =>'Dashboard',
        'email'                        =>'Email Address',
        'first_name'                   =>'First Name',
        'forgot_your_password'         =>'Forgot your password',
        'last_name'                    =>'Last Name',
        'login'                        =>'Sign in',
        'logout'                       =>'Sign out',
        'myemail'                      =>'My email address is:',
        'password'                     =>'Password',
        'password_confirmation'        =>'Password Confirmation',
        'personal_info'                =>'Personal Info',
        'profile'                      =>'Profile',
        'register'                     =>'Register',
        'remember_me'                  =>'Remember me',
        'role'                         =>'Role',
        'update'                       =>'Update',
        'user_info'                    =>'User Info',
        'account_panel'                =>'Account Panel',
        'your_account'                 =>'Your Account',
        'your_orders'                  =>'Your Orders',
        'account_resume'               =>'Account Resume',
        'disable_account'              =>'Disable Account',
        'disabled_at'                  =>'Disabled At',
        'enable_account'               =>'Enable Account',
        'modify_password'              =>'Modify your password',
        'modify_person'                =>'Modify your personal info',
        'old_password'                 =>'Old Password',
        'reset_password'               =>'Reset Password',
        'security'                     =>'Security',
        'send_password_link'           =>'Send reset password email',
        'are_you_human'                => 'Are you human?',
        'timezone'                     =>'Time Zone',
        'language'                     =>'Language',
        'invalid_action'               =>'Invalid Action',
        'insufficient_role'            =>'You do not have enough permission to access to that section.',

        //Message
        'saved'                        =>'User was successfully saved!',
        'are_you_sure'                 =>'Are you sure you want to desactivate your account?',
        'profile_disabled'             =>'The profile has been disabled',
        'profile_enabled'              =>'The profile has been enabled',
        'disable_account_description'  =>'Disabling your account, your profile will be deleted as well.',
        'account_disabled_description' =>'This account is disabled. However, if you want to reactivate it, please go to the security section.',

        //password
        'password_message'             =>[
        'nohave'                       => 'No, I am a new customer',
        'have'                         => 'Yes, I have a password:',
        'do_you_have'                  => 'Do you have a password?',
        ],

        //emails wrapper
        'emails' => [
                'verification_account' => [
                        'subject' => 'Please confirm your email address',
                        'msg_01' => 'You are receiving this email because you recently created a account at our site. To verify your account you will need to visit the following link.',
                        'msg_02' => 'After visiting the above link your account will be hundred percent security of external uses.',
                        'msg_03' => 'If you have any problem verifying your account, please send a email to',
                        'msg_04' => 'to get assistance!',
                        'msg_05' => 'Thanks!'
                ]
        ],

        'account_verified_ok_message' => '<strong>Activation results!</strong><br/><br/>Congratulation [name]!, your account was successfully activated.',
        'account_verified_error_message' => '<strong>There was an error!</strong><br/><br/>The token sent to validate your account is not in our records.<br/><br/>Please, check it out and try again!',
        'signUp_message' => '<strong>Thank you [name]!<br>You have successfully registered!</strong><br><br>We have just sent you a email with a link that you can click to confirm your account.',
        'signUp_message2' => '<strong>Thank you [name]!</strong><br>You have successfully registered!',

        'signin_content' => [
                'title' => 'Sign in to your account.',
                'sign_in_here' => 'Sign in',
                'no_account' => 'Don\'t have an account?',
                'create_one_here' => 'Create one here',
                'error_facebook' => 'There was a problem trying to get your Facebook credentials. Try again!',
                'error_login' => 'There was a problem trying to get your credentials. Try again!',
                'facebook_login' => 'Login with Facebook',
                'go_to_sign_up' => 'Register a new membership',
                'forgot_my_password' => 'I forgot my password',
                'start_your_session' => 'Sign in to start your session'
        ],

        'signup_content' =>[
                'title' => 'Create a new account',
                'slogan' => 'Set up your new account today.',
                'guarantee_msg' => '30-day money-back guarantee that starts after your first payment.',
                'create_my_account' => 'Create my account',
                'already_have_account' => 'Already have an account?',
                'sign_in_here' => 'Sign in here',
                'go_to_sign_in' => 'Go to sign in!',
                'facebook_login' => 'Create your new account with Facebook',
                'register' => 'Register'
        ]
];

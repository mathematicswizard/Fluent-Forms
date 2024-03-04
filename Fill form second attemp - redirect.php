<?php

// Function to check for form submission and redirect if needed
function check_form_submission_and_redirect() {
    
 if (is_user_logged_in() && is_page(page-number)) { //chagnge page-number to your liking, the page where the form is embedded

        $user_id = get_current_user_id();
        $form_id = form-number;  // change form_id to your liking
        

        $userEntries = \FluentForm\App\Models\Entry::where('form_id', $form_id)
                                                      ->where('user_id', $user_id)
                                                      ->get();

        $hasSubmittedForm = count($userEntries) > 0;

        if ($hasSubmittedForm) {
            wp_redirect(home_url('url'));  // Replace with the actual URL to redirect
            exit();
        }
        }
    }

// Hook the function to the 'template_redirect' action to run it on every page load
add_action('template_redirect', 'check_form_submission_and_redirect');

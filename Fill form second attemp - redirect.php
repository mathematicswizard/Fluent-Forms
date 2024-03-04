<?php

// Function to check for form submission and redirect if needed
function check_form_submission_and_redirect() {
    // Echo a message to indicate that the function is being executed
 //   echo "Checking form submission and redirect...<br>";
    
 if (is_user_logged_in() && is_page(77617)) {
     
        // Echo a message to indicate that the page and user authentication conditions are met
//        echo "Page ID 77617 detected, user is logged in.<br>";

        $user_id = get_current_user_id();
        $form_id = 44;
        
        // Echo a message to indicate the user and form IDs being used for the query
//        echo "User ID: " . $user_id . ", Form ID: " . $form_id . "<br>";

        $userEntries = \FluentForm\App\Models\Entry::where('form_id', $form_id)
                                                      ->where('user_id', $user_id)
                                                      ->get();

        // Echo a message to indicate whether $userEntries is an array
//        echo "Is userEntries an array? " . (is_array($userEntries) ? 'Yes' : 'No') . "<br>";

        // Echo a message to indicate the number of entries retrieved
//      echo "Number of entries retrieved: " . count($userEntries) . "<br>";

        $hasSubmittedForm = count($userEntries) > 0;

        // Echo a message to indicate whether the user has submitted the form
//        echo "User has submitted form: " . ($hasSubmittedForm ? 'Yes' : 'No') . "<br>";


        if ($hasSubmittedForm) {
            wp_redirect(home_url('/webinar-first-year/'));  // Replace with the actual URL
            exit();
        }
        }
    }

// Hook the function to the 'template_redirect' action to run it on every page load
add_action('template_redirect', 'check_form_submission_and_redirect');

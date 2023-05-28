<?php
// Set a custom error handler
set_error_handler(function ($severity, $message, $file, $line) {
    // Display the error message
    echo "<p>An error occurred: $message</p>";
    // Stop the script execution
    exit;
});

// set_error_handler(function ($severity, $message, $file, $line) {...}: This is a built-in PHP function that sets a user-defined function to handle errors. It's provided an anonymous function (a function without a name) that will be called when an error is encountered. The function parameters ($severity, $message, $file, $line) are automatically passed by PHP when an error occurs.

// $severity: The level of the error raised, as an integer. This corresponds to one of PHP's pre-defined error constants like E_ERROR, E_WARNING, etc.

// $message: A string describing the error message.

// $file: The filename in which the error occurred.

// $line: The line number in the file where the error occurred.

// echo "<p>An error occurred: $message</p>";: This line outputs an HTML paragraph containing the error message.

// exit;: This command immediately stops the PHP script when it's called. So in this case, as soon as an error is encountered and the message is displayed, the script stops running.

// This code block is generally used to catch and handle errors in a user-friendly way, rather than displaying raw PHP error messages, which could be confusing for users or potentially expose sensitive information about your server or application.

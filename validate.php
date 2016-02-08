<?php 
/*
	Purpose: Calculates the length of the value and compares with maximum value
	Input Parameters: Input value and Max length value
	Return Value: True if its is more than maximum length or false
*/
function has_max_length($value,$max) {
	return strlen($value) <= $max;
}
/*
	Purpose: Calculates the maximum length of the all the array of elements
	Input Parameters: Array of values, that array contains input type names
	Return Value: Stores error message in array of errors if there is any error
	Note:It calls another function for finding length if each element and comapares with maximum value
*/
function validate_max_lengths($fields_max_length) {
	global $errors;
	foreach($fields_max_length as $field => $max){
		$value=trim($_POST[$field]);
		if(!has_max_length($value,$max)){
			$errors[$field] = ucfirst($field) . "is to long";
		}
	}
}
/*
	Purpose: Calculates the length of the value and compares with minimum value
	Input Parameters: Input value and Minimum length value
	Return Value: True if its is less than than minimum length or true
*/
function has_min_length($value,$min) {
	return strlen($value) < $min;
}
/*
	Purpose: Calculates the minimum length of the all the array of elements
	Input Parameters: Array of values, that array contains input type names
	Return Value: Stores error message in array of errors if there is any error
	Note:It calls another function for finding length if each element and comapares with manimum value
*/
function validate_min_lengths($fields_min_length) {
	global $errors;
	foreach ($fields_min_length as $field => $min) {
		$value = trim($_POST[$field]);
		if(has_min_length($value,$min)){
			$errors[$field] = ucfirst($field) . "  is to short";
		}
	}
}
/*
	Purpose: to find the value is empty or not
	Input Parameters: input value
	Return Value: True if its is empty or false
*/
function has_presence($value) {
	return isset($value) && $value !== "";
}
/*
	Purpose: Tells the input values contains any values or not(empty)
	Input Parameters: Array of values, that array contains input type names
	Return Value: Stores error message in array of errors if there is any error
	Note:It calls another function to find whether the each input value is empty or not
*/
function all_prestnt($name_fields_presence) {
	global $errors;
	foreach ($name_fields_presence as $field) {
		$value = trim($_POST[$field]);
		if(!has_presence($value)){
			$errors[$field] = ucfirst($field) . " cannot be blank ";
		}
	}
}
/*
	Purpose: Displays the errors in a unordered list
	Input Parameters: Array of values, that array contains all errors
	Return Value: a variable which contains all the errors
*/
function form_errors($errors = array()) {
	$output = "";
	if(!empty($errors)){
		$output = "<div class=\"error\">";
		$output .= "Please fix the following errors:";
		$output .= "<ul>";
		foreach($errors as $key => $error) {
			$output .= "<li>{$error}</li>";
		}
		$output .= "</ul>";
		$output .= "</div>";
	}
	return $output;
}
/*
	Purpose: To find the input value is in proper format or nor (regular format) 
	Input Parameters: Array of values, that array contains input type names
	Return Value: Stores error message in array of errors if there is any error
*/
function all_regular($name_regular) {
	global $errors;
	foreach ($name_regular as $fields) {
		$value = trim($_POST[$fields]);
		if (!preg_match('/^[a-zA-Z ]*$/',$value)) {
			$errors[$fields] = ucfirst($fields) . " can have only letters "; 
		}
	}
}
?>


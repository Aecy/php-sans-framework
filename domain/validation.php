<?php

function get_previous_errors()
{
    static $previous_errors;
    if ($previous_errors) {
        return $previous_errors;
    }

    $previous_errors = $_SESSION['previous_errors'] ?? [];
    $_SESSION['previous_errors'] = [];

    return $previous_errors;
}

function get_previous_error(string $key)
{
    return get_previous_errors()[$key] ?? null;
}

function validate($rules)
{
    foreach ($rules as $key => $validations) {
        $value = $_POST[$key] ?? $_FILES[$key] ?? null;

        foreach ($validations as $validation) {
            $validation_function = "validate_{$validation}";
            $error = $validation_function($value);

            if ($error) {
                $_SESSION['previous_errors'] = $_SESSION['previous_errors'] ?? [];
                $_SESSION['previous_errors'][$key] = $error;
                break;
            }
        }
    }

    if (! empty($_SESSION['previous_errors'])) {
        save_inputs();
        redirect_self();
    }
}

function validate_required($value)
{
    if (empty($value)) {
        return "Le champ est requis.";
    }
    return '';
}

function validate_price($value)
{
    $float = string_to_float($value);
    if (is_null($float)) {
        return "Le prix indiqué n'est pas un chiffre.";
    }

    $cents = filter_var($float * 100, FILTER_VALIDATE_INT);
    if ($cents === false) {
        return "Impossible d'avoir des fractions de centimes.";
    }

    if ($cents <= 0) {
        return "Le prix indiqué doit être supérieur à zéro.";
    }

    return '';
}

function validate_image($image_info)
{
    if (is_null($image_info) or $image_info['error'] === UPLOAD_ERR_NO_FILE) {
        return;
    }

    if ($image_info['error'] !== UPLOAD_ERR_OK or ! is_uploaded_file($image_info['tmp_name'])) {
        return "Mauvais envoi.";
    }

    $extension = pathinfo($image_info['name'], PATHINFO_EXTENSION);

    if (!in_array($extension, ['png', 'jpg'])) {
        return "L'extension utilisée de l'image n'est pas correct.";
    }
}

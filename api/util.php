<?php

function getPHPBitVersion()
{
    switch (PHP_INT_SIZE) {
        case 4:
            return '32-bit version of PHP';
            break;
        case 8:
            return '64-bit version of PHP';
            break;
        default:
            return 'PHP_INT_SIZE is ' . PHP_INT_SIZE;
    }
}

/**
 * @param $log_msg
 */
function wh_log($log_msg)
{
// To get your current working directory: getcwd() (documentation)
    // To get the document root directory: $_SERVER['DOCUMENT_ROOT']
    // To get the filename of the current script: $_SERVER['SCRIPT_FILENAME']
    $log_filename = getcwd() . "/log";

    $log_time = date('Y-m-d h:i:sa') . "\t" . get_client_ip();
    $log_head = "***** Start Log For Day : '" . $log_time . "'****** ";
    $log_foot = "***** END Log For Day : '" . $log_time . "'***** \r\n";
    $log_msg = $log_head . "\r\n" . $log_msg . "\r\n" . $log_foot;

    if (!file_exists($log_filename)) {
        // create directory/folder uploads.
        mkdir($log_filename, 0777, true);
    }
    $log_file_data = $log_filename . '/log_' . date('Y-M-d') . '.log';
    file_put_contents($log_file_data, $log_msg . "\r\n", FILE_APPEND);
}

/**
 * @param $file_path
 * @param $log_msg
 */
function wh_log_path($file_path, $log_msg)
{
// To get your current working directory: getcwd() (documentation)
    // To get the document root directory: $_SERVER['DOCUMENT_ROOT']
    // To get the filename of the current script: $_SERVER['SCRIPT_FILENAME']
    $log_filename = getcwd() . "/" . $file_path;

    $log_time = date('Y-m-d h:i:sa') . "\t" . get_client_ip();
    $log_head = "--START TIME:'" . $log_time . "'--";
    $log_foot = "--END-- \r\n";
    $log_msg = $log_head . "\r\n" . $log_msg . "\r\n" . $log_foot;

    if (!file_exists($log_filename)) {
        // create directory/folder uploads.
        mkdir($log_filename, 0777, true);
    }
    //$log_file_data = $log_filename . '/log_' . date('Y-M-d') . '.log';
    $log_file_data = $log_filename . '/log' . date('ymd') . '.log';
    file_put_contents($log_file_data, $log_msg . "\r\n", FILE_APPEND);
}

// Function to get the client IP address
/**
 * @return mixed
 */
function get_client_ip()
{
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    } else if (isset($_SERVER['REMOTE_ADDR'])) {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    } else {
        $ipaddress = 'UNKNOWN';
    }

    return $ipaddress;
}

/**
 * @param  $str
 * @return mixed
 */
function ChkQuote($str)
{
    if ($str == null) {
        return $str;
    }

    if ($str == "") {
        return $str;
    }

    $str = str_replace("'", "''", $str);

    return $str;
}

/**
 * @param  $v_date
 * @return mixed
 */
function toDateMySql($v_date) //5-4-2010  dd-MM-yyyy to yyyy-MM-dd

{
    if (empty($v_date)) {
        //return date("d-m-Y");
        return "0000-00-00";
    } else {
        $old_date = explode('-', $v_date);

        return $old_date[2] . '-' . $old_date[1] . '-' . $old_date[0];
    }

    /*
$original_date = "2019-03-31";

// Creating timestamp from given date
$timestamp = strtotime($original_date);

// Creating new date format from that timestamp
$new_date = date("d-m-Y", $timestamp);
echo $new_date; // Outputs: 31-03-2019
 */
}

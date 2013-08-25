<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function pr($msg)
{
    echo "<pre>";
    print_r($msg);
    echo "</pre>";
}

function getCurrentcyList($key = NULL)
{
    $list = array(
	'CAD',
	'USD',
	'EUR',
	'GBP'
    );
    if (!is_null($key))
	return $list[$key];
    return $list;
}

function getDiscountAmount($coupon_code)
{
    $discount = 0;
    $db = new Database();
    $db->connect();
    $where = 'code="' . $coupon_code . '" and status="Enabled"';
    $db->select('coupons', '*', NULL, $where);
    $coupon = $db->getResult();
    if ($db->numResults)
    {
	$today = time();
	if (!empty($coupon['valid_from']) and strtotime($coupon['valid_from']) > $today)
	    return 0;
	elseif (!empty($coupon['valid_to']) and strtotime($coupon['valid_to']) < $today)
	    return 0;

	$amount = $coupon['commision_amount'];
	$type = $coupon['commision_type'];
	$total = $_SESSION['order']['total'];
	if ($type == 'Fixed')
	{
	    $discount = $amount;
	}
	else
	{
	    $discount = ($amount * $total) / 100;
	}
	$_SESSION['order']['total'] = $total - $discount;
    }
    return $discount;
}

function get_mime_type($filename)
{

    $mime_types = array(
	'txt' => 'text/plain',
	'htm' => 'text/html',
	'html' => 'text/html',
	'php' => 'text/html',
	'css' => 'text/css',
	'js' => 'application/javascript',
	'json' => 'application/json',
	'xml' => 'application/xml',
	'swf' => 'application/x-shockwave-flash',
	'flv' => 'video/x-flv',
	// images
	'png' => 'image/png',
	'jpe' => 'image/jpeg',
	'jpeg' => 'image/jpeg',
	'jpg' => 'image/jpeg',
	'gif' => 'image/gif',
	'bmp' => 'image/bmp',
	'ico' => 'image/vnd.microsoft.icon',
	'tiff' => 'image/tiff',
	'tif' => 'image/tiff',
	'svg' => 'image/svg+xml',
	'svgz' => 'image/svg+xml',
	// archives
	'zip' => 'application/zip',
	'rar' => 'application/x-rar-compressed',
	'exe' => 'application/x-msdownload',
	'msi' => 'application/x-msdownload',
	'cab' => 'application/vnd.ms-cab-compressed',
	// audio/video
	'mp3' => 'audio/mpeg',
	'qt' => 'video/quicktime',
	'mov' => 'video/quicktime',
	// adobe
	'pdf' => 'application/pdf',
	'psd' => 'image/vnd.adobe.photoshop',
	'ai' => 'application/postscript',
	'eps' => 'application/postscript',
	'ps' => 'application/postscript',
	// ms office
	'doc' => 'application/msword',
	'rtf' => 'application/rtf',
	'xls' => 'application/vnd.ms-excel',
	'ppt' => 'application/vnd.ms-powerpoint',
	// open office
	'odt' => 'application/vnd.oasis.opendocument.text',
	'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
    );

    $ext = strtolower(array_pop(explode('.', $filename)));
    if (array_key_exists($ext, $mime_types))
    {
	return $mime_types[$ext];
    }
    elseif (function_exists('finfo_open'))
    {
	$finfo = finfo_open(FILEINFO_MIME);
	$mimetype = finfo_file($finfo, $filename);
	finfo_close($finfo);
	return $mimetype;
    }
    else
    {
	return 'application/octet-stream';
    }
}

function OrderUpdateEmailTemplate($data = array())
{
    $msg = 'Dear <b>' . $data['first_name'] . ' ' . $data['last_name'] . '</b><br/>';
    $msg.='<p>Master Essay Support has sent you a message regarding your order id "' . $data['order_id'] . '"</p>';
    $msg.='<p>To see details please login here <a href="' . getHomeUrl() . '">here</a></p>';
    $msg.='<br/><br/><b>Thanks</b> <br/> Master Essay Support</p>';
    return $msg;
}

function ForgotPasswordEmailTemplate($data = array())
{
    $msg = 'Dear <b>' . $data['first_name'] . ' ' . $data['last_name'] . '</b><br/>';
    $msg.='<p>Here is your new password infomation</p>';
    $msg.='<p>Email : ' . $data['email'] . '<br/> Password : ' . $data['password'] . '</p>';
    $msg.='<p>To login Click <a href="' . getHomeUrl() . '">here</a></p>';
    $msg.='<br/><br/><br/>Thanks <br/> Master Essay Support</p>';

    return $msg;
}

function NewOrderEmailTemplate($data = array())
{
    $msg = 'Dear <b>' . $data['first_name'] . ' ' . $data['last_name'] . '</b><br/>';
    $msg.='<p>Thank you for Submit order @ Master Essay</p>';
    $msg.='<p>To see order details please login here <a href="' . getHomeUrl() . '">here</a></p>';
    $msg.='<br/><br/><b>Thanks</b> <br/> Master Essay Support</p>';
    return $msg;
}

function NewAccounEmailTemplate($data = array())
{
    $msg = 'Dear <b>' . $data['first_name'] . ' ' . $data['last_name'] . '</b><br/>';
    $msg.='<p>Thank you for signing up @ Master Essay</p>';
    $msg.='<p>Here is your new account infomation</p>';
    $msg.='<p>Email : ' . $data['email'] . '<br/> Password : ' . $data['password'] . '</p>';
    $msg.='<p>To login Click <a href="' . getHomeUrl() . '">here</a></p>';
    $msg.='<br/><br/><b>Thanks</b> <br/> Master Essay Support</p>';
    return $msg;
}

function CreditCardCompany($ccNum)
{
    /*
     * mastercard: Must have a prefix of 51 to 55, and must be 16 digits in length.
     * Visa: Must have a prefix of 4, and must be either 13 or 16 digits in length.
     * American Express: Must have a prefix of 34 or 37, and must be 15 digits in length.
     * Diners Club: Must have a prefix of 300 to 305, 36, or 38, and must be 14 digits in length.
     * Discover: Must have a prefix of 6011, and must be 16 digits in length.
     * JCB: Must have a prefix of 3, 1800, or 2131, and must be either 15 or 16 digits in length.
     */


    if (preg_match("/^5[1-5][0-9]{14}$/", $ccNum))
	return "MasterCard";

    if (preg_match("/^4[0-9]{12}([0-9]{3})?$/", $ccNum))
	return "Visa";

    if (preg_match("/^3[47][0-9]{13}$/", $ccNum))
	return "American Express";

    if (preg_match("/^3(0[0-5]|[68][0-9])[0-9]{11}$/", $ccNum))
	return "Diners Club";

    if (preg_match("/^6011[0-9]{12}$/", $ccNum))
	return "Discover";

    if (preg_match("/^(3[0-9]{4}|2131|1800)[0-9]{11}$/", $ccNum))
	return "JCB";
}

// Function to convert NTP string to an array
function NVPToArray($NVPString)
{
    $proArray = array();
    while (strlen($NVPString))
    {
	// name
	$keypos = strpos($NVPString, '=');
	$keyval = substr($NVPString, 0, $keypos);
	// value
	$valuepos = strpos($NVPString, '&') ? strpos($NVPString, '&') : strlen($NVPString);
	$valval = substr($NVPString, $keypos + 1, $valuepos - $keypos - 1);
	// decoding the respose
	$proArray[$keyval] = urldecode($valval);
	$NVPString = substr($NVPString, $valuepos + 1, strlen($NVPString));
    }
    return $proArray;
}

function getHomeUrl()
{
    $url = 'http://mastersessay.com/login.php';
    return $url;
}

function GetOrderStatus($section = NULL)
{
    $list = array(
	'Pending',
	'Completed',
	'HOLD',
	'Cancel'
    );
    if (!is_null($section))
	return $list[$section];

    return $list;
}

function sendMail($subject, $msg, $to, $from = NULL, $attachment = array())
{
    error_reporting(E_STRICT);
    date_default_timezone_set('Asia/Dhaka');
    require_once('PHPMailer/class.phpmailer.php');

    $mail = new PHPMailer();
    $body = $msg;
    $body = eregi_replace("[\]", '', $body);

    $mail->IsSMTP(); // telling the class to use SMTP
    //$mail->Host = "mail.yourdomain.com"; // SMTP server
    //$mail->SMTPDebug = 2;       // enables SMTP debug information (for testing)
    // 1 = errors and messages
    // 2 = messages only
    $mail->SMTPAuth = true;    // enable SMTP authentication
    $mail->SMTPSecure = "ssl";   // sets the prefix to the servier
    $mail->Host = "smtp.gmail.com";      // sets GMAIL as the SMTP server
    $mail->Port = 465;     // set the SMTP port for the GMAIL server
    $username = "arif04cuet@gmail.com";
    $mail->Username = $username;  // GMAIL username
    $mail->Password = "xkgqrvfdilsxqgat";     // GMAIL password

    if ($from != NULL)
	$username = $from;

    $mail->SetFrom($username, '');
    $mail->Subject = $subject;
    $mail->AltBody = $body;
    $mail->MsgHTML($body);
    if (is_string($to))
	$mail->AddAddress($to, "");
    elseif (is_array($to))
    {
	foreach ($to as $email)
	    $mail->AddAddress($email, "");
    }

    if (count($attachment) > 0)
    {
	foreach ($attachment as $file)
	    $mail->AddAttachment($file);      // attachment
    }
    if (!$mail->Send())
    {
	return false;
    }
    else
    {
	return true;
    }
}

function generatePassword()
{
    return substr(md5(rand()), 0, 6);
}

function loggedInUser()
{
    $db = new Database();
    $db->connect();
    $where = 'email="' . $_SESSION['frontend']['username'] . '"';
    $db->select('customers', '*', NULL, $where);
    $customer = $db->getResult();
    return $customer;
}

function getOrderPrice($key)
{
    $price = array(
	'Essay-10 days-Standard Quality-Double Spaced' => 21.99,
	'Essay-10 days-Premium Quality-Double Spaced' => 23.99,
	'Essay-10 days-Platinum Quality-Double Spaced' => 26.99,
	'Essay-7 days-Standard Quality-Double Spaced' => 22.99,
	'Essay-7 days-Premium Quality-Double Spaced' => 24.99,
	'Essay-7 days-Platinum Quality-Double Spaced' => 27.99,
	'Essay-5 days-Standard Quality-Double Spaced' => 21.99,
	'Essay-5 days-Premium Quality-Double Spaced' => 23.99,
	'Essay-5 days-Platinum Quality-Double Spaced' => 26.99,
	'Essay-10 days-Standard Quality-Double Spaced' => 21.99,
	'Essay-10 days-Premium Quality-Double Spaced' => 23.99,
	'Essay-10 days-Platinum Quality-Double Spaced' => 26.99,
	'Essay-10 days-Standard Quality-Double Spaced' => 21.99,
	'Essay-10 days-Premium Quality-Double Spaced' => 23.99,
	'Essay-10 days-Platinum Quality-Double Spaced' => 26.99,
    );
}

function getQueryStringForPrice(array $data, $ignore = array())
{
    $data = TrimAll($data);
    if (count($ignore) > 0)
    {
	foreach ($ignore as $key)
	    if (array_key_exists($key, $data))
		unset($data[$key]);
    }
    $queryString = http_build_query($data);
    return $queryString;
}

function TrimAll(array $data)
{
    return array_map('trim', $data);
}

function getUnitPrice(array $data)
{
    $data = TrimAll($data);
    $doctype = $data['type_document'];
    $urgency = $data['urgency'];

    //query db
    $db = new Database();
    $db->connect();
    $sql = 'select * from products p inner join services s on (p.service_id = s.id) where s.name="' . $doctype . '" and p.urgency="' . $urgency . '" limit 1';
    $result = mysql_query($sql);
    return mysql_fetch_assoc($result);
}

function getData(array $data, $key, $default = NULL)
{
    return isset($data[$key]) ? urldecode($data[$key]) : $default;
}

function getCurrencySymble($currrency = 'USD')
{
    $symble = array(
	'USD' => '$',
	'EUR' => '€',
	'GBP' => '£',
	'CAD' => 'C$',
    );
    return $symble[$currrency];
}

function currency($from_Currency, $to_Currency, $amount)
{
    $amount = urlencode($amount);
    $from_Currency = urlencode($from_Currency);
    $to_Currency = urlencode($to_Currency);
    $url = "http://www.google.com/ig/calculator?hl=en&q=$amount$from_Currency=?$to_Currency";
    $result = file_get_contents($url);
    return $result;
}

function getServiceList($section = NULL)
{
    $list = array(
	'Writing Services' =>
	array('url-1' => 'Custom Essay', 'url-2' => 'Term Paper', 'url-3' => 'Research Paper', 'url-4' => 'Book Report/Review',
	    'url-5' => 'Movie Review', 'url-6' => 'Coursework', 'url-7' => 'Case Study', 'url-8' => 'Lab Report',
	    'url-9' => 'Speech/Presentation', 'url-10' => 'Article', 'url-11' => 'Articel Critique', 'url-12' => 'Annotated Bibliography'),
	'Admission Services' => array('url-1' => 'Adimission Essay', 'url-2' => 'Scholarship Essay', 'url-3' => 'Personal Statement', 'url-4' => 'Editing'),
	'Assignments' => array('url-1' => 'Programming', 'url-2' => 'Power Point Presentation', 'url-3' => 'Math/Physics/Economics/Statistics', 'url-4' => 'Problem',
	    'url-5' => 'Multiple Choice Questions', 'url-6' => 'Statistics Project', 'url-7' => 'Research Summery'),
	'Editing Services' => array('url-1' => 'Editing', 'url-2' => 'Proofreading', 'url-3' => 'Formatting'),
	'Resume Services' => array('url-1' => 'Resume Writing', 'url-2' => 'Resume Editing', 'url-3' => 'CV Writing', 'url-4' => 'CV Editing', 'url-5' => 'Cover Letter'),
    );

    if (!is_null($section))
	return $list[$section];

    return $list;
}

function getProductsList($section = NULL)
{
    $list = array();
    $db = new Database();
    $db->connect();
    $sql = "SELECT distinct(name) FROM `services` order by name";
    $result = mysql_query($sql);
    while ($row = mysql_fetch_array($result))
    {
	$list[] = $row['name'];
    }
    if (!is_null($section))
	return $list[$section];

    return $list;
}

function coutryListWithCode($code = NULL)
{
    $countries = array(
	'AD' => 'Andorra',
	'AE' => 'United Arab Emirates',
	'AF' => 'Afghanistan',
	'AG' => 'Antigua &amp; Barbuda',
	'AI' => 'Anguilla',
	'AL' => 'Albania',
	'AM' => 'Armenia',
	'AN' => 'Netherlands Antilles',
	'AO' => 'Angola',
	'AQ' => 'Antarctica',
	'AR' => 'Argentina',
	'AS' => 'American Samoa',
	'AT' => 'Austria',
	'AU' => 'Australia',
	'AW' => 'Aruba',
	'AZ' => 'Azerbaijan',
	'BA' => 'Bosnia and Herzegovina',
	'BB' => 'Barbados',
	'BD' => 'Bangladesh',
	'BE' => 'Belgium',
	'BF' => 'Burkina Faso',
	'BG' => 'Bulgaria',
	'BH' => 'Bahrain',
	'BI' => 'Burundi',
	'BJ' => 'Benin',
	'BM' => 'Bermuda',
	'BN' => 'Brunei Darussalam',
	'BO' => 'Bolivia',
	'BR' => 'Brazil',
	'BS' => 'Bahama',
	'BT' => 'Bhutan',
	'BU' => 'Burma (no longer exists)',
	'BV' => 'Bouvet Island',
	'BW' => 'Botswana',
	'BY' => 'Belarus',
	'BZ' => 'Belize',
	'CA' => 'Canada',
	'CC' => 'Cocos (Keeling) Islands',
	'CF' => 'Central African Republic',
	'CG' => 'Congo',
	'CH' => 'Switzerland',
	'CI' => 'Côte D\'ivoire (Ivory Coast)',
	'CK' => 'Cook Iislands',
	'CL' => 'Chile',
	'CM' => 'Cameroon',
	'CN' => 'China',
	'CO' => 'Colombia',
	'CR' => 'Costa Rica',
	'CS' => 'Czechoslovakia (no longer exists)',
	'CU' => 'Cuba',
	'CV' => 'Cape Verde',
	'CX' => 'Christmas Island',
	'CY' => 'Cyprus',
	'CZ' => 'Czech Republic',
	'DD' => 'German Democratic Republic (no longer exists)',
	'DE' => 'Germany',
	'DJ' => 'Djibouti',
	'DK' => 'Denmark',
	'DM' => 'Dominica',
	'DO' => 'Dominican Republic',
	'DZ' => 'Algeria',
	'EC' => 'Ecuador',
	'EE' => 'Estonia',
	'EG' => 'Egypt',
	'EH' => 'Western Sahara',
	'ER' => 'Eritrea',
	'ES' => 'Spain',
	'ET' => 'Ethiopia',
	'FI' => 'Finland',
	'FJ' => 'Fiji',
	'FK' => 'Falkland Islands (Malvinas)',
	'FM' => 'Micronesia',
	'FO' => 'Faroe Islands',
	'FR' => 'France',
	'FX' => 'France, Metropolitan',
	'GA' => 'Gabon',
	'GB' => 'United Kingdom (Great Britain)',
	'GD' => 'Grenada',
	'GE' => 'Georgia',
	'GF' => 'French Guiana',
	'GH' => 'Ghana',
	'GI' => 'Gibraltar',
	'GL' => 'Greenland',
	'GM' => 'Gambia',
	'GN' => 'Guinea',
	'GP' => 'Guadeloupe',
	'GQ' => 'Equatorial Guinea',
	'GR' => 'Greece',
	'GS' => 'South Georgia and the South Sandwich Islands',
	'GT' => 'Guatemala',
	'GU' => 'Guam',
	'GW' => 'Guinea-Bissau',
	'GY' => 'Guyana',
	'HK' => 'Hong Kong',
	'HM' => 'Heard &amp; McDonald Islands',
	'HN' => 'Honduras',
	'HR' => 'Croatia',
	'HT' => 'Haiti',
	'HU' => 'Hungary',
	'ID' => 'Indonesia',
	'IE' => 'Ireland',
	'IL' => 'Israel',
	'IN' => 'India',
	'IO' => 'British Indian Ocean Territory',
	'IQ' => 'Iraq',
	'IR' => 'Islamic Republic of Iran',
	'IS' => 'Iceland',
	'IT' => 'Italy',
	'JM' => 'Jamaica',
	'JO' => 'Jordan',
	'JP' => 'Japan',
	'KE' => 'Kenya',
	'KG' => 'Kyrgyzstan',
	'KH' => 'Cambodia',
	'KI' => 'Kiribati',
	'KM' => 'Comoros',
	'KN' => 'St. Kitts and Nevis',
	'KP' => 'Korea, Democratic People\'s Republic of',
	'KR' => 'Korea, Republic of',
	'KW' => 'Kuwait',
	'KY' => 'Cayman Islands',
	'KZ' => 'Kazakhstan',
	'LA' => 'Lao People\'s Democratic Republic',
	'LB' => 'Lebanon',
	'LC' => 'Saint Lucia',
	'LI' => 'Liechtenstein',
	'LK' => 'Sri Lanka',
	'LR' => 'Liberia',
	'LS' => 'Lesotho',
	'LT' => 'Lithuania',
	'LU' => 'Luxembourg',
	'LV' => 'Latvia',
	'LY' => 'Libyan Arab Jamahiriya',
	'MA' => 'Morocco',
	'MC' => 'Monaco',
	'MD' => 'Moldova, Republic of',
	'MG' => 'Madagascar',
	'MH' => 'Marshall Islands',
	'ML' => 'Mali',
	'MN' => 'Mongolia',
	'MM' => 'Myanmar',
	'MO' => 'Macau',
	'MP' => 'Northern Mariana Islands',
	'MQ' => 'Martinique',
	'MR' => 'Mauritania',
	'MS' => 'Monserrat',
	'MT' => 'Malta',
	'MU' => 'Mauritius',
	'MV' => 'Maldives',
	'MW' => 'Malawi',
	'MX' => 'Mexico',
	'MY' => 'Malaysia',
	'MZ' => 'Mozambique',
	'NA' => 'Namibia',
	'NC' => 'New Caledonia',
	'NE' => 'Niger',
	'NF' => 'Norfolk Island',
	'NG' => 'Nigeria',
	'NI' => 'Nicaragua',
	'NL' => 'Netherlands',
	'NO' => 'Norway',
	'NP' => 'Nepal',
	'NR' => 'Nauru',
	'NT' => 'Neutral Zone (no longer exists)',
	'NU' => 'Niue',
	'NZ' => 'New Zealand',
	'OM' => 'Oman',
	'PA' => 'Panama',
	'PE' => 'Peru',
	'PF' => 'French Polynesia',
	'PG' => 'Papua New Guinea',
	'PH' => 'Philippines',
	'PK' => 'Pakistan',
	'PL' => 'Poland',
	'PM' => 'St. Pierre &amp; Miquelon',
	'PN' => 'Pitcairn',
	'PR' => 'Puerto Rico',
	'PT' => 'Portugal',
	'PW' => 'Palau',
	'PY' => 'Paraguay',
	'QA' => 'Qatar',
	'RE' => 'Réunion',
	'RO' => 'Romania',
	'RU' => 'Russian Federation',
	'RW' => 'Rwanda',
	'SA' => 'Saudi Arabia',
	'SB' => 'Solomon Islands',
	'SC' => 'Seychelles',
	'SD' => 'Sudan',
	'SE' => 'Sweden',
	'SG' => 'Singapore',
	'SH' => 'St. Helena',
	'SI' => 'Slovenia',
	'SJ' => 'Svalbard &amp; Jan Mayen Islands',
	'SK' => 'Slovakia',
	'SL' => 'Sierra Leone',
	'SM' => 'San Marino',
	'SN' => 'Senegal',
	'SO' => 'Somalia',
	'SR' => 'Suriname',
	'ST' => 'Sao Tome &amp; Principe',
	'SU' => 'Union of Soviet Socialist Republics (no longer exists)',
	'SV' => 'El Salvador',
	'SY' => 'Syrian Arab Republic',
	'SZ' => 'Swaziland',
	'TC' => 'Turks &amp; Caicos Islands',
	'TD' => 'Chad',
	'TF' => 'French Southern Territories',
	'TG' => 'Togo',
	'TH' => 'Thailand',
	'TJ' => 'Tajikistan',
	'TK' => 'Tokelau',
	'TM' => 'Turkmenistan',
	'TN' => 'Tunisia',
	'TO' => 'Tonga',
	'TP' => 'East Timor',
	'TR' => 'Turkey',
	'TT' => 'Trinidad &amp; Tobago',
	'TV' => 'Tuvalu',
	'TW' => 'Taiwan, Province of China',
	'TZ' => 'Tanzania, United Republic of',
	'UA' => 'Ukraine',
	'UG' => 'Uganda',
	'UM' => 'United States Minor Outlying Islands',
	'US' => 'United States of America',
	'UY' => 'Uruguay',
	'UZ' => 'Uzbekistan',
	'VA' => 'Vatican City State (Holy See)',
	'VC' => 'St. Vincent &amp; the Grenadines',
	'VE' => 'Venezuela',
	'VG' => 'British Virgin Islands',
	'VI' => 'United States Virgin Islands',
	'VN' => 'Viet Nam',
	'VU' => 'Vanuatu',
	'WF' => 'Wallis &amp; Futuna Islands',
	'WS' => 'Samoa',
	'YD' => 'Democratic Yemen (no longer exists)',
	'YE' => 'Yemen',
	'YT' => 'Mayotte',
	'YU' => 'Yugoslavia',
	'ZA' => 'South Africa',
	'ZM' => 'Zambia',
	'ZR' => 'Zaire',
	'ZW' => 'Zimbabwe'
    );
    if (!is_null($code))
	return $countries[$code];

    return $countries;
}

function getCountryList($section = NULL)
{
    $countryCallingCodes = array
	(
	"Canada" => "Canada-1",
	"Afghanistan" => "Afghanistan-93",
	"Albania" => "Albania-355",
	"Algeria" => "Algeria-213",
	"American Samoa" => "American Samoa-1",
	"Andorra" => "Andorra-376",
	"Angola" => "Angola-244",
	"Anguilla" => "Anguilla-1",
	"Antigua and Barbuda" => "Antigua and Barbuda-1",
	"Argentina" => "Argentina-54",
	"Armenia" => "Armenia-374",
	"Aruba" => "Aruba-297",
	"Ascension" => "Ascension-247",
	"Australia" => "Australia-61",
	"Austria" => "Austria-43",
	"Azerbaijan" => "Azerbaijan-994",
	"Bahamas" => "Bahamas-1",
	"Bahrain" => "Bahrain-973",
	"Bangladesh" => "Bangladesh-880",
	"Barbados" => "Barbados-1",
	"Belarus" => "Belarus-375",
	"Belgium" => "Belgium-32",
	"Belize" => "Belize-501",
	"Benin" => "Benin-229",
	"Bermuda" => "Bermuda-1",
	"Bhutan" => "Bhutan-975",
	"Bolivia" => "Bolivia-591",
	"Bosnia and Herzegovina" => "Bosnia and Herzegovina-387",
	"Botswana" => "Botswana-267",
	"Brazil" => "Brazil-55",
	"British Virgin Islands" => "British Virgin Islands-1",
	"Brunei" => "Brunei-673",
	"Bulgaria" => "Bulgaria-359",
	"Burkina Faso" => "Burkina Faso-226",
	"Burundi" => "Burundi-257",
	"Cambodia" => "Cambodia-855",
	"Cameroon" => "Cameroon-237",
	"Cape Verde" => "Cape Verde-238",
	"Cayman Islands" => "Cayman Islands-1",
	"Central African Republic" => "Central African Republic-236",
	"Chad" => "Chad-235",
	"Chile" => "Chile-56",
	"China" => "China-86",
	"Colombia" => "Colombia-57",
	"Comoros" => "Comoros-269",
	"Congo" => "Congo-242",
	"Cook Islands" => "Cook Islands-682",
	"Costa Rica" => "Costa Rica-506",
	"Croatia" => "Croatia-385",
	"Cuba" => "Cuba-53",
	"Cyprus" => "Cyprus-357",
	"Czech Republic" => "Czech Republic-420",
	"Democratic Republic of Congo" => "Democratic Republic of Congo-243",
	"Denmark" => "Denmark-45",
	"Diego Garcia" => "Diego Garcia-246",
	"Djibouti" => "Djibouti-253",
	"Dominica" => "Dominica-1",
	"Dominican Republic" => "Dominican Republic-1",
	"East Timor" => "East Timor-670",
	"Ecuador" => "Ecuador-593",
	"Egypt" => "Egypt-20",
	"El Salvador" => "El Salvador-503",
	"Equatorial Guinea" => "Equatorial Guinea-240",
	"Eritrea" => "Eritrea-291",
	"Estonia" => "Estonia-372",
	"Ethiopia" => "Ethiopia-251",
	"Falkland (Malvinas) Islands" => "Falkland (Malvinas) Islands-500",
	"Faroe Islands" => "Faroe Islands-298",
	"Fiji" => "Fiji-679",
	"Finland" => "Finland-358",
	"France" => "France-33",
	"French Guiana" => "French Guiana-594",
	"French Polynesia" => "French Polynesia-689",
	"Gabon" => "Gabon-241",
	"Gambia" => "Gambia-220",
	"Georgia" => "Georgia-995",
	"Germany" => "Germany-49",
	"Ghana" => "Ghana-233",
	"Gibraltar" => "Gibraltar-350",
	"Greece" => "Greece-30",
	"Greenland" => "Greenland-299",
	"Grenada" => "Grenada-1",
	"Guadeloupe" => "Guadeloupe-590",
	"Guam" => "Guam-1",
	"Guatemala" => "Guatemala-502",
	"Guinea" => "Guinea-224",
	"Guyana" => "Guyana-592",
	"Haiti" => "Haiti-509",
	"Honduras" => "Honduras-504",
	"Hong Kong" => "Hong Kong-852",
	"Hungary" => "Hungary-36",
	"Iceland" => "Iceland-354",
	"India" => "India-91",
	"Indonesia" => "Indonesia-62",
	"Inmarsat Satellite" => "Inmarsat Satellite-870",
	"Iran" => "Iran-98",
	"Iraq" => "Iraq-964",
	"Ireland" => "Ireland-353",
	"Israel" => "Israel-972",
	"Italy" => "Italy-39",
	"Ivory Coast" => "Ivory Coast-225",
	"Jamaica" => "Jamaica-1",
	"Japan" => "Japan-81",
	"Jordan" => "Jordan-962",
	"Kazakhstan" => "Kazakhstan-7",
	"Kenya" => "Kenya-254",
	"Kiribati" => "Kiribati-686",
	"Kuwait" => "Kuwait-965",
	"Kyrgyzstan" => "Kyrgyzstan-996",
	"Laos" => "Laos-856",
	"Latvia" => "Latvia-371",
	"Lebanon" => "Lebanon-961",
	"Lesotho" => "Lesotho-266",
	"Liberia" => "Liberia-231",
	"Libya" => "Libya-218",
	"Liechtenstein" => "Liechtenstein-423",
	"Lithuania" => "Lithuania-370",
	"Luxembourg" => "Luxembourg-352",
	"Macau" => "Macau-853",
	"Macedonia" => "Macedonia-389",
	"Madagascar" => "Madagascar-261",
	"Malawi" => "Malawi-265",
	"Malaysia" => "Malaysia-60",
	"Maldives" => "Maldives-960",
	"Mali" => "Mali-223",
	"Malta" => "Malta-356",
	"Marshall Islands" => "Marshall Islands-692",
	"Martinique" => "Martinique-596",
	"Mauritania" => "Mauritania-222",
	"Mauritius" => "Mauritius-230",
	"Mayotte" => "Mayotte-262",
	"Mexico" => "Mexico-52",
	"Micronesia" => "Micronesia-691",
	"Moldova" => "Moldova-373",
	"Monaco" => "Monaco-377",
	"Mongolia" => "Mongolia-976",
	"Montenegro" => "Montenegro-382",
	"Montserrat" => "Montserrat-1",
	"Morocco" => "Morocco-212",
	"Mozambique" => "Mozambique-258",
	"Myanmar" => "Myanmar-95",
	"Namibia" => "Namibia-264",
	"Nauru" => "Nauru-674",
	"Nepal" => "Nepal-977",
	"Netherlands" => "Netherlands-31",
	"Netherlands Antilles" => "Netherlands Antilles-599",
	"New Caledonia" => "New Caledonia-687",
	"New Zealand" => "New Zealand-64",
	"Nicaragua" => "Nicaragua-505",
	"Niger" => "Niger-227",
	"Nigeria" => "Nigeria-234",
	"Niue Island" => "Niue Island-683",
	"North Korea" => "North Korea-850",
	"Northern Marianas" => "Northern Marianas-1",
	"Norway" => "Norway-47",
	"Oman" => "Oman-968",
	"Pakistan" => "Pakistan-92",
	"Palau" => "Palau-680",
	"Panama" => "Panama-507",
	"Papua New Guinea" => "Papua New Guinea-675",
	"Paraguay" => "Paraguay-595",
	"Peru" => "Peru-51",
	"Philippines" => "Philippines-63",
	"Poland" => "Poland-48",
	"Portugal" => "Portugal-351",
	"Puerto Rico" => "Puerto Rico-1",
	"Qatar" => "Qatar-974",
	"Reunion" => "Reunion-262",
	"Romania" => "Romania-40",
	"Russian Federation" => "Russian Federation-7",
	"Rwanda" => "Rwanda-250",
	"Saint Helena" => "Saint Helena-290",
	"Saint Kitts and Nevis" => "Saint Kitts and Nevis-1",
	"Saint Lucia" => "Saint Lucia-1",
	"Saint Pierre and Miquelon" => "Saint Pierre and Miquelon-508",
	"Saint Vincent and the Grenadines" => "Saint Vincent and the Grenadines-1",
	"Samoa" => "Samoa-685",
	"San Marino" => "San Marino-378",
	"Sao Tome and Principe" => "Sao Tome and Principe-239",
	"Saudi Arabia" => "Saudi Arabia-966",
	"Senegal" => "Senegal-221",
	"Serbia" => "Serbia-381",
	"Seychelles" => "Seychelles-248",
	"Sierra Leone" => "Sierra Leone-232",
	"Singapore" => "Singapore-65",
	"Slovakia" => "Slovakia-421",
	"Slovenia" => "Slovenia-386",
	"Solomon Islands" => "Solomon Islands-677",
	"Somalia" => "Somalia-252",
	"South Africa" => "South Africa-27",
	"South Korea" => "South Korea-82",
	"Spain" => "Spain-34",
	"Sri Lanka" => "Sri Lanka-94",
	"Sudan" => "Sudan-249",
	"Suriname" => "Suriname-597",
	"Swaziland" => "Swaziland-268",
	"Sweden" => "Sweden-46",
	"Switzerland" => "Switzerland-41",
	"Syria" => "Syria-963",
	"Taiwan" => "Taiwan-886",
	"Tajikistan" => "Tajikistan-992",
	"Tanzania" => "Tanzania-255",
	"Thailand" => "Thailand-66",
	"Togo" => "Togo-228",
	"Tokelau" => "Tokelau-690",
	"Trinidad and Tobago" => "Trinidad and Tobago-1",
	"Tunisia" => "Tunisia-216",
	"Turkey" => "Turkey-90",
	"Turkmenistan" => "Turkmenistan-993",
	"Turks and Caicos Islands" => "Turks and Caicos Islands-1",
	"Tuvalu" => "Tuvalu-688",
	"Uganda" => "Uganda-256",
	"Ukraine" => "Ukraine-380",
	"United Arab Emirates" => "United Arab Emirates-971",
	"United Kingdom" => "United Kingdom-44",
	"USA" => "USA-1",
	"Canada" => "Canada-1",
	"Uruguay" => "Uruguay-598",
	"Uzbekistan" => "Uzbekistan-998",
	"Vanuatu" => "Vanuatu-678",
	"Vatican City" => "Vatican City-379",
	"Venezuela" => "Venezuela-58",
	"Vietnam" => "Vietnam-84",
	"Wallis and Futuna" => "Wallis and Futuna-681",
	"Yemen" => "Yemen-967",
	"Zambia" => "Zambia-260",
	"Zimbabwe" => "Zimbabwe-263"
    );
    if (!is_null($section))
	return $countryCallingCodes[$section];

    return $countryCallingCodes;
}

function getCountryInformation($filter = '')
{

    //Let's define the array
    $countryArray = array(
	'AD' => array(
	    'country_name' => 'ANDORRA',
	    'dial_code' => '376'
	),
	'AE' => array(
	    'country_name' => 'UNITED ARAB EMIRATES',
	    'dial_code' => '971'
	),
	'AF' => array(
	    'country_name' => 'AFGHANISTAN',
	    'dial_code' => '93'
	),
	'AG' => array(
	    'country_name' => 'ANTIGUA AND BARBUDA',
	    'dial_code' => '1268'
	),
	'AI' => array(
	    'country_name' => 'ANGUILLA',
	    'dial_code' => '1264'
	),
	'AL' => array(
	    'country_name' => 'ALBANIA',
	    'dial_code' => '355'
	),
	'AM' => array(
	    'country_name' => 'ARMENIA',
	    'dial_code' => '374'
	),
	'AN' => array(
	    'country_name' => 'NETHERLANDS ANTILLES',
	    'dial_code' => '599'
	),
	'AO' => array(
	    'country_name' => 'ANGOLA',
	    'dial_code' => '244'
	),
	'AQ' => array(
	    'country_name' => 'ANTARCTICA',
	    'dial_code' => '672'
	),
	'AR' => array(
	    'country_name' => 'ARGENTINA',
	    'dial_code' => '54'
	),
	'AS' => array(
	    'country_name' => 'AMERICAN SAMOA',
	    'dial_code' => '1684'
	),
	'AT' => array(
	    'country_name' => 'AUSTRIA',
	    'dial_code' => '43'
	),
	'AU' => array(
	    'country_name' => 'AUSTRALIA',
	    'dial_code' => '61'
	),
	'AW' => array(
	    'country_name' => 'ARUBA',
	    'dial_code' => '297'
	),
	'AZ' => array(
	    'country_name' => 'AZERBAIJAN',
	    'dial_code' => '994'
	),
	'BA' => array(
	    'country_name' => 'BOSNIA AND HERZEGOVINA',
	    'dial_code' => '387'
	),
	'BB' => array(
	    'country_name' => 'BARBADOS',
	    'dial_code' => '1246'
	),
	'BD' => array(
	    'country_name' => 'BANGLADESH',
	    'dial_code' => '880'
	),
	'BE' => array(
	    'country_name' => 'BELGIUM',
	    'dial_code' => '32'
	),
	'BF' => array(
	    'country_name' => 'BURKINA FASO',
	    'dial_code' => '226'
	),
	'BG' => array(
	    'country_name' => 'BULGARIA',
	    'dial_code' => '359'
	),
	'BH' => array(
	    'country_name' => 'BAHRAIN',
	    'dial_code' => '973'
	),
	'BI' => array(
	    'country_name' => 'BURUNDI',
	    'dial_code' => '257'
	),
	'BJ' => array(
	    'country_name' => 'BENIN',
	    'dial_code' => '229'
	),
	'BL' => array(
	    'country_name' => 'SAINT BARTHELEMY',
	    'dial_code' => '590'
	),
	'BM' => array(
	    'country_name' => 'BERMUDA',
	    'dial_code' => '1441'
	),
	'BN' => array(
	    'country_name' => 'BRUNEI DARUSSALAM',
	    'dial_code' => '673'
	),
	'BO' => array(
	    'country_name' => 'BOLIVIA',
	    'dial_code' => '591'
	),
	'BR' => array(
	    'country_name' => 'BRAZIL',
	    'dial_code' => '55'
	),
	'BS' => array(
	    'country_name' => 'BAHAMAS',
	    'dial_code' => '1242'
	),
	'BT' => array(
	    'country_name' => 'BHUTAN',
	    'dial_code' => '975'
	),
	'BW' => array(
	    'country_name' => 'BOTSWANA',
	    'dial_code' => '267'
	),
	'BY' => array(
	    'country_name' => 'BELARUS',
	    'dial_code' => '375'
	),
	'BZ' => array(
	    'country_name' => 'BELIZE',
	    'dial_code' => '501'
	),
	'CA' => array(
	    'country_name' => 'CANADA',
	    'dial_code' => '1'
	),
	'CC' => array(
	    'country_name' => 'COCOS (KEELING) ISLANDS',
	    'dial_code' => '61'
	),
	'CD' => array(
	    'country_name' => 'CONGO, THE DEMOCRATIC REPUBLIC OF THE',
	    'dial_code' => '243'
	),
	'CF' => array(
	    'country_name' => 'CENTRAL AFRICAN REPUBLIC',
	    'dial_code' => '236'
	),
	'CG' => array(
	    'country_name' => 'CONGO',
	    'dial_code' => '242'
	),
	'CH' => array(
	    'country_name' => 'SWITZERLAND',
	    'dial_code' => '41'
	),
	'CI' => array(
	    'country_name' => 'COTE D IVOIRE',
	    'dial_code' => '225'
	),
	'CK' => array(
	    'country_name' => 'COOK ISLANDS',
	    'dial_code' => '682'
	),
	'CL' => array(
	    'country_name' => 'CHILE',
	    'dial_code' => '56'
	),
	'CM' => array(
	    'country_name' => 'CAMEROON',
	    'dial_code' => '237'
	),
	'CN' => array(
	    'country_name' => 'CHINA',
	    'dial_code' => '86'
	),
	'CO' => array(
	    'country_name' => 'COLOMBIA',
	    'dial_code' => '57'
	),
	'CR' => array(
	    'country_name' => 'COSTA RICA',
	    'dial_code' => '506'
	),
	'CU' => array(
	    'country_name' => 'CUBA',
	    'dial_code' => '53'
	),
	'CV' => array(
	    'country_name' => 'CAPE VERDE',
	    'dial_code' => '238'
	),
	'CX' => array(
	    'country_name' => 'CHRISTMAS ISLAND',
	    'dial_code' => '61'
	),
	'CY' => array(
	    'country_name' => 'CYPRUS',
	    'dial_code' => '357'
	),
	'CZ' => array(
	    'country_name' => 'CZECH REPUBLIC',
	    'dial_code' => '420'
	),
	'DE' => array(
	    'country_name' => 'GERMANY',
	    'dial_code' => '49'
	),
	'DJ' => array(
	    'country_name' => 'DJIBOUTI',
	    'dial_code' => '253'
	),
	'DK' => array(
	    'country_name' => 'DENMARK',
	    'dial_code' => '45'
	),
	'DM' => array(
	    'country_name' => 'DOMINICA',
	    'dial_code' => '1767'
	),
	'DO' => array(
	    'country_name' => 'DOMINICAN REPUBLIC',
	    'dial_code' => '1809'
	),
	'DZ' => array(
	    'country_name' => 'ALGERIA',
	    'dial_code' => '213'
	),
	'EC' => array(
	    'country_name' => 'ECUADOR',
	    'dial_code' => '593'
	),
	'EE' => array(
	    'country_name' => 'ESTONIA',
	    'dial_code' => '372'
	),
	'EG' => array(
	    'country_name' => 'EGYPT',
	    'dial_code' => '20'
	),
	'ER' => array(
	    'country_name' => 'ERITREA',
	    'dial_code' => '291'
	),
	'ES' => array(
	    'country_name' => 'SPAIN',
	    'dial_code' => '34'
	),
	'ET' => array(
	    'country_name' => 'ETHIOPIA',
	    'dial_code' => '251'
	),
	'FI' => array(
	    'country_name' => 'FINLAND',
	    'dial_code' => '358'
	),
	'FJ' => array(
	    'country_name' => 'FIJI',
	    'dial_code' => '679'
	),
	'FK' => array(
	    'country_name' => 'FALKLAND ISLANDS (MALVINAS)',
	    'dial_code' => '500'
	),
	'FM' => array(
	    'country_name' => 'MICRONESIA, FEDERATED STATES OF',
	    'dial_code' => '691'
	),
	'FO' => array(
	    'country_name' => 'FAROE ISLANDS',
	    'dial_code' => '298'
	),
	'FR' => array(
	    'country_name' => 'FRANCE',
	    'dial_code' => '33'
	),
	'GA' => array(
	    'country_name' => 'GABON',
	    'dial_code' => '241'
	),
	'GB' => array(
	    'country_name' => 'UNITED KINGDOM',
	    'dial_code' => '44'
	),
	'GD' => array(
	    'country_name' => 'GRENADA',
	    'dial_code' => '1473'
	),
	'GE' => array(
	    'country_name' => 'GEORGIA',
	    'dial_code' => '995'
	),
	'GH' => array(
	    'country_name' => 'GHANA',
	    'dial_code' => '233'
	),
	'GI' => array(
	    'country_name' => 'GIBRALTAR',
	    'dial_code' => '350'
	),
	'GL' => array(
	    'country_name' => 'GREENLAND',
	    'dial_code' => '299'
	),
	'GM' => array(
	    'country_name' => 'GAMBIA',
	    'dial_code' => '220'
	),
	'GN' => array(
	    'country_name' => 'GUINEA',
	    'dial_code' => '224'
	),
	'GQ' => array(
	    'country_name' => 'EQUATORIAL GUINEA',
	    'dial_code' => '240'
	),
	'GR' => array(
	    'country_name' => 'GREECE',
	    'dial_code' => '30'
	),
	'GT' => array(
	    'country_name' => 'GUATEMALA',
	    'dial_code' => '502'
	),
	'GU' => array(
	    'country_name' => 'GUAM',
	    'dial_code' => '1671'
	),
	'GW' => array(
	    'country_name' => 'GUINEA-BISSAU',
	    'dial_code' => '245'
	),
	'GY' => array(
	    'country_name' => 'GUYANA',
	    'dial_code' => '592'
	),
	'HK' => array(
	    'country_name' => 'HONG KONG',
	    'dial_code' => '852'
	),
	'HN' => array(
	    'country_name' => 'HONDURAS',
	    'dial_code' => '504'
	),
	'HR' => array(
	    'country_name' => 'CROATIA',
	    'dial_code' => '385'
	),
	'HT' => array(
	    'country_name' => 'HAITI',
	    'dial_code' => '509'
	),
	'HU' => array(
	    'country_name' => 'HUNGARY',
	    'dial_code' => '36'
	),
	'ID' => array(
	    'country_name' => 'INDONESIA',
	    'dial_code' => '62'
	),
	'IE' => array(
	    'country_name' => 'IRELAND',
	    'dial_code' => '353'
	),
	'IL' => array(
	    'country_name' => 'ISRAEL',
	    'dial_code' => '972'
	),
	'IM' => array(
	    'country_name' => 'ISLE OF MAN',
	    'dial_code' => '44'
	),
	'IN' => array(
	    'country_name' => 'INDIA',
	    'dial_code' => '91'
	),
	'IQ' => array(
	    'country_name' => 'IRAQ',
	    'dial_code' => '964'
	),
	'IR' => array(
	    'country_name' => 'IRAN, ISLAMIC REPUBLIC OF',
	    'dial_code' => '98'
	),
	'IS' => array(
	    'country_name' => 'ICELAND',
	    'dial_code' => '354'
	),
	'IT' => array(
	    'country_name' => 'ITALY',
	    'dial_code' => '39'
	),
	'JM' => array(
	    'country_name' => 'JAMAICA',
	    'dial_code' => '1876'
	),
	'JO' => array(
	    'country_name' => 'JORDAN',
	    'dial_code' => '962'
	),
	'JP' => array(
	    'country_name' => 'JAPAN',
	    'dial_code' => '81'
	),
	'KE' => array(
	    'country_name' => 'KENYA',
	    'dial_code' => '254'
	),
	'KG' => array(
	    'country_name' => 'KYRGYZSTAN',
	    'dial_code' => '996'
	),
	'KH' => array(
	    'country_name' => 'CAMBODIA',
	    'dial_code' => '855'
	),
	'KI' => array(
	    'country_name' => 'KIRIBATI',
	    'dial_code' => '686'
	),
	'KM' => array(
	    'country_name' => 'COMOROS',
	    'dial_code' => '269'
	),
	'KN' => array(
	    'country_name' => 'SAINT KITTS AND NEVIS',
	    'dial_code' => '1869'
	),
	'KP' => array(
	    'country_name' => 'KOREA DEMOCRATIC PEOPLES REPUBLIC OF',
	    'dial_code' => '850'
	),
	'KR' => array(
	    'country_name' => 'KOREA REPUBLIC OF',
	    'dial_code' => '82'
	),
	'KW' => array(
	    'country_name' => 'KUWAIT',
	    'dial_code' => '965'
	),
	'KY' => array(
	    'country_name' => 'CAYMAN ISLANDS',
	    'dial_code' => '1345'
	),
	'KZ' => array(
	    'country_name' => 'KAZAKSTAN',
	    'dial_code' => '7'
	),
	'LA' => array(
	    'country_name' => 'LAO PEOPLES DEMOCRATIC REPUBLIC',
	    'dial_code' => '856'
	),
	'LB' => array(
	    'country_name' => 'LEBANON',
	    'dial_code' => '961'
	),
	'LC' => array(
	    'country_name' => 'SAINT LUCIA',
	    'dial_code' => '1758'
	),
	'LI' => array(
	    'country_name' => 'LIECHTENSTEIN',
	    'dial_code' => '423'
	),
	'LK' => array(
	    'country_name' => 'SRI LANKA',
	    'dial_code' => '94'
	),
	'LR' => array(
	    'country_name' => 'LIBERIA',
	    'dial_code' => '231'
	),
	'LS' => array(
	    'country_name' => 'LESOTHO',
	    'dial_code' => '266'
	),
	'LT' => array(
	    'country_name' => 'LITHUANIA',
	    'dial_code' => '370'
	),
	'LU' => array(
	    'country_name' => 'LUXEMBOURG',
	    'dial_code' => '352'
	),
	'LV' => array(
	    'country_name' => 'LATVIA',
	    'dial_code' => '371'
	),
	'LY' => array(
	    'country_name' => 'LIBYAN ARAB JAMAHIRIYA',
	    'dial_code' => '218'
	),
	'MA' => array(
	    'country_name' => 'MOROCCO',
	    'dial_code' => '212'
	),
	'MC' => array(
	    'country_name' => 'MONACO',
	    'dial_code' => '377'
	),
	'MD' => array(
	    'country_name' => 'MOLDOVA, REPUBLIC OF',
	    'dial_code' => '373'
	),
	'ME' => array(
	    'country_name' => 'MONTENEGRO',
	    'dial_code' => '382'
	),
	'MF' => array(
	    'country_name' => 'SAINT MARTIN',
	    'dial_code' => '1599'
	),
	'MG' => array(
	    'country_name' => 'MADAGASCAR',
	    'dial_code' => '261'
	),
	'MH' => array(
	    'country_name' => 'MARSHALL ISLANDS',
	    'dial_code' => '692'
	),
	'MK' => array(
	    'country_name' => 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF',
	    'dial_code' => '389'
	),
	'ML' => array(
	    'country_name' => 'MALI',
	    'dial_code' => '223'
	),
	'MM' => array(
	    'country_name' => 'MYANMAR',
	    'dial_code' => '95'
	),
	'MN' => array(
	    'country_name' => 'MONGOLIA',
	    'dial_code' => '976'
	),
	'MO' => array(
	    'country_name' => 'MACAU',
	    'dial_code' => '853'
	),
	'MP' => array(
	    'country_name' => 'NORTHERN MARIANA ISLANDS',
	    'dial_code' => '1670'
	),
	'MR' => array(
	    'country_name' => 'MAURITANIA',
	    'dial_code' => '222'
	),
	'MS' => array(
	    'country_name' => 'MONTSERRAT',
	    'dial_code' => '1664'
	),
	'MT' => array(
	    'country_name' => 'MALTA',
	    'dial_code' => '356'
	),
	'MU' => array(
	    'country_name' => 'MAURITIUS',
	    'dial_code' => '230'
	),
	'MV' => array(
	    'country_name' => 'MALDIVES',
	    'dial_code' => '960'
	),
	'MW' => array(
	    'country_name' => 'MALAWI',
	    'dial_code' => '265'
	),
	'MX' => array(
	    'country_name' => 'MEXICO',
	    'dial_code' => '52'
	),
	'MY' => array(
	    'country_name' => 'MALAYSIA',
	    'dial_code' => '60'
	),
	'MZ' => array(
	    'country_name' => 'MOZAMBIQUE',
	    'dial_code' => '258'
	),
	'NA' => array(
	    'country_name' => 'NAMIBIA',
	    'dial_code' => '264'
	),
	'NC' => array(
	    'country_name' => 'NEW CALEDONIA',
	    'dial_code' => '687'
	),
	'NE' => array(
	    'country_name' => 'NIGER',
	    'dial_code' => '227'
	),
	'NG' => array(
	    'country_name' => 'NIGERIA',
	    'dial_code' => '234'
	),
	'NI' => array(
	    'country_name' => 'NICARAGUA',
	    'dial_code' => '505'
	),
	'NL' => array(
	    'country_name' => 'NETHERLANDS',
	    'dial_code' => '31'
	),
	'NO' => array(
	    'country_name' => 'NORWAY',
	    'dial_code' => '47'
	),
	'NP' => array(
	    'country_name' => 'NEPAL',
	    'dial_code' => '977'
	),
	'NR' => array(
	    'country_name' => 'NAURU',
	    'dial_code' => '674'
	),
	'NU' => array(
	    'country_name' => 'NIUE',
	    'dial_code' => '683'
	),
	'NZ' => array(
	    'country_name' => 'NEW ZEALAND',
	    'dial_code' => '64'
	),
	'OM' => array(
	    'country_name' => 'OMAN',
	    'dial_code' => '968'
	),
	'PA' => array(
	    'country_name' => 'PANAMA',
	    'dial_code' => '507'
	),
	'PE' => array(
	    'country_name' => 'PERU',
	    'dial_code' => '51'
	),
	'PF' => array(
	    'country_name' => 'FRENCH POLYNESIA',
	    'dial_code' => '689'
	),
	'PG' => array(
	    'country_name' => 'PAPUA NEW GUINEA',
	    'dial_code' => '675'
	),
	'PH' => array(
	    'country_name' => 'PHILIPPINES',
	    'dial_code' => '63'
	),
	'PK' => array(
	    'country_name' => 'PAKISTAN',
	    'dial_code' => '92'
	),
	'PL' => array(
	    'country_name' => 'POLAND',
	    'dial_code' => '48'
	),
	'PM' => array(
	    'country_name' => 'SAINT PIERRE AND MIQUELON',
	    'dial_code' => '508'
	),
	'PN' => array(
	    'country_name' => 'PITCAIRN',
	    'dial_code' => '870'
	),
	'PR' => array(
	    'country_name' => 'PUERTO RICO',
	    'dial_code' => '1'
	),
	'PT' => array(
	    'country_name' => 'PORTUGAL',
	    'dial_code' => '351'
	),
	'PW' => array(
	    'country_name' => 'PALAU',
	    'dial_code' => '680'
	),
	'PY' => array(
	    'country_name' => 'PARAGUAY',
	    'dial_code' => '595'
	),
	'QA' => array(
	    'country_name' => 'QATAR',
	    'dial_code' => '974'
	),
	'RO' => array(
	    'country_name' => 'ROMANIA',
	    'dial_code' => '40'
	),
	'RS' => array(
	    'country_name' => 'SERBIA',
	    'dial_code' => '381'
	),
	'RU' => array(
	    'country_name' => 'RUSSIAN FEDERATION',
	    'dial_code' => '7'
	),
	'RW' => array(
	    'country_name' => 'RWANDA',
	    'dial_code' => '250'
	),
	'SA' => array(
	    'country_name' => 'SAUDI ARABIA',
	    'dial_code' => '966'
	),
	'SB' => array(
	    'country_name' => 'SOLOMON ISLANDS',
	    'dial_code' => '677'
	),
	'SC' => array(
	    'country_name' => 'SEYCHELLES',
	    'dial_code' => '248'
	),
	'SD' => array(
	    'country_name' => 'SUDAN',
	    'dial_code' => '249'
	),
	'SE' => array(
	    'country_name' => 'SWEDEN',
	    'dial_code' => '46'
	),
	'SG' => array(
	    'country_name' => 'SINGAPORE',
	    'dial_code' => '65'
	),
	'SH' => array(
	    'country_name' => 'SAINT HELENA',
	    'dial_code' => '290'
	),
	'SI' => array(
	    'country_name' => 'SLOVENIA',
	    'dial_code' => '386'
	),
	'SK' => array(
	    'country_name' => 'SLOVAKIA',
	    'dial_code' => '421'
	),
	'SL' => array(
	    'country_name' => 'SIERRA LEONE',
	    'dial_code' => '232'
	),
	'SM' => array(
	    'country_name' => 'SAN MARINO',
	    'dial_code' => '378'
	),
	'SN' => array(
	    'country_name' => 'SENEGAL',
	    'dial_code' => '221'
	),
	'SO' => array(
	    'country_name' => 'SOMALIA',
	    'dial_code' => '252'
	),
	'SR' => array(
	    'country_name' => 'SURINAME',
	    'dial_code' => '597'
	),
	'ST' => array(
	    'country_name' => 'SAO TOME AND PRINCIPE',
	    'dial_code' => '239'
	),
	'SV' => array(
	    'country_name' => 'EL SALVADOR',
	    'dial_code' => '503'
	),
	'SY' => array(
	    'country_name' => 'SYRIAN ARAB REPUBLIC',
	    'dial_code' => '963'
	),
	'SZ' => array(
	    'country_name' => 'SWAZILAND',
	    'dial_code' => '268'
	),
	'TC' => array(
	    'country_name' => 'TURKS AND CAICOS ISLANDS',
	    'dial_code' => '1649'
	),
	'TD' => array(
	    'country_name' => 'CHAD',
	    'dial_code' => '235'
	),
	'TG' => array(
	    'country_name' => 'TOGO',
	    'dial_code' => '228'
	),
	'TH' => array(
	    'country_name' => 'THAILAND',
	    'dial_code' => '66'
	),
	'TJ' => array(
	    'country_name' => 'TAJIKISTAN',
	    'dial_code' => '992'
	),
	'TK' => array(
	    'country_name' => 'TOKELAU',
	    'dial_code' => '690'
	),
	'TL' => array(
	    'country_name' => 'TIMOR-LESTE',
	    'dial_code' => '670'
	),
	'TM' => array(
	    'country_name' => 'TURKMENISTAN',
	    'dial_code' => '993'
	),
	'TN' => array(
	    'country_name' => 'TUNISIA',
	    'dial_code' => '216'
	),
	'TO' => array(
	    'country_name' => 'TONGA',
	    'dial_code' => '676'
	),
	'TR' => array(
	    'country_name' => 'TURKEY',
	    'dial_code' => '90'
	),
	'TT' => array(
	    'country_name' => 'TRINIDAD AND TOBAGO',
	    'dial_code' => '1868'
	),
	'TV' => array(
	    'country_name' => 'TUVALU',
	    'dial_code' => '688'
	),
	'TW' => array(
	    'country_name' => 'TAIWAN, PROVINCE OF CHINA',
	    'dial_code' => '886'
	),
	'TZ' => array(
	    'country_name' => 'TANZANIA, UNITED REPUBLIC OF',
	    'dial_code' => '255'
	),
	'UA' => array(
	    'country_name' => 'UKRAINE',
	    'dial_code' => '380'
	),
	'UG' => array(
	    'country_name' => 'UGANDA',
	    'dial_code' => '256'
	),
	'US' => array(
	    'country_name' => 'UNITED STATES',
	    'dial_code' => '1'
	),
	'UY' => array(
	    'country_name' => 'URUGUAY',
	    'dial_code' => '598'
	),
	'UZ' => array(
	    'country_name' => 'UZBEKISTAN',
	    'dial_code' => '998'
	),
	'VA' => array(
	    'country_name' => 'HOLY SEE (VATICAN CITY STATE)',
	    'dial_code' => '39'
	),
	'VC' => array(
	    'country_name' => 'SAINT VINCENT AND THE GRENADINES',
	    'dial_code' => '1784'
	),
	'VE' => array(
	    'country_name' => 'VENEZUELA',
	    'dial_code' => '58'
	),
	'VG' => array(
	    'country_name' => 'VIRGIN ISLANDS, BRITISH',
	    'dial_code' => '1284'
	),
	'VI' => array(
	    'country_name' => 'VIRGIN ISLANDS, U.S.',
	    'dial_code' => '1340'
	),
	'VN' => array(
	    'country_name' => 'VIET NAM',
	    'dial_code' => '84'
	),
	'VU' => array(
	    'country_name' => 'VANUATU',
	    'dial_code' => '678'
	),
	'WF' => array(
	    'country_name' => 'WALLIS AND FUTUNA',
	    'dial_code' => '681'
	),
	'WS' => array(
	    'country_name' => 'SAMOA',
	    'dial_code' => '685'
	),
	'XK' => array(
	    'country_name' => 'KOSOVO',
	    'dial_code' => '381'
	),
	'YE' => array(
	    'country_name' => 'YEMEN',
	    'dial_code' => '967'
	),
	'YT' => array(
	    'country_name' => 'MAYOTTE',
	    'dial_code' => '262'
	),
	'ZA' => array(
	    'country_name' => 'SOUTH AFRICA',
	    'dial_code' => '27'
	),
	'ZM' => array(
	    'country_name' => 'ZAMBIA',
	    'dial_code' => '260'
	),
	'ZW' => array(
	    'country_name' => 'ZIMBABWE',
	    'dial_code' => '263'
	)
    );

    //Return
    return ( $filter == '' ) ? $countryArray : (isset($countryArray[$filter]) ? $countryArray[$filter] : '');
}

function getUrgencyList($doctype = 'Essay')
{
    $list = array();
    //include('crud/class/mysql_crud.php');
    $db = new Database();
    $db->connect();
    $sql = "SELECT distinct(urgency) FROM `products` p inner join services s on (p.service_id=s.id) where s.name='" . $doctype . "'";
    $result = mysql_query($sql);
    while ($row = mysql_fetch_array($result))
    {
	$list[] = trim($row['urgency']);
    }

    return $list;
}

function getPageList($section = NULL)
{
    $list = array();
    $word_per_page = 250;
    for ($i = 1; $i <= 200; $i++)
    {
	$list[$i] = $i . ' pages (s) / ' . $i * $word_per_page . ' words';
    }

    if (!is_null($section))
	return $list[$section];

    return $list;
}

function getSubjectAreaList($section = NULL)
{
    $list = array(
	'Art',
	'Architecture',
	'Drama',
	'Movies',
	'Dance',
	'Design Analysis',
	'Music',
	'Paintings',
	'Theatre',
	'Biology',
	'Business',
	'Chemistry',
	'Communication Strategies',
	'Journalism',
	'Public Relations',
	'Accounting',
	'Company Analysis',
	'E-Commerce',
	'Finance',
	'International Affairs/Relations',
	'Investment',
	'Logistics',
	'Trade',
	'Education',
	'Application Essay',
	'Education Theories',
	'Pedagogy',
	'Teachers Career',
	'Engineering',
	'English',
	'Ethics',
	'History',
	'African-American Studies'
    );
    if (!is_null($section))
	return $list[$section];

    return $list;
}

function getAcademicLevelList($section = NULL)
{
    $list = array(
	'High School',
	'Undergraduate',
	'Master',
	'PhD',
    );
    if (!is_null($section))
	return $list[$section];

    return $list;
}

function getStylelList($section = NULL)
{
    $list = array(
	'ASA',
	'APA',
	'MLA',
	'Chicago',
	'Other'
    );
    if (!is_null($section))
	return $list[$section];

    return $list;
}

function getNoOfResourceList($section = NULL)
{
    $list = array();
    for ($i = 1; $i <= 20; $i++)
    {
	$list[$i] = $i;
    }

    if (!is_null($section))
	return $list[$section];

    return $list;
}

function getLevelList($section = NULL)
{
    $list = array(
	'Standard Quality',
	'Premium Quality',
	'Platinum Quality',
    );
    if (!is_null($section))
	return $list[$section];

    return $list;
}

?>

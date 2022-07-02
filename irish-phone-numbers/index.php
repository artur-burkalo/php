<?php 

// show errros, if any
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//pull in the object

require_once('Telephone.php');

$phone_numbers = [
    'phone_number' => '0871234567',
    'dub_number' => '012345678',
    'seven_and_six_digit_area' => '0213456789',
    'five_digit_area' => '040234567',
    'non_geagraphic_number' => '1800123456',
    'non_geagraphic_number_with_08' => '0818123456'
];

function telephone($phone_number, $type = "standard",) {
$telephone = new Telephone($phone_number);
echo $telephone->numbers()[$type];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Irish Phone Numbers formats in PHP</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <section>
        <h1>Phone Numbers formats in PHP</h1>
        <hr>
        <h2>Irish Mobile Numbers</h2>
        <table>
            <tr>
                <th>Number</th>
                <th>Prettier Number</th>
                <th>Inetrnational Number</th>
                <th>Number for the Link</th>
            </tr>
            <tr>
                <td><?= $phone_numbers['phone_number'] ?></td>
                <td><?= telephone($phone_numbers['phone_number'], 'standard'); ?></td>            
                <td><?= telephone($phone_numbers['phone_number'], 'inter'); ?></td>        
                <td><?= telephone($phone_numbers['phone_number'], 'link'); ?></td>            
            </tr>
        </table> 

        <h2>Irish Landline Number (Dublin)</h2>
        <table>
            <tr>
                <th>Number</th>
                <th>Prettier Number</th>
                <th>Inetrnational Number</th>
                <th>Number for the Link</th>
            </tr>
            <tr>
                <td><?= $phone_numbers['dub_number'] ?></td>
                <td><?= telephone($phone_numbers['dub_number'], 'standard'); ?></td>            
                <td><?= telephone($phone_numbers['dub_number'], 'inter'); ?></td>        
                <td><?= telephone($phone_numbers['dub_number'], 'link'); ?></td>            
            </tr>
        </table> 
        <h2>7 and 6 Digit Areas</h2>
        <table>
            <tr>
                <th>Number</th>
                <th>Prettier Number</th>
                <th>Inetrnational Number</th>
                <th>Number for the Link</th>
            </tr>
            <tr>
                <td><?= $phone_numbers['seven_and_six_digit_area'] ?></td>
                <td><?= telephone($phone_numbers['seven_and_six_digit_area'], 'standard'); ?></td>            
                <td><?= telephone($phone_numbers['seven_and_six_digit_area'], 'inter'); ?></td>        
                <td><?= telephone($phone_numbers['seven_and_six_digit_area'], 'link'); ?></td>            
            </tr>
        </table>

        <h2>5 Digit Areas</h2>
        <table>
            <tr>
                <th>Number</th>
                <th>Prettier Number</th>
                <th>Inetrnational Number</th>
                <th>Number for the Link</th>
            </tr>
            <tr>
                <td><?= $phone_numbers['five_digit_area'] ?></td>
                <td><?= telephone($phone_numbers['five_digit_area'], 'standard'); ?></td>            
                <td><?= telephone($phone_numbers['five_digit_area'], 'inter'); ?></td>        
                <td><?= telephone($phone_numbers['five_digit_area'], 'link'); ?></td>            
            </tr>
        </table> 

        <h2>Freephone/Toll Free Phone Numbers</h2>
        <table>
            <tr>
                <th>Number</th>
                <th>Prettier Number</th>
                <th>Inetrnational Number</th>
                <th>Number for the Link</th>
            </tr>
            <tr>
                <td><?= $phone_numbers['non_geagraphic_number'] ?></td>
                <td><?= telephone($phone_numbers['non_geagraphic_number'], 'standard'); ?></td>            
                <td><?= telephone($phone_numbers['non_geagraphic_number'], 'inter'); ?></td>        
                <td><?= telephone($phone_numbers['non_geagraphic_number'], 'link'); ?></td>            
            </tr>
        </table> 

        <h2>Standard Rate Phone Numbers</h2>
        <table>
            <tr>
                <th>Number</th>
                <th>Prettier Number</th>
                <th>Inetrnational Number</th>
                <th>Number for the Link</th>
            </tr>
            <tr>
                <td><?= $phone_numbers['non_geagraphic_number_with_08'] ?></td>
                <td><?= telephone($phone_numbers['non_geagraphic_number_with_08'], 'standard'); ?></td>            
                <td><?= telephone($phone_numbers['non_geagraphic_number_with_08'], 'inter'); ?></td>        
                <td><?= telephone($phone_numbers['non_geagraphic_number_with_08'], 'link'); ?></td>            
            </tr>
        </table> 
    <section>
</body>
</html>
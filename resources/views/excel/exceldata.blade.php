<!DOCTYPE html>
<html>

<head>
    <title>Excel Sheet</title>
</head>

<body>
    <table style=" word-wrap: break-word;table-layout:fixed">
        <thead>
            <tr>
                <th>SNo. (click one of below cell to select)</th>
                <th>Time submitted</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Middle Name</th>
                <th>E-mail</th>
                <th>Best phone to contact</th>
                <th>Street Address</th>
                <th>Zip</th>
                <th>City</th>
                <th>State</th>
                <th>Enter Your Desired First Payment Fee Start Date Here</th>
                <th>Package type</th>
                <th>Name As Shown on Card</th>
                <th>Card Number</th>
                <th>Expiration Date MM</th>
                <th>YY</th>
                <th>CVV</th>
                <th>Bank Name</th>
                <th>Account type</th>
                <th>ABA/ Routing Number</th>
                <th>Account Number</th>
                <th>Name on Account</th>
                <th>Date of Birth</th>
                <th>Social Security Number</th>
                <th>Driving license Number</th>
                <th>Driving license State</th>

            </tr>
        </thead>
        <tbody>
            @foreach($userData as $data)
            <tr>
                <td>{!! $data["user"]["sno"] !!}</td>
                <td>{!! $data["user"]["date"] !!}</td>
                <td>{!! $data["profile"]["fname"] !!}</td>
                <td>{!! $data["profile"]["lname"] !!}</td>
                <td>{!! $data["profile"]["mname"] !!}</td>
                <td>{!! $data["user"]["email"] !!}</td>
                <td>{!! $data["profile"]["mno"] !!}</td>
                <td>{!! $data["profile"]["paddress"] !!}</td>
                <td>{!! $data["profile"]["zip"] !!}</td>
                <td>{!! $data["profile"]["city"] !!}</td>
                <td>{!! $data["profile"]["state"] !!}</td>
                <td>{!! $data["order"]["package_start"] !!}</td>
                <td>{!! $data["order"]["package"] !!}</td>
                <td>{!! $data["order"]["contact_information"] !!}</td>
                <td>{!! $data["order"]["card_number"] !!}</td>
                <td>{!! $data["order"]["month"] !!}</td>
                <td>{!! $data["order"]["year"] !!}</td>
                <td>{!! $data["order"]["cvv"] !!}</td>
                <td>{!! $data["order"]["bank_name"] !!}</td>
                <td>{!! $data["order"]["account_type"] !!}</td>
                <td>{!! $data["order"]["routing_number"] !!}</td>
                <td>{!! $data["order"]["account_number"] !!}</td>
                <td>{!! $data["order"]["full_name"] !!}</td>
                <td>{!! $data["last"]['birthdate'] !!}</td>
                <td>{!! $data["last"]["social_security_number"] !!}</td>
                <td>{!! $data["last"]["driving_license_number"] !!}</td>
                <td>{!! $data["last"]["driving_license_state"] !!}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

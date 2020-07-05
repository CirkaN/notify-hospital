<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>

<body>
<h2>We want to invite you to work for our hospital, {{$doctor['name']}}</h2>
<br/>
Your registration link is: <a href="https://hospital.test/create_a_password/{{$doctor['token']}}">Click here</a>
</body>

</html>
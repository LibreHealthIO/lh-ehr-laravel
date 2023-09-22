<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=`device-width`, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>{{$mailData['title']}}</h1>

    <p>Helllo,{{$mailData['username']}} <br> You have been invited to Librehealth as a <b>{{$mailData['role']}}</b> for the facility: <b>{{$mailData['facility']}}</b>  <br> Please click the linke bellow and activate you account</p>
    <a href="{{$mailData['url']}}">Click here to activate your account</a>

</body>
</html>

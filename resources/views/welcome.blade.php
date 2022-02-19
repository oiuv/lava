<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>

<body>
    <h3>个人资料</h3>
    <ul>
        <li>ID：{{$data['id']}}</li>
        <li>Name：{{$data['name']}}</li>
        <li>注册时间：{{$data['created_at']}}</li>
        <li>个人介绍：{{$data['introduction']}}</li>
    </ul>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Not Found</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body{
    background: #f1f2f7;
    font-family: 'Poppins';
}
section{
    height: 100vh;
    width: 100%;
    position: relative;
    overflow: hidden;
}
img{
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
    /* height: 100vh; */
}
a{
    width: 250px;
    text-align: center;
    bottom: 60px;
    left: 0px;
    right: 0px;
    margin: auto;
    position: absolute;
    text-decoration: none;
    list-style: none;
    color: #df0a43;
    font-size: 25px;
    background: #335469 !important;
    border-radius: 20px;
    color: #ffffff;
    padding: 5px 0px;
}
a:hover{
    background: #df0a43 !important;
}
</style>
<body>
    <section class="404">
        <img src="{{asset('/image/404.png')}}" alt="">
        <a href="/">Back to Home</a>
    </section>
</body>
</html>

<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="myStyle.css" rel="stylesheet" type="text/css"/>

</head>
<body>
<ul class="navList">
    <li><a href="http://localhost/Traveling/lab5.html">Traveling</a></li>
    <li><a href="http://localhost:8081/trying_war_exploded/">Contact me</a></li>
    <li><a href="http://www.scs.ubbcluj.ro/~caig0228/examen.html">Back to Hobbys</a></li>
</ul>
<header class="myHeader">
    <h1>Your favourite place</h1>
</header>
<div class="myContainer">
    <div>Here you can add photos with your favourite places. You can add also a file with a short description. I would be excited to see places that I don't know.</div>
<form action="DemoServlet" method="post" enctype="multipart/form-data">
    <div class="myForm">
        <div>
            <label style="margin-top: 15px"><strong>Upload here</strong></label>
        </div>
        <input type="file" name="file" multiple class="form-control-file" id="exampleFormControlFile1">
        <br>
        <input type="submit" style="margin-top: 15px">
    </div>
</form>
    <div>Thank you!</div>
</div>

</body>
</html>

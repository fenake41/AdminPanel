<html>
<head>

    <title>GİRİŞ SAYFASI</title>
    <meta charset="UTF-8">
    <title>ÜYE GİRİŞ SAYFASI</title>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
            integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
            integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
            crossorigin="anonymous"></script>

    <script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>

    <script language="JavaScript" type="text/javascript">
        function openWin(windowURL, windowsName, windowsFeatures) {
            window.open(windowURL, windowsName, windowsFeatures);
        }
    </script>

    <script src="https://www.gstatic.com/firebasejs/5.7.2/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.7.2/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.7.2/firebase-database.js"></script>
    <script>

        // Initialize Firebase
        var config = {
            apiKey: "AIzaSyAl47DkdrepiNLmtJOVUnb3AjOS0elZ6Xc",
            authDomain: "veritabani-37858.firebaseapp.com",
            databaseURL: "https://veritabani-37858.firebaseio.com",
            projectId: "veritabani-37858",
            storageBucket: "veritabani-37858.appspot.com",
            messagingSenderId: "201736369988"
        };
        firebase.initializeApp(config);
    </script>


</head>
<body>
<div class="container">
    <h3 class="text-center">Giriş Yapın</h3>
    <div class="row">
        <div class="col-md-6 col-md-offset-3 well">

            <div class="form-group">
                <label>E-posta</label>
                <input type="email" class="form-control" id="email" placeholder="E-posta">
            </div>
            <div class="form-group">
                <label>Şifre</label>
                <input type="password" class="form-control" id="password" placeholder="Password">
            </div>
            <button id="loginBtn" class="btn btn-primary btn-block">Giriş Yap</button>
            <hr>
            <p class="text-center">
                Eğer üye değilseniz hemen <a href="register.html">üye olun</a>
            </p>

        </div>
    </div>
</div>
<script>

    $("#loginBtn").click(function(){

        var email = $("#email").val();
        var password = $("#password").val();

        firebase.auth().signInWithEmailAndPassword(email, password)
            .then(function(){
                window.location.href = "index.php";
            }).catch(function(error){
            alert(error.message);
        })
    })

</script>

</body>
</html>
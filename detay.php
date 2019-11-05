<html>
<head>
    <title>ADMIN PANEL</title>

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
    <div class="col-12">
        <div style="text-align: center;">
            <h2 style="font-weight: bold;">
                ARAÇ BİLGİLERİ
            </h2>
        </div>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Plaka</th>
                <th scope="col">Araç Km</th>
                <th scope="col">Araç Muayene Tarihi</th>
            </tr>
            </thead>
            <tbody id="liste">

            </tbody>
        </table>
    </div>
    <div class="col-12">
        <div style="text-align: center;">
            <h2 style="font-weight: bold;">
                SÜRÜCÜ BİLGİLERİ
            </h2>
        </div>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Ad Soyad</th>
                <th scope="col">Telefon</th>
                <th scope="col">Adres</th>
            </tr>
            </thead>
            <tbody id="liste2">

            </tbody>
        </table>

    </div>
</div>
<script>


    var current_user ="";

    firebase.auth().onAuthStateChanged(function (user) {

        current_user = user.uid;


        var databaseRef = firebase.database().ref().child('users').child(current_user).child("Arac");

        databaseRef.on('value', function (snapshot) {

            snapshot.forEach(function (item) {

                var key = item.key;
                console.log(item.key);
                var tr = document.createElement("tr");
                var td = $("<td></td>").text(item.val().arac_plaka);
                var td2 = $("<td></td>").text(item.val().arac_km);
                var td3 = $("<td></td>").text(item.val().arac_muayene);

                $("#liste").append(tr, td, td2, td3);
            })
        })
    })
</script>
</body>
</html>
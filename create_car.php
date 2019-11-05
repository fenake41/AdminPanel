<html>
<head>

    <title>Araç Oluştur</title>
    <meta charset="UTF-8">
    <title>ARAÇ EKLEME SAYFASI</title>


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
<div class="col-6 offset-md-3">
    <div style="text-align: center;">
        <h2 style="font-weight: bold;">
            YENİ ARAÇ GİRİŞİ
        </h2>
    </div>
</div>
</div>

<div class="col-md-6 col-sm-6 col-xs-12">
    <div class="panel panel-danger">

        <div class="panel-body">
            <form role="form">

                <div class="form-group">
                    <label>ARAÇ PLAKA</label>
                    <input required="required" id="arac_plaka" class="form-control" type="text">

                </div>
                <div class="form-group">
                    <label>Araç Km</label>
                    <input required="required" id="arac_km" class="form-control" type="number">

                </div>
                <div class="form-group">
                    <label>Araç Muayene Tarih </label>
                    <input required="required" id="arac_muayene" class="form-control" type="date">
                </div>
                <div class="form-group">
                    <label>Araç Kasko Tarih </label>
                    <input required="required" id="arac_kasko" class="form-control" type="date">
                </div>

                <button type="submit" class="btn btn-danger">Oluştur </button>

            </form>
        </div>
    </div>
</div>

<script>

  var current_user = "";

  firebase.auth().onAuthStateChanged(function (user) {

      current_user=user.uid;
      $(".btn-danger").click(function () {

          var arac_plaka = $("#arac_plaka").val();
          var arac_km = $("#arac_km").val();
          var arac_muayene = $("#arac_muayene").val();
          var arac_kasko= $("#arac_kasko").val();

          firebase.database().ref().child("users").child(current_user).child("Arac").push(
              {
                  arac_plaka : arac_plaka,
                  arac_km : arac_km,
                  arac_muayene : arac_muayene,
                  arac_kasko : arac_kasko
              }
          );
          $("#arac_plaka").val('');
          $("#arac_km").val('');
          $("#arac_muayene").val('');
          $("#arac_kasko").val('');




      })


  })

</script>



</body>
</html>
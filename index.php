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
<nav class="navbar navbar-inverse">

    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand user-text"></a>
        </div>
    <div class="navbar-header">
        <a class="navbar-brand user-text" href="#"></a>
        <ul class="nav navbar-nav navbar-right">
            <li><button id="logout" class="btn btn-danger">Çıkış Yap</button></li>
        </ul>
    </div>
    </div>

</nav>


<div class="container">
    <div class="col-6 offset-md-3">
        <div style="text-align: center;">
            <h2 style="font-weight: bold;">
                ARAÇ TAKİP SİSTEMİ
            </h2>


        </div>


        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Plaka</th>
                <th scope="col">İşlem</th>
                <th scope="col"><button id="create" type="button" class="btn btn-primary">Araç Ekle</button></th>
            </tr>
            </thead>
            <tbody id="liste">

            </tbody>
        </table>

    </div>
</div>
<script>

    var current_user ="";

    firebase.auth().onAuthStateChanged(function (user) {

        current_user = user.uid;

        if(user){


        }else{
            window.location.href = "login.php";
        }



    var databaseRef = firebase.database().ref().child('users').child(current_user).child("Arac");

    databaseRef.on('value', function (snapshot) {
        snapshot.forEach(function (item) {
            var key=item.key;

            console.log(item.key);
            var tr = document.createElement("tr");
            var td = $("<td></td>").text(item.val().arac_plaka);

           /* var buttonHTML = '' +
                '<td>' +
                '<a href="javascript:openWin(\'detay.php?plakaId=' + item.key + '\', \'\',\'toolbar-no,location=no,directories=0,status=no,top=100,left=200,manuBar=no,scrollBars=no,resizable=no,width=800,height=500\');" class="btn btn-primary btn-sm btn-block">' +
                'BİLGİLERİ GETİR' +
                '</a>' +
                '</td>'*/

            var removeBtn_elem = "<td><button data-key='"+item.key+"' class='btn btn-danger btn-block removeBtn'>Sil</button></td>";

            var girisBtn = "<td><button data-key='\"+item.key+\"' id='giris' class='btn btn-primary btn-block girisBtn'>Bilgileri Getir</button></td>";


            $("#liste").append(tr, td, girisBtn, removeBtn_elem);
        })
    })

        $("body").on("click", ".removeBtn", function(){

            var $key = $(this).data("key");

            firebase.database().ref("users/" + current_user).child("Arac").child($key).remove();
            window.location.href= "index.php";

        });

        $("body").on("click", ".girisBtn", function(){

            var $key = $(this).data("key");

            window.location.href= "detay.php";

        });


    firebase.auth().onAuthStateChanged(function (user) {
        if(user){
            $("#logout").click(function () {

                    firebase.auth().signOut()
                        .then(function () {
                            window.location.href= "login.php";

                        })
            })
        }

    })

    $("#create").click(function () {
        window.location.href="create_car.php";

    });

    })
</script>

</body>
</html>
https://stackoverflow.com/questions/27765666/passing-variable-through-javascript-from-one-html-page-to-another-page
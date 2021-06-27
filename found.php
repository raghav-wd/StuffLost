<?php include "includes/header.php";?>

<title>Found | Stuff Lost</title>

</head>

<body class="">

<?php include "includes/topbar.php"; ?>


<div class="container-1">

    

        <div class="row">
            <div class="col s12 m12 l10">
                    <div class="card white">
                        <div class="container-3">
                            <div class="card-content white-text">
                                <span class="card-title black-text">
                                    <h1>Found Something | Tell Us</h1>
                                </span>
                    
                                <form action="found_prc.php" method="post" enctype="multipart/form-data">
                                    <input type="text" name="name" placeholder="Your Name" />
                                    <input type="text" name="found-tags" onkeyup="tag(this)" id="found-tags" placeholder="Found-tags" />
                                    <div class="chips-container">
                                    </div>
                                    <input type="text" name="found-conctact" placeholder="Mobile No./Room No." />
                                    <input type="file" name="found-picture" />
                                    <br />
                                    <div class="submit-button">
                                        <input type="submit" value="Help someone" class="container-1" />
                                        <div class="submit-line"></div>
                                    </div>
                            </div>
                        </div>
                    </div>
               </div>
        </div>

        <script>
            var chip_b = document.querySelector(".chips-container");
            var i = 1;
            function tag(tag_v){
                var ftag = document.querySelector('#found-tags');
                    var text = tag_v.value;
                    var len = text.length;
                    if (text.charAt(len - 1) == ' ')//checks if last char entered is space and then makes the text
                    {
                        chip_b.innerHTML += "<div class='chip'><span class='chip-text'><input type='text' name='chip-text-"+i+"' value='"+text+"' style='width: 55px;border:none;padding-left:6px;font-size: 14px;'/></span><i onclick='dec_close()' class='close'>&times;</i></div>";
                        tag_v.value = "";
                        i++;
                    }
                }
                function dec_close(){
                    i--;
                }
        </script>
    </form>
</div>

<?php include "includes/footer.php"; ?>



</body>
</html>

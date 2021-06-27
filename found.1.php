<?php include "includes/header.php"; ?>

<title>Found | Stuff Lost</title>

</head>

<body class="teal lighten-4">

<div class="container-1">

    

        <div class="row">
            <div class="col s12 m12 l10">
                    <div class="card white">
                        <div class="container-3">
                            <div class="card-content white-text">
                                <span class="card-title black-text">
                                    <h1>Found Something | Tell Us</h1>
                                </span>
                    
                                <form action="found_prc.php" method="post">
                                    <input type="text" name="name" placeholder="Your Name" />
                                    <input type="text" name="found-tags" onkeyup="tag(this)" id="found-tags" placeholder="Found-tags" />
                                    <div class="chips-container">
                    
                                    </div>
                                    <input type="text" name="found-conctact" placeholder="Mobile No./Room No." />
                                    <input type="file" name="found-picture" placeholder="Can you post a picture of it" />
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
            var a;
            function tag(tag_v){
                var ftag = document.querySelector('#found-tags');
                    var text = tag_v.value;
                    var len = text.length;
                    if (text.charAt(len - 1) == ' ')//checks if last char entered is space and then makes the text
                    {
                        chip_b.innerHTML += "<div class='chip'><span class='chip-text'>"+text+"</span><i class='close'>&times;</i></div>";
                        tag_v.value = "";
                        
                    }
                }
        </script>
    </form>
</div>
<?php 
$sql = "update found set chip_text_1 = '' where lost_num=1";

</body>
</html>

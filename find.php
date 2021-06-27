<?php include "includes/header.php"; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Stufflost | Find</title>
</head>

<body>

<?php include "includes/topbar.php"; ?>

<div class="container-2">
    <div class="row">
       <form action="find.php" id="search" method="GET">
            <div class="input-field col s6">
                <i class="fa fa-search prefix white"></i>
                <input id="first_name2" value="<?php if(!empty($_GET)){echo $_GET['search'];}?>" name="search" type="text" class="validate" onkeyup="results(this)">
                <label class="active" for="first_name2" style="background-color: white;">Search Here with keywords</label>
            </div>
       </form>
    </div>
</div>

<script>
   
    function results(kees) {
        if()
        document.querySelector('#search').submit();
    }
</script>

<div class="results container-4" style="background-color: whitesmoke; border: 6px solid grey;">
<?php
    if(!empty($_GET))
    {
        $search = $_GET['search'];
        if($search != "")
        {
            echo "<h2>Search Results</h2>";
            for($i=1; $i<5; $i++)
            {
                $sql = "select * from found where chip_text_".$i." Like '".$search."%'";
                $res = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($res);
                $result = $row['chip_text_'.$i];
                if($result)
                {
                    $sql = "select * from found where chip_text_".$i." = '".$result."'";
                    $res = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($res);
                    echo "<div class='col s12 m7'>
                            <div class='card horizontal' style='padding: 10px;height: auto;'>
                                <div class='card-image'>
                                   <img src='losts_img/".$lost_id."' width='100px' height='100px'> 
                                </div>
                                <div class='card-stacked'>
                                    <div class='card-content'>
                                        <p><b>Tags: </b><div class='chip'>".$row['chip_text_1']."<i>&deg;</i></div>"."<div class='chip'>".$row['chip_text_2']."<i>&deg;</i></div>"."<div class='chip'>".$row['chip_text_3']."<i>&deg;</i></div>"."<div class='chip'>".$row['chip_text_4']."<i>&deg;</i></div></p>
                                        <button class='collapsible'>Get more info</button>
                                        
                                        <div class='content'>
                                        <div class='container-1'>
                                        <p><b>Name: </b>".$row['name']."</p>
                                        <p><b>Conctact: </b>".$row['mob_or_rno']."</p>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>";
                }   
            }
        }
    }
    
?>
</div>





<div class="container-2">
    <?php 

    $sql = "select MAX(id) from found";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    $max_id = $row['MAX(id)'];

    for($i=$max_id; $i>0; $i--){
        $sql = "select name from found where id='$i'";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($res);
        $name = $row['name'];

        $sql = "select mob_or_rno from found where id='$i'";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($res);
        $conc = $row['mob_or_rno'];

        $sql = "select lost_id from found where id='$i'";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($res);
        $lost_id = $row['lost_id'];

        if(isset($_SESSION['message'])){echo $_SESSION['message']; unset($_SESSION['message']);};

        for($j=1;$j<5;$j++){
            $sql = "select chip_text_".$j." from found where id='$i'";
            $res = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($res);
            $chip_arr[$j] = $row["chip_text_".$j];
        }
        echo "<div class='col s12 m7'>
                <div class='card horizontal' style='padding: 10px;height: auto;'>
                    <div class='card-image'>
                        <img src='losts_img/".$lost_id."' width='100px' height='100px'> 
                    </div>
                    <div class='card-stacked'>
                        <div class='card-content'>
                            <p><b>Tags: </b><div class='chip'>".$chip_arr[1]."<i>&deg;</i></div>"."<div class='chip'>".$chip_arr[2]."<i>&deg;</i></div>"."<div class='chip'>".$chip_arr[3]."<i>&deg;</i></div>"."<div class='chip'>".$chip_arr[4]."<i>&deg;</i></div></p>
                            <button class='collapsible'>Get more info</button>
                            
                            <div class='content'>
                            <div class='container-1'>
                            <p><b>Name: </b>".$name."</p>
                            <p><b>Conctact: </b>".$conc."</p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";//printing block
    }
    ?>


</div>






<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>

<?php include "includes/footer.php"; ?>


</body>
</html>

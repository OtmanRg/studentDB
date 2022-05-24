<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="">
    <style>
        body{
            background-color:whitesmoke;
            font-family: 'Tajawal', sans-serif;
        }
        #mother{
            width:100%;
            font-size:20px;
        }
        main{
            float:left;
            border: 1px solid gray;
            padding: 5px;
        }
        input{
            padding: 4px;
            border: 2px solid black;
            text-align:center;
            font-size: 17px;
            font-family: 'Tajawal',sans-serif;     
        }
        aside{
            text-align: center;
            width:300px;
            float:right;
            border: 1px solid black;
            padding: 10px;
            font-size:20px;
            background-color:silver;
            color:white;
        }
        #tbl{
            width:890px;
            font-size:20px;
            text-align: center;
        }
        #tbl :hover{
            background-color: white;
            box-shadow: 2px 1px 1px gray;
        }
        #tbl th{
            background-color:silver;
            color:black;
            font-size: 20px;
            padding:5px; 
        }
        aside button{
            width:180px;
            padding:8px;
            margin-top: 8px;
            font-family: 'Tajawal', sans-serif;
            font-size: 16px;
            font-weight:bold;
        }
    </style>
</head>
<body >
    <?php 
    // 
    $host='localhost';
    $user='root';
    $pass='';
    $db='student';
    $con= mysqli_connect($host,$user,$pass,$db);
    $res= mysqli_query($con,"select * from student");
    // button variable
    $id='';
    $name='';
    $adress='';
    if (isset($_POST['id'])) {
        $id= $_POST['id'];
    }
    if(isset($_POST['name'])){
        $name= $_POST['name'];
    }
    if(isset($_POST['adress'])){
        $adress= $_POST['adress'];
    }
    $sqls='';
    if(isset($_POST['add'])){
        $sqls = "insert into student value($id,'$name','$adress')";
        mysqli_query($con,$sqls);
        header("location: home.php");
    }
    if(isset($_POST['del'])){
        $sqls="delete from student where name='$name' or id='$id'";
        mysqli_query($con,$sqls);
        header("location: home.php");
    }
    ?>
    <div id="mother">
        <form method="post">
            <aside>
                <div id="div">
                    <img src="https://th.bing.com/th/id/OIP.YxmuxDqrK2rJCUu3wS-wgQAAAA?pid=ImgDet&rs=1" alt="لوغو الموقع" width="150">
                    <h3>لوحة المدير</h3>
                    <label for="">رقم الطالب</label><br>
                    <input type="text" name='id' id='id'><br>
                    <label for="">اسم الطالب</label><br>
                    <input  type="text" name="name" id='name'><br>
                    <label for="">عنوان الطالب</label><br>
                    <input type="text" name='adress' id='adress'><br><br>
                    <button name='add'> اضافة طالب</button>
                    <button name="del"> حذف الطالب</button>
                </div>
            </aside>
            <main>
                <table id='tbl'>
                    <tr>
                       
                        <th>الرقم التسلسلي</th>
                        <th>اسم الطالب </th>
                        <th>عنوان الطالب</th> 
                        <?php
                        while ( $row = mysqli_fetch_array($res)){
                            echo "<tr>";
                            echo "<td>".$row['id']."</td>";
                            echo "<td>".$row['name']."</td>";
                            echo "<td>".$row['adress']."</td>";
                            echo "</tr>";
                        }
                         ?>
                    </tr>
                </table>
            </main>
        </form>
    </div>
    
</body>
</html>
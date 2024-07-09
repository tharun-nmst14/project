<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    
    <style>
         body{
            background-image:url('reg.jpeg');  
            background-size:cover;
             
         }
         
        form{
            margin-top: 1%;  
          
        }
         table{ text-align: center;
            background-color: antiquewhite;
            width: 60%;
            height: auto; 
            border-radius:3%;
            padding-top:10px;
            padding-bottom:10px;
        }
        label{
            color:darkblue;
            font-size:20px;
        }
        
        
    </style>
    
</head>
<body>
    <center><h1 style="color: rgb(202, 119, 10);">Exam Registration Form</h1>
        <form action="enroll.php" method="POST">
            <table>
              <tr> <td> <label for="name">Name :</label></td>
              <td>  <input type="text" id="name" name="name" ></td> </tr>
               <tr> <td>  <label for="id">Id :</label> </td> <td>
                <input type="text" id="id" name="id"> </td> </tr>
                <tr> <td><label for="year">Year :</label></td>
                    <td><input type="text" id="year" name="year"></td>
                </tr>
                <tr><td><label for="sem">Semester :</label></td>
                <td><input type="text" id="sem" name="sem"></td></tr>
                <tr><td><label for="gender">Gender :</label></td>
                <td><input type="text" id="gender" name="gender"></td></tr>
                <tr>
                <td><label for="num">Number :</label></td>
                <td><input type="text" id="num" name="num"></td>
                </tr>
                <tr><td><label for="gmail">Email :</label></td>
                <td><input type="email" id="gmail" name="gmail"></td> </tr>
                <tr><td><label for="pass">Password :</label></td>
                <td><input type="password" id="pass" name="pass"></td></tr>
                <tr>
                    <td>Subjects :</td>
                    <td><input type="checkbox" id="oops" name="oops" class="sub">OOPs-100 <input type="checkbox" id="web" name="web" class="sub">WEB-200 <input type="checkbox" id="daa" name="daa" class="sub">DAA-300 <input type="checkbox" id="py" name="py" class="sub">Python-400 </td>
                    </tr>
                    <tr>
                        <td>Upload Photo :</td>
                        <td><input type="file" name="photo" id="photo"></td>  
                        </tr> 
                        <tr>
                            <td></td>
                            <td></td>
                            </tr>
                        <tr>
                         <td><button value="submit">Enroll</button></td>
                         <td><button value="reset">Reset</button></td>
                         </tr>
                         <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;Have Account..!  <a href="login.php">login</a></td></tr>
                 </table>
            </form>
        </center>
    </body>
</html>
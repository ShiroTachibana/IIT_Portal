<!DOCTYPE html>
<title>IIT Billing</title>
<link rel="shorcut icon" type="x-icon" href="./images/schoologo.webp"> 
<link rel="stylesheet" href="./assets/main.css">
<link rel="stylesheet" href="./assets/aweb.css">
<link rel="stylesheet" href="./assets/homepage.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

<head>
    
      <img src="./images/schoologo.webp" height="240px" width="250px" style="position: absolute; left: 200px; top: 90px">
      <p style="font-family: Arial; font-size: 40px; position: absolute; left: 30px; top: 350px">Intellisense Institute of Technology<br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Students' Account Portal</p>
     </div>
        </div>
         </head>
         <div class="hnav">
          <div style="color: #555; position: fixed; top: 15px; left: 180px;">
           <a href="./index.html" style="text-decoration: none; color: #333;width: 190px;
           padding: 2px 20px;
           margin: 8px 0;
           box-sizing: border-box;
           border: none;
           border-bottom: 2px solid green;">Home</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <a href="./about school.html" style="text-decoration: none; color: #333;
           width: 190px;
            padding: 2px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: none;
            border-bottom: 2px solid green;">About</a>
           </div>
           </div>
           <div class="login-box" style=" height: 480px; width: 390px; right: 140px;">
           <form action="./save.php" method="post">
             Full Name<br>
            <input type="text" name="fname" id="fname" placeholder="Insert your full name...">
            <br><br>
            Username<br>
            <input type="text" name="username"  id="username placeholder="Insert your username...">
            <br> <br>
            Password<br>
            <input type="password" name="password" id="pasword" placeholder="Insert your password...">
            <br> <br>
            Student ID (Ex: IIT-SHS123)<BR>
            <input type="text" name="idnum" id="idnum" placeholder="Insert your student id...">
            <br><br>
            <label for="position">Are you a</label>
            <select required name="position" id="pos">
            <option value="student">Student</option>
            <option value="admin">Admin/School Staff</option>
            </select>

            <br><br>
            <button type="submit" value="Submit">Submit</button>
            </form>
     
            </div>
            </div>  
            </div>
            </div>
           </div>
          </div>
</head>
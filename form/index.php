<?php
  require_once "include/database.php";
  $d = new database;

  require_once "function/server.php";
  $p = new project;
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Training Application Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <div class="testbox">
      <form action="index.php" method="POST" enctype='multipart/form-data'>
        <?php require_once "include/isset.php";?>
        <div class="banner">
          <h1>Training Application Form</h1>
        </div>
        <h2>Applicant Details</h2>
        <div class="item">
          <p>Name</p>
          <div class="name-item">
            <input type="text" name="fname" placeholder="First"/>
            <input type="text" name="lname" placeholder="Last"/>
          </div>
        </div>
        <div class="item">
          <p>Phone</p>
          <input type="number" name="phone"/>
        </div>
        <div class="item">
          <p>Fax</p>
          <input type="text" name="fax"/>
        </div>
        <div class="item">
          <p>Email</p>
          <input type="email" name="email"/>
        </div>
        <div class="item">
          <p>Company name</p>
          <input type="text" name="cname"/>
        </div>
        <div class="item">
          <p>Address</p>
          <input type="text" name="address" placeholder="Street address" />
          <input type="text" name="address2" placeholder="Street address line 2" />
          <div class="city-item">
            <input type="text" name="city" placeholder="City" />
            <input type="text" name="region" placeholder="Region" />
            <input type="text" name="zip_code" placeholder="Postal / Zip code" />
            <select name="country">
              <option value="">Country</option>
              <option value="Russia">Russia</option>
              <option value="Germany">Germany</option>
              <option value="Armenia">Armenia</option>
              <option value="USA">USA</option>
              <option value="Canada">Canada</option>
              <option value="Nigeria">Nigeria</option>
              <option value="UK">UK</option>
              <option value="France">France</option>
            </select>
          </div>
        </div>
        
        <div class="item">
        <h2>Course Details</h2>
        <select name="course">
          <option value="FrontEnd HTML & CSS">FrontEnd HTML & CSS</option>
          <option value="BackEnd PHP (OOP)">BackEnd PHP (OOP)</option>
        </select>
        </div>
        <div class="item">
          <p>Location</p>
          <input type="text" name="location"/>
        </div>
        <div class="item">
          <p>Start Date</p>
          <input type="date" name="date"/>
          <i class="fas fa-calendar-alt"></i>
        </div>
        <!-- <div class="item">
          <p>Start Date</p>
          <input type="time" name="time"/>
          <i class="fas fa-time-alt"></i>
        </div> -->
        <h2>Preffered place of Study</h2>
        <div class="item">
              <p>Please Choose</p>
                    <select name="place_study">
                      <option value="online">Online</option>
                      <option value="physical">Physical Study</option>
                    </select>
        </div>
        <div class="item">
          <p>How do you see your self in 5 years after achieving your programing goals?</p>
          <textarea name="content" style="width: 100%; height:100px;" id="content" cols="30" rows="10"></textarea>
        </div>
        <div class="item">
          <p>What is your greatest fear?</p>
          <input type="text" name="fear" placeholder="Short input" />
        </div>

        <div class="item">
          <p>Referral</p>
          <input type="text" name="referral" placeholder="Enter refferal name"/>
        </div>

         <div class="city-item">
            <label for="exampleInputFile" class="city-item">Image Profile Image</label>
            <input type="file" name="uploaded_file"  required/>
         </div>

        <div class="question">
          <p>Privacy Policy<span class="required">*</span></p>
          <div class="question-answer checkbox-item">
            <div>
              <input type="checkbox" value="1" id="check_1" name="agreement" required/>
              <label for="check_1" class="check"><span>I agree to the <a href="https://mstarztech.com/policy">privacy policy.</a></span></label>
            </div>
          </div>
        </div>
        <div class="btn-block">
          <button type="submit" name="submit_form">Send</button>
        </div>
      </form>
    </div>
  </body>
</html>
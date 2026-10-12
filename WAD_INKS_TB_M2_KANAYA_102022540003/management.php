<?php
$name = $age = $contactNumber = $email = $licenseNumber = $activityStatus = " ";
$nameErr = $ageErr = $contactNumberErr = $emailErr = $licenseNumberErr = $activityStatusErr = " ";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = trim($_POST["name"]);
  if (empty($name)) {
      $nameErr = "Name is required";
  }

  $age = trim($_POST["age"]);
  if (empty($age)) {
      $ageErr = "Age is required";
  }

  $contactNumber = trim($_POST["contactNumber"]);
  if (empty($contactNumber)) {
      $contactNumberErr = "Contact number is required";
      } 
      elseif (!ctype_digit($contactNumber)) {
          $contactNumberErr = "Phone number must contain numbers only";
  }

  $email = trim($_POST["email"]);
  if (empty($email)) 
      { $emailErr = "Email is required"; }
      elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
      $emailErr = "Email format is invalid"; 
  }  

  $licenseNumber = trim($_POST["licenseNumber"]);
  if (empty($licenseNumber)) {
      $licenseNumberErr = "License number is required";
  }

  $activityStatus = trim($_POST["activityStatus"]);
  if (empty($activityStatus)) {
      $activityStatusErr = "Activity status is required";
  }
}


<!DOCTYPE html>
<head>
  <title>Driver Profile</title>
  <style>
  body {
        font-family: Arial, sans-serif;
        background-color: #ffff;
        padding: 20px;
      }

      .container {
        background-color: #ffff;
        width: 400px;
        margin: 0 auto;
        padding: 20px;
        border: 2px solid #ccc;
      }

      h2 {
        text-align: center;
      }

      label {
        font-weight: bold;
        display: block; 
        margin-top: 10px;
      }

      input, select {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        margin-bottom: 15px;
        box-sizing: border-box; 
      }

      input[type="radio"] {
        width: auto; 
      }

      button {
        background-color: #007bff;
        color: white;
        width: 100%;
        padding: 10px;
        border: none;
        font-weight: bold;
        cursor: pointer;
      }

      .data-row {
        margin-bottom: 15px;
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
      } 

  </style>
    </style>
</head>
<body>
  <h2>Driver Profile</h2>
  <div class="container">
    <form action="ModuleCDisplay.html" method="GET">
      
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" value="<?php echo $name; ?>">
      <span class="error"><?php echo $nameErr ? "* $nameErr" : ""; ?></span>

      <label for="age">Age:</label>
      <input type="number" id="age" name="age" value="<?php echo $age; ?>" required placeholder="19" min="1">
      <span class="error"><?php echo $ageErr ? "* $ageErr" : ""; ?></span>

      <label for="contactNumber">Contact Number:</label>
      <input type="text" id="contactNumber" name="contactNumber" value="<?php echo $contactNumber; ?>" placeholder="+62 8XX-XXXX-XXXX" required>
      <span class="error"><?php echo $contactNumberErr ? "* $contactNumberErr" : ""; ?></span>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" value="<?php echo $email; ?>" required placeholder="john@example.com">
      <span class="error"><?php echo $emailErr ? "* $emailErr" : ""; ?></span>

      <label for="license">Active License Number:</label>
      <input type="text" id="license" name="license" value="<?php echo $licenseNumber; ?>" required placeholder="123456789">
      <span class="error"><?php echo $licenseNumberErr ? "* $licenseNumberErr" : ""; ?></span>

      <label for="activityStatus">Activity Status:</label>
        <select id="activityStatus" name="activityStatus" value="<?php echo $activityStatus; ?>" required>
            <option value="">-- Select Status --</option>
            <option value="Available" <?php echo ($activityStatus == "Available") ? "selected" : ""; ?>>Available</option>
            <option value="Off-Duty" <?php echo ($activityStatus == "Off-Duty") ? "selected" : ""; ?>>Off-Duty (Resting)</option>
            <span class="error"><?php echo $activityStatusErr ? "* $activityStatusErr" : ""; ?></span>
        </select>

      <button type="submit">Submit & View Data</button>
    </form>
  </div>
</body>
?>
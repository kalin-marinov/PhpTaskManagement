<html>

<head>
  <link rel="stylesheet" href="../Assets/css/loginPage.css">
  <script src='../Assets/js/jquery-3.1.1.min.js' type="text/javascript"></script>
  <script src="../Assets/js/Login.js" type="text/javascript"></script>
</head>

<body>
  <div id="wrap">
    <div id="regbar">
      <div id="navthing">
        <h2>Create Task | <?=$_USER->username?> </h2>
        <div class="formContainer">
          <form action="" method="POST">
            <label name="taskname">Task Name</label>
            <input type="text" name="projectname" />
            <label name="description">Task Description</label>
            <textarea rows="4" cols="50" name="description"></textarea>
            <input type="submit" value="Create" />
          </form>
        </div>
      </div>
    </div>
</body>

</html>

<link rel="stylesheet" href="css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="css/login_css/style.css">
<link rel="stylesheet" type="text/css" href="css/sidebar-menu.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/admission_form.css">
<link rel="stylesheet" type="text/css" href="form/form_style.css">
<link rel="stylesheet" href="table_style.css">
<link rel="stylesheet" href="css/bootstrap-select.min.css">



</head>
<body>


  <!-- ==============header menu area ====================-->
<!--   <section class="header_area">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <p> Any Questions? Call Us  </p>
        </div>
        <div class="col-md-3"><p>+8801719265897(shovon)</p></div>
        <div class="col-md-3"><p>E-mail : andimpex@gmail.com</p></div>
        <div class="col-md-3 login">
          <div class="col-md-4">

            <p><a href="#">Admin</a></p>      
          </div>
          <div class="col-md-4">
            <p><a href="#">User</a></p>
          </div>
          <div class="col-md-4">
            <p><a href="logout.php">Log Out</a></p>
          </div>

        </div>
      </div>
    </div>
  </section> -->
  <!--==================main menu section========================-->
  <section class="main_menu">
    <style>
    .main_menu{
      max-width: 100%;
      height: auto;
      border-collapse: collapse;
    }
    ul{
      list-style: none;
      margin-top: 20px;
    }
    .menu li{
      display: inline-block;
    }
    .dropbtn {
      background-color: #535353;
      color: white;
      padding: 13px;
      font-size: 16px;
      border: 4px solid #ad7cc1;
      border-radius: 10%;
      cursor: pointer;
    }

    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #3e6a8f;
      min-width: 300px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }

    .dropdown-content a {
      color: white;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      font-size: 16px;

    }

    .dropdown-content a:hover {background-color: black}
    .c a:hover {}

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .dropdown:hover .dropbtn {
      background-color: #3e6a8f;
    } 
  </style>
  <div class="container">
    <div class="row">
      <div class="col-md-2">
        <a href="index.php"><img src="image/logo.png" style="max-width: 275px;height: 156px;"></a>
      </div>
      <div class="col-md-8" style="margin-top:25px;">

       <ul class="menu">

        <li><div class="dropdown">
         <button class="dropbtn">আমদানি</button>
         <div class="dropdown-content">
          <a href="import.php">নতুন এন্ট্রি</a>
          <a href="import_record.php">এন্ট্রি রেকর্ড দেখা</a>

        </div>
      </div>
    </li>
    <li>
      <div class="dropdown">
        <a href="inventory.php"><button class="dropbtn">গোডাউন</button></a>

      </div>
    </li>
    <li>
     <div class="dropdown">
      <button class="dropbtn">ডিস্ট্রিবিউট</button>
      <div class="dropdown-content">
        <a href="distribute.php">পয়েন্টে পাঠানো</a>
        <a href="distribute_record.php">পয়েন্টে পাঠানোর রেকর্ড</a>
      </div>
    </div>
  </li>
  <li>
    <div class="dropdown">
      <a href="point.php"><button class="dropbtn">পয়েন্ট</button></a>

    </div>
  </li>

  <li>
    <div class="dropdown">
      <a href="account.php"><button class="dropbtn">অ্যাকাউন্ট</button></a>

    </div>
  </li>


  <li><div class="dropdown">
    <button class="dropbtn">ম্যানেজার</button>
    <div class="dropdown-content">
      <a href="take_due.php">পয়েন্টের বাকি আদায় </a>
      <a href="due_paid.php">ডিলারের দেনা পরিশোধ </a>
      <a href="expense.php">নতুন খরচ/লিস্ট</a>
      <a href="product_add.php">প্রোডাক্ট অ্যাড/লিস্ট</a>
    </li>

    <li><div class="dropdown">
      <button class="dropbtn">এডমিন</button>
      <div class="dropdown-content">
        <a href="expense_list.php">নতুন খরচ এর খাত যোগ</a>
        <a href="point_add.php">নতুন পয়েন্ট অ্যাড/লিস্ট </a>
        <a href="employee.php">নতুন কর্মচারী অ্যাড</a>
        <a href="user_add.php">USER অ্যাড/লিস্ট</a>
        <a href="delete_record.php">রেকর্ড ডিলিট</a>
      </li>
    </ul> 
  </div> 
  <div class="col-md-2">
    <style>
    @import 'https://fonts.googleapis.com/css?family=Open+Sans';
    *{
      margin: 0;
      padding: 0;
    }

    
    #clock{
      align-items: center; */
      /* -webkit-align-items: center; */
      display: flex;
      display: -webkit-flex;
      height: 63px;
      justify-content: space-around;
      -webkit-justify-content: space-around;
      left: calc(130% - 300px);
      position: absolute;
      top: calc(100% - -36px);
      width: 267px;
    }
    .unit{
      background: linear-gradient(#ad7cc1, #777);
      border-radius: 15px;
      box-shadow: 0 2px 2px #ad7cc1;
      color: #fff;
      font-family: "Open Sans", sans-serif;
      font-size: 29px;
      height: 100%;
      line-height: 69px;
      margin: 0px 0px;
      text-align: center;
      text-shadow: 0 2px 2px #ad7cc1;
      width: 23%
    }
  </style>
  <div id="clock">
    <p class="unit" id="hours"></p>
    <p class="unit" id="minutes"></p>
    <p class="unit" id="seconds"></p>
    <p class="unit" id="ampm"></p>
  </div>
</div>             
</div>

</div>
</section>
<!--================SCRIPT================-->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/sidebar-menu.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-select.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/jquery.tabledit.js"></script>

<script>
  var $dOut = $('#date'),
  $hOut = $('#hours'),
  $mOut = $('#minutes'),
  $sOut = $('#seconds'),
  $ampmOut = $('#ampm');
  var months = [
  'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'
  ];

  var days = [
  'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'
  ];

  function update(){
    var date = new Date();

    var ampm = date.getHours() < 12
    ? 'AM'
    : 'PM';

    var hours = date.getHours() == 0
    ? 12
    : date.getHours() > 12
    ? date.getHours() - 12
    : date.getHours();

    var minutes = date.getMinutes() < 10 
    ? '0' + date.getMinutes() 
    : date.getMinutes();

    var seconds = date.getSeconds() < 10 
    ? '0' + date.getSeconds() 
    : date.getSeconds();

    var dayOfWeek = days[date.getDay()];
    var month = months[date.getMonth()];
    var day = date.getDate();
    var year = date.getFullYear();

    var dateString = dayOfWeek + ', ' + month + ' ' + day + ', ' + year;

    $dOut.text(dateString);
    $hOut.text(hours);
    $mOut.text(minutes);
    $sOut.text(seconds);
    $ampmOut.text(ampm);
  } 

  update();
  window.setInterval(update, 1000);
</script>
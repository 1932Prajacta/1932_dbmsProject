<!DOCTYPE html>
<html lang="en">
<head>
<title>DBMS PROJECT</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */
header {
  height : 100px;
  background-color: blue;
  padding: 30px;
  font-size: 15px;
  color: white;
}

/* Create two columns/boxes that floats next to each other */
nav {
  float: left;
  width: 20%;
  height: 300px; /* only for demonstration, should be removed */
  background: yellow;
  padding: 50px;
  margin: 10px;
  margin-left: 10px;
}

/* Style the list inside the menu */
nav ul {
  list-style-type: none;
  padding: 0;
  margin: 10px;
}

button{

}

img{
    -webkit-box-shadow: 0px 1px 22px 0px rgba(50, 50, 50, 0.75);
-moz-box-shadow:    0px 1px 22px 0px rgba(50, 50, 50, 0.75);
box-shadow:         0px 1px 22px 0px rgba(50, 50, 50, 0.75);
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
}

.img_home_pos {
padding: 25px;
text-align: center;
}

/* Clear floats after the columns */
section:after {
  content: "";
  display: table;
  clear: both;
}
 li {

 }

/* Style the footer */
footer {
  height :50px;
  background-color: #777;
  padding: 10px;
  text-align: center;
  color: white;
}

/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
@media (max-width: 600px) {
  nav, article {
    width: 100%;
    height: auto;
  }
}
</style>
</head>
<body>

<header>
  <h1>College Management System</h1>
  
</header>

<section>
  <nav>
    <ul>
      <li> <button style="margin: 10px; background-color: white";> <a href="index2.php">Admin</a> </button></li>
      <li> <button style="margin: 10px; background-color: white";> <a href="login3.php">User</a> </button></li>
      <li> <button style="margin: 10px; background-color: white";> <a href="home.php">About</a> </button></li>
    </ul>
  </nav>
  
  <article>
  
    <div class="img_home_pos">
        <a><img src="images/college_2.jpg"width="650" style="text-align: center;" height="290" alt="Government College Sankhali" /></a><span class="header_pos">
    </div><br>
  </article>
</section>

<footer>
  <a href="home.php" class="btn btn-primary btn-large">About<i class="icon-white icon-check"></i></a
</footer>

</body>
</html>

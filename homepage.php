<!DOCTYPE html>
<html>
<head>
  <title>Home Page</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<style>
/* Reset default margin and padding */
body, ul {
  margin: 0;
  padding: 0;
}

/* Set the background image */
body {
  background-image: url('homebg.jpg');
  background-size: cover;
  background-position: center;
  font-family: Arial, sans-serif;
  color: #fff; /* Set the default font color to white */
  backdrop-filter: blur(4px);
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
}
/*** *
body {
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
}
*******/
header {
  background-color: rgba(0, 0, 0, 0.8);
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 100;
}

nav {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px;
}

.logo {
  color: #fff;
  font-size: 24px;
}

.menu-icon {
  display: none;
  color: #fff;
  font-size: 20px;
  cursor: pointer;
}

.menu {
  display: flex;
  list-style-type: none;
}

.menu li {
  margin-right: 10px;
}

.menu li a {
  color: #fff;
  text-decoration: none;
}

@media screen and (max-width: 768px) {
  .menu-icon {
    display: block;
  }

  .menu {
    display: none;
    flex-direction: column;
    padding: 10px;
    background-color: rgba(0, 0, 0, 0.8);
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
  }

  .menu li {
    margin-right: 0;
    margin-bottom: 10px;
  }

  .menu li:last-child {
    margin-bottom: 0;
  }

  #menu-toggle:checked + .menu {
    display: flex;
  }
}
nav ul {
  list-style-type: none;
  display: flex;
  justify-content: flex-end;
  padding: 10px;
}

nav ul li {
  margin-right: 10px;
}

nav ul li a {
  color: #fff;
  text-decoration: none;
}

.content {
  text-align: center;
}

.content h1 {
  font-size: 40px;
  margin-bottom: 20px;
}

.content p {
  font-size: 18px;
}

@media screen and (max-width: 768px) {
  .content h1 {
    font-size: 32px;
  }
}
</style>
    
<body>
<header>
    <nav>
      <div class="logo">Logo</div>
      <!--label for="menu-toggle" class="menu-icon">&#9776;</label>-->
      <ul class="menu">
        <li><a href="registration.php">Registration</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="labour.php">Labours Page</a></li>
      </ul>
    </nav>
  </header>
  
  <div class="content">
    <h1>Welcome to Labor Wages Project!</h1>
    <p>At Labor Wages Project, we strive to simplify and streamline the process of managing labor wages for businesses of all sizes. Our comprehensive platform offers a user-friendly interface and powerful features to help you effortlessly calculate, track, and manage wages for your workforce.
Efficiently manage labor costs:
With our advanced tools, you can accurately calculate labor costs based on hours worked, rates, and overtime. Say goodbye to manual calculations and let our automated system handle the complexity for you.
Customizable wage structures:
Tailor the wage structure to meet your specific requirements. Define different rates for regular hours, overtime, weekends, and holidays. Our flexible system adapts to your business needs, ensuring accurate and compliant wage calculations.</p>
  </div>
  <script src="script.js"></script>
</body>
</html>

<?php
if (isset($message)) {
   foreach ($message as $message) {
      echo '
      <div class="message">
         <span>' . $message . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<!-- The navbar that displays username -->
 <header class= "header">
    <div class="flex">
        <a href="admin_page.php" class="logo">  Admin <span>Panel</span></a>

        <!-- links to the various pages on the admin header -->
         <nav class="navbar">
            <a href="admin_page.php">Home</a>
            <a href="admin_products.php">Products</a>
            <a href="admin_orders.php">Orders</a>
            <a href="admin_users.php">Users</a>
            <a href="admin_contacts.php">Contacts</a>
         </nav>
          
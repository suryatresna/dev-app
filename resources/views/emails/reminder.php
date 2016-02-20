<h1>Hi, <?php echo $admin->name ?></h1>
<p class="lead">You have a new Member. Here Detail:</p>
<table>
  <tr>
    <td>Name</td>
    <td><?php echo $user->name ?></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><?php echo $user->email ?></td>
  </tr>
  <tr>
    <td>Phone</td>
    <td><?php echo $user->phone ?></td>
  </tr>
  <tr>
    <td>Occupation</td>
    <td><?php echo $user->occupation ?></td>
  </tr>
</table>
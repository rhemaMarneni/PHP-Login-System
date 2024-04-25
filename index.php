<?php
    include_once 'header.php';
?>

<?php
if(isset($_SESSION["userid"])){
    echo "<p>Hello There, " . $_SESSION["username"] . "!</p>
    ";
}
?>
<!-- main content -->
<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cum, minima aliquam soluta nihil explicabo dolore rem. Iste nemo repellendus pariatur architecto exercitationem animi cupiditate fuga recusandae nostrum earum! Nam, quos?</p>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam hic nesciunt earum sed nobis similique rerum dolores deleniti culpa ex provident expedita debitis nemo ullam atque quia assumenda, repellendus id?</p>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos at recusandae harum pariatur aspernatur tenetur placeat distinctio et ratione minima. Alias consequuntur et perferendis architecto velit nesciunt ullam dicta quibusdam.</p>

<?php
    include_once 'footer.php';
?>
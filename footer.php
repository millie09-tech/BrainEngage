<div class="mt-5 p-4 bg-dark text-white">
<style>
    .body {
        font-family: Courier New;
    }
</style>
    <p>Welcome <?php  if(isset($_SESSION["username"]))
        { echo '<p style='.'"'."font-family:'Courier New';".'"'.'>'.$_SESSION["username"] .'</p>';  }
        ?></p><br>
    <em><p style="font-family:'Courier New';">Powered By BrainEngage</p></em>
</div>

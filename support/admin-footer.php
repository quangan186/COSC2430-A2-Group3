<footer>
        <div class="copyright-privacy">
            <nav>
                <h3>All Right Reserved. © 2022 InstaKilogram.</h3>

                <ul>
                    <li><a href="../admin/admin-about.php">About</a></li>
                    <li><a href="../admin/admin-copyright.php">Copyright</a></li>
                    <li><a href="../admin/admin-privacy.php">Privacy</a></li>
                    <li><a href="../admin/admin-help.php">Help</a></li>
                    <?php
                        if(isset($_SESSION['adminid'])){
                            echo '<li><a href="../admin/admin-login.php"><i class="fa-solid fa-right-from-bracket"></i></a></li>';
                        } else {
                            echo '<li><a href="../admin/admin-logout.php"><i class="fa-solid fa-right-from-bracket"></i></a></li>';
                        }
                    ?>
                    
                </ul>

                <h3>Developed by group 3</h3>
            </nav>
        </div>
</footer>
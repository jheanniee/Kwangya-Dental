<header class="header">

    <nav class="navbar">


        <a href="index.php">Home</a>
        <?php if (!isset($_SESSION['username'])) { ?>
            <a href="registration.php">Sign up</a>
            <a href="login.php">Login</a>
        <?php } ?>
        <?php if (isset($_SESSION['username'])) {
            if ($_SESSION['role'] == 'admin') {
                echo "<a href='addclinic.php'>Add Clinic</a>";
                echo "<a href='adddentist.php'>Add Dentist</a>";
            } else {
                if ($_SESSION['role'] == 'patient') {
                    echo "<a href='clinics.php'>Clinics </a>";
                }
        ?>

                <a href="appointments.php">Appointments</a>
                <a href="pastappointments.php">Past Appointments</a>
            <?php if ($_SESSION['role'] == 'patient') {
                    echo "<a href='updateaccount.php'>Update Account</a>";
                }
            } ?>

            <a href="index.php?logout='1'">Logout</a>
        <?php } ?>
            

    </nav>
    <a href="#" class="logo"> <i class="fas fa-tooth"></i> Kwangya Dental</a>
</header>
<br><br>
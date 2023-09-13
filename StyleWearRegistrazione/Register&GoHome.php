<style>
    body{
        /* position: relative; */
        display: flex;
        align-items: center;
        justify-content: center;
        align-content: center;
    }
    div {
        height: 40%;
        position: relative;
        padding: 30px;
    }
    .a1 {
        margin-top: 30px;
        position: absolute;
        top: 60%;
        left: 30%;
        transform: translate(-50%,-50%);
        justify-self: center;
    }
    .a2 {
        margin-top: 30px;
        position: absolute;
        top: 60%;
        left: 70%;
        transform: translate(-50%,-50%);
        justify-self: center;
    }
    .buttonH {
        padding: 20px;
        background-color: #0d6efd;
        color: white;
        font-size: medium;
        font-weight: bold;
        border-radius: 1rem;
        cursor: pointer;
    }
    .buttonL {
        padding: 20px;
        background-color: #0d6efd;
        color: white;
        font-size: medium;
        font-weight: bold;
        border-radius: 1rem;
        cursor: pointer;
    }
    button:hover {
        background-color: blue;
    }

/* NOTIFICA DI REGISTRAZIONE AVVENUTA CON SUCCESSO */
</style>
<?php session_start();?>
<div style='border:5px double blue'>
   <?php echo "<span name='first'> <h2>Congratulazioni! <br>Registrazione effettuata con successo!<br> </span> <br>";
         echo "<a class = 'a1' href = '../home2.php'><button class = 'buttonH'> Torna alla home </button></a>";
         echo "<a class = 'a2' href = '../StyleWearLogin/login.html'><button class = 'buttonL'> Loggati! </button></a>";
   ?>

</div>
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
    a {
        margin-top: 30px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        justify-self: center;
    }
    button {
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
    
</style>

<div style='border:5px double blue'>
   <?php echo "<span name='first'> <h2>Login di ".  $_SESSION['username'] ." effettuato con successo!<br> Benvenuto su StyleWear!  </span> <br>";   
         echo "<a href = '../home2.php?id=".  $_SESSION['username'] ."'><button> Torna alla home </button></a>";
   ?>
        
</div>
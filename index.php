<?php

    include('config/db_connect.php');

    //connect to database
    $conn = mysqli_connect('localhost', 'quentin', 'test1234', 'pizzas');

    //check connection
    if(!$conn){
        echo 'Connection error: ' . mysqli_connect_error();
    }

    //write query for all pizzas
    $sql = 'SELECT title, ingredients, id FROM les_pizzas ORDER BY created_at';

    //make query and get results
    $result = mysqli_query($conn, $sql);

    //fetch the resulting rows as an array
    $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //free result from memory
    mysqli_free_result($result);

    //close connection
    mysqli_close($conn);

    //explode(',', $pizzas[0]['ingredients']);

?>

<!DOCTYPE html>
<html>

<?php include('templates/header.php'); ?>

<h4 class="center grey-text">Pizzas!</h4>

<div class="container">
    <div class="row">
        <?php foreach($pizzas as $pizza): ?>
            
            <div class="col s6 md3" style="border : solid black">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
                        <ul>
                            <?php foreach(explode(',', $pizza['ingredients']) as $ing): ?>
                                <li><?php echo htmlspecialchars($ing); ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <div class="card-action right-align">
                        <a class="brand-text" href="details.php?id=<?php echo $pizza['id']?>">more info</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

            <?php if(count($pizzas) >= 2): ?>
                <p>there are 2 or more pizzas</p>
            <?php else: ?>
                <p>there are less than 2 pizzas</p>
            <?php endif; ?>
    </div>
</div>

<?php include('templates/footer.php'); ?>

</html>
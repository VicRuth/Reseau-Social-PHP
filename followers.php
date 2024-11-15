<?php

include 'var_globale.php';
redirect_login();

echo $head;
?>

    <div id="wrapper">
            <aside>
                <img src = "user.png" alt = "Portrait de l'utilisatrice"/>
                <section>
                    <h3>Présentation</h3>
                    <p>Sur cette page vous trouverez la liste des personnes qui
                        suivent les messages de l'utilisatrice :
                        <?php echo $userId; ?>
                </section>
            </aside>
            <main class='contacts'>

                <?php
                $laQuestionEnSql = "SELECT users.*
                    FROM followers
                    JOIN users ON users.id=followers.following_user_id
                    WHERE followers.followed_user_id='$userId'
                    GROUP BY users.id
                    ";
                $lesInformations = $mysqli->query($laQuestionEnSql);

                while ($followers = $lesInformations->fetch_assoc()) {
                    ?>
                <article>
                    <img src="user.png" alt="blason"/>
                    <h3><a href="wall.php?user_id=<?php echo $followers['id']?>"><?php echo $followers['alias']?></a></h3>
                </article> <?php
            }
            ?>
            </main>
        </div>
    </body>
</html>
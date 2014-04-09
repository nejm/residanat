<table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th>Titre</th>
        <th>Publier</th>
        <th>Modifier</th>
    </tr>

    </thead>
    <?php
        foreach ($articles as $article)
            echo "<tr><td>".$article->id.
                 "</td><td>".$article->titre.
                 "</td><td>".$article->etat.
                 "</td><td><input type='submit' value='modifier' class='btn btn-default'></td></tr>";
    ?>
</table>

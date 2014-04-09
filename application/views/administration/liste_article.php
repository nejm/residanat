<form action=<?=base_url("admin/modifier/")?> method="post">
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
            {
                echo "<tr><td>".$article->id.
                     "</td><td>".$article->titre.
                     "</td><td>";
                    if($article->etat == 1) echo "Oui"; else echo "Non";
                    echo "</td><td><input type='submit' value='modifier' class='btn btn-default'></td></tr>";
            }
        ?>
        <input type="hidden" name="a" value=<?=$article->id;?>>

    </table>
</form>
</div>
</div>
</div>
<script src=<?=js_url("jquery")?>></script>
<script src=<?=js_url("bootstrap.min")?>></script>
</body>
</body>
</html>
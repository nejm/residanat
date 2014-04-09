
<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th>Num Convocation</th>
        <th>CIN</th>
        <th>Nom & Prénom</th>
        <th>Nationalité</th>
        <th>Résultat</th>
        <th>Rang</th>
    </tr>
    </thead>
    <?php
        foreach ($etudiants as $etudiant)
        {
            echo "<tr><td>{$etudiant->id}</td>
                      <td>{$etudiant->num}</td>
                      <td>{$etudiant->cin}</td>
                      <td>{$etudiant->nom}</td>
                      <td>{$etudiant->nationalite}</td>
                      <td>{$etudiant->moyenne}</td>
                      <td>{$etudiant->rang}</td>
                      </tr>";
        }
    ?>
</table>
<?php
    echo $links;?>




</div>
</div>
</div>

<script src=<?=js_url("jquery")?>></script>
<script src=<?=js_url("bootstrap.min")?>></script>
<script src=<?=js_url("bootstrap-switch")?>></script>

</body>
</body>
</html>
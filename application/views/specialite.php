
<div style="height: 60px"></div>
<div class="row-fluid show-grid">
    <div class="col-md-4 col-md-offset-2">
        <div class="well sidebar-nav">
            <ul class="nav nav-list">

            <?php
            foreach ($spec as $v)
            {
                echo "<li><a>".$v->libelle."</a></li>";
            }
        ?>
        </ul>
     </div>
</div>
    <div class="col-md-4">
        <div class="well sidebar-nav">
        </div>
    </div>
</div>

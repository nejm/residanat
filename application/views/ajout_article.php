<!doctype html>
<html>
<head>
    <link rel="stylesheet" href=<?=css_url("bootstrap.min");?>>
    <link rel="stylesheet" href=<?=css_url("signin.min");?>>
</head>
<body>
<div class="container">

    <form role="form">

        <div class="form-group">
            <label for="exampleInputEmail1">Titre</label>
            <input type="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Alias</label>
            <input type="text" class="form-control">
        </div>

        <div class="checkbox">
            <label>
                <input type="checkbox"> Publier
            </label>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Contenu</label>
            <textarea class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>
<script type="text/javascript" src=<?=js_url("jquery.min");?>></script>
<script type="text/javascript" src=<?=js_url("bootstrap.min");?>></script>
</body>
</html>
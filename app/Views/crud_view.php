<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title >Liste Agriculteurs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
 
    <h1 class="h1">
        Gestion Agriculteur
    </h1>
    <form method="post" id="ajout_agri" name="ajout_agri" 
    action="<?= site_url('/agri_list') ?>">
        <div class="row ">
            <div class="form-check">
                <input class="form-check-input1" type="radio" name="cvl" checked value ="Mr">
                <label> Mr.</label>
                <input class="form-check-input2" type="radio" name="cvl" value ="Mme" >
                <label> Mme.</label>
            </div>
        </div>

        <div class="row">
            <div class="col-3">
                <input type="text" class="form-control" placeholder="Nom" name="nom">
            </div>
            <div class="col-3">
                <input type="text" class="form-control" placeholder="Prenom" name="prenom">
            </div>
            <div class="col-3">
                <select class="form-select" aria-label="size 3 select example"
                        multiple name="age">
                    <option selected disabled >Tranche d'age</option>
                    <option value="30-40">30-40</option>
                    <option value="40-50">40_50</option>
                </select>
            </div>

            <div class="row">
                <button type="submit" class="btn btn-success"> Ajouter
                    <i class="fa-solid fa-circle-plus"></i>
                </button>
            </div>
        </div>
    </form>
    <div>

        <table class="table" id="list_agri">
            <thead>
            <tr>
                <th scope="col">Cvl</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Tranche d'age</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php if($agriculteur): ?>
            <?php foreach($agriculteur as $item): ?>          
            <tr>
                <td><?php echo $item['cvl']; ?></td>
                <td><?php echo $item['nom']; ?></td>
                <td><?php echo $item['prenom']; ?></td>
                <td><?php echo $item['age']; ?></td>
                <td>
                    <a type="button" href="<?php echo base_url('delete/'.$item['id']);?>">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                   </a>
                   <a type="button"  href="#">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
            </a>
                </td>
            </tr>
            <?php endforeach; ?>
         <?php endif; ?>

            </tbody>
        </table>
    </div>
</div>
<style>
    .h1 {
        position: center;
        font-style: normal;
        font-weight: 700;
        font-size: 32px;
        line-height: 39px;
        top: 153px;
        color: #2D7574;
        text-align: center;
    }
    .container{
        width: 1224px;
        height: 773px;
        left: 139px;
        top: 153px;
        background: #FFFFFF;
        backdrop-filter: blur(2px);
        border-radius: 20px;
    }
    .form-check-input1 {
        mar background: #00AE81;
    }
    .form-check-input2 {
        background: #FFFFFF;
        border: 2px solid #00AE81;
    }
    .form-control {
        box-sizing: border-box;
        background: #FFFFFF;
        border: 1px solid #B6B1B1;
        border-radius: 10px;
    }
    .btn-success {
        width: 120px;
        height: 41px;
        left: 104px;
        top: 238px;
        background: #00AE81;
        border-radius: 10px;
        border: none;
    }
    .fa-circle-plus {
        color: #FFFFFF;
    }
    .fa-trash {
        color: red;
    }
    .fa-pencil {
        color: blue;
    }

</style>
<script src="https://kit.fontawesome.com/f0fa1ec538.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
<script>
    if ($("#ajout_agri").length > 0) {
        $("#ajout_agri").validate({
            rules: {
                cvl: {
                    required: true
                },
                nom: {
                    required: true,
                    maxlength: 60,
                },
                prenom: {
                    required: true,
                    maxlength: 60,
                },
                age: {
                    required: true,
                },
            },
            messages: {
                cvl: {
                    required: "Etat civil non selectionné",
                },
                nom: {
                    required: "entrer votre nom",
                },
                prenom: {
                    required: "entrer votre prénom",
                },
                age: {
                    required: "selectionner votre age",
                },
            },
        })
    }
</script>
<script>
    $(document).ready( function () {
      $('#list_agri').DataTable();
  } );
</script>
</body>
</html>

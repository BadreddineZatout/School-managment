<?php
    if(!isset($_GET['action'])){
        header('location:/');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once 'includes/link.php' ?>
    <link rel="stylesheet" href="style/admin.css">
    <title>Gestion de restauartion</title>
</head>
<body>
    <?php 
        require_once 'includes/header.php';
        require_once 'includes/menu.php';
    ?>
    <div class="d-flex head p-2 mx-5 mb-3">
        <span class="mr-auto">
            <h1>Presentation de l'ecole</h1>
        </span>
        <span class="my-auto">
            <button class="btn b" data-toggle="modal" data-target="#AddModal">Ajouter une Information</button>
            <button class="btn b"><a class="retour" href="/?action=admin">Retour</a></button>
        </span>
    </div>
    <div class="mx-5">
        <table class="table table-bordered">
            <thead>
                <th>Cycle</th>
                <th>Jour</th>
                <th>Repas</th>
                <th></th>
                <th></th>
            </thead>
            <tbody id="restau-body"></tbody>
        </table>
    </div>
    <div class="modal" id="AddModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Ajouter Une Information</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
        <form action="/?action=storeRestau" method="POST">
          <div class="modal-body">
                <div class="form-group">
                  <label for="cycle">Cycle:</label>
                  <select class="form-control" id="cycle">
                    <option value="1">Primaire</option>
                    <option value="2">Mpyenne</option>
                    <option value="2">Secondaire</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="jour">Cycle:</label>
                  <select class="form-control" id="jour">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="fax">Fax:</label>
                  <input type="text" class="form-control" id="fax" name="fax" required>
                </div>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn submit">Submit</button>
                <button type="button" class="btn cancel" data-dismiss="modal">Close</button>
            </div>
        </form>

        </div>
      </div>
    </div>
    <div class="modal" id="UpdateModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Modifier Une Information</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
        <form action="/?action=updateRestau" method="post">
          <div class="modal-body">
                <div class="form-group">
                  <label for="paragraphe">Paragraphe:</label>
                  <textarea class="form-control" name="paraMAJ" id="paraMAJ" required></textarea>
                  <input type="hidden" name="id" id="id">
                </div>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn submit" id="modif">Submit</button>
                <button type="button" class="btn cancel" data-dismiss="modal">Close</button>
            </div>
        </form>
        </div>
      </div>
    </div>

    <div class="modal" id="DeleteModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Supprimer Une INformation</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
              <h5>Voulez vouz vraiment supprimer cette information?</h5>
              <div class="mt-5 d-flex flex-row-reverse">
                  <button type="button" class="btn cancel" data-dismiss="modal">Close</button>
                  <button type="submit" id="supp" data-dismiss="modal" class="btn mr-3 submit">Submit</button>
              </div>
            </div>
            
        </div>
      </div>
    </div>
    <?php
        require_once 'includes/footer.php'
    ?>
</body>
<?php
        require_once 'includes/admin-script.php';
    ?>
<script src="js/admin/restau.js"></script>
</html>
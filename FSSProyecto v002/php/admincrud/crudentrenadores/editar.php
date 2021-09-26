<?php
include_once("../../conexion.php");
if(isset ($_POST['update']) ) 
{
    $Doc_identidad = $_POST['Doc_identidad'];
    $Tipo_doc = $_POST['Tipo_doc'];
    $Nombres = $_POST['Nombres'];
    $Apellidos = $_POST['Apellidos'];
    $Tel_contacto = $_POST['Tel_contacto'];
    $Cel_contacto = $_POST['Cel_contacto'];
    $Email = $_POST['Email'];
    

    $sql = "UPDATE entrenador SET Doc_identidad=:Doc_identidad, Tipo_doc=:Tipo_doc, Nombres=:Nombres, Apellidos=:Apellidos, 
            Tel_contacto=:Tel_contacto, Cel_contacto=:Cel_contacto, Email=:Email WHERE Doc_identidad=:Doc_identidad";

    $query = $dbConn->prepare($sql);
    $query->bindparam (':Doc_identidad', $Doc_identidad);
    $query->bindparam (':Tipo_doc', $Tipo_doc);
    $query->bindparam (':Nombres', $Nombres);
    $query->bindparam (':Apellidos', $Apellidos);
    $query->bindparam (':Tel_contacto', $Tel_contacto);
    $query->bindparam (':Cel_contacto', $Cel_contacto);
    $query->bindparam (':Email', $Email);
    $query->execute();
    
    echo'<script type="text/javascript"> alert("Entrenador editado correctamente"); window.location.href="adminentrenadores.php";
    </script>';
    }
?>
<?php
$Doc_identidad = $_GET['Doc_identidad'];
$sql = "SELECT *  FROM entrenador WHERE Doc_identidad=:Doc_identidad";
$query = $dbConn->prepare($sql);
$query->execute (array (':Doc_identidad' => $Doc_identidad));
while($row = $query->fetch(PDO::FETCH_ASSOC) )
{
    $Doc_identidad = $row ['Doc_identidad'];
    $Tipo_doc = $row ['Tipo_doc'];
    $Nombres = $row ['Nombres'];
    $Apellidos = $row ['Apellidos'];
    $Tel_contacto = $row ['Tel_contacto'];
    $Cel_contacto = $row ['Cel_contacto'];
    $Email = $row ['Email'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar</title>
    <link rel="stylesheet" href="../../../css/estilos.css">
    <style>
        /*the container must be positioned relative:*/
        .custom-select {
          position: relative;
          font-family: Arial;
        }
        
        .custom-select select {
          display: none; /*hide original SELECT element:*/
        }
        
        .select-selected {
          background-color: #423e3eee;
        }
        
        /*style the arrow inside the select element:*/
        .select-selected:after {
          position: absolute;
          content: "";
          top: 14px;
          right: 10px;
          width: 0;
          height: 0;
          border: 6px solid transparent;
          border-color: #fff transparent transparent transparent;
        }
        
        /*point the arrow upwards when the select box is open (active):*/
        .select-selected.select-arrow-active:after {
          border-color: transparent transparent #fff transparent;
          top: 7px;
        }
        
        /*style the items (options), including the selected item:*/
        .select-items div,.select-selected {
          color: #ffffff;
          padding: 8px 16px;
          border: 1px solid transparent;
          border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
          cursor: pointer;
          user-select: none;
        }
        
        /*style items (options):*/
        .select-items {
          position: absolute;
          background-color: #423e3eee;
          top: 100%;
          left: 0;
          right: 0;
          z-index: 99;
        }
        
        /*hide the items when the select box is closed:*/
        .select-hide {
          display: none;
        }
        
        .select-items div:hover, .same-as-selected {
          background-color: rgba(0, 0, 0, 0.788);
        }
        </style>
</head>
<body>
    
    <div class="content">
        <div class="contact-wrapper">
            <div class="contact-form">
                <form name="forml" method= "post" action="editar.php">
                    <p>
                        <label>Tipo documento</label></p>
                        <p>
                        <div class="custom-select" style="width: 200px;">
                        <select name="Tipo_doc" value="<?php echo $Tipo_doc;?>" required>
                        <option value="0">Seleccione...</option>
                            <option value="CC">CC</option>
                            <option value="TI">TI</option>
                            <option value="CE">CE</option>
                        </select>
                    </div>
                    </p>
                    <p>
                        <label>Doc. Identidad</label>
                        <input type="text" name="Doc_identidad" value="<?php echo $Doc_identidad;?>" disabled>
                    </p>
                    <p>
                        <label>Nombres</label>
                        <input type="text" name="Nombres" value="<?php echo $Nombres;?>" required autocomplete="off">
                    </p>
                    <p>
                        <label>Apellidos</label>
                        <input type="text" name="Apellidos" value="<?php echo $Apellidos;?>" required autocomplete="off">
                    </p>
                    <p>
                        <label>Tel. de Contacto</label>
                        <input type="text" name="Tel_contacto" value="<?php echo $Tel_contacto;?>">
                    </p>
                    <p>
                        <label>Cel. de Contacto</label>
                        <input type="text" name="Cel_contacto" value="<?php echo $Cel_contacto;?>" required autocomplete="off">
                    </p>
                    <p>
                        <label>Email</label>
                        <input type="text" name="Email" value="<?php echo $Email;?>" required autocomplete="off">
                    </p>
                    <p class="block">
                        <button>
                            <input type="hidden" name="Doc_identidad" value=<?php echo $_GET['Doc_identidad'];?>>
                            <input type="submit" name="update" value="Editar">
                        </button>
                    </p>
                    
                </form>
            </div>
        </div>
    </div>

    <script>
        var x, i, j, l, ll, selElmnt, a, b, c;
        /*look for any elements with the class "custom-select":*/
        x = document.getElementsByClassName("custom-select");
        l = x.length;
        for (i = 0; i < l; i++) {
          selElmnt = x[i].getElementsByTagName("select")[0];
          ll = selElmnt.length;
          /*for each element, create a new DIV that will act as the selected item:*/
          a = document.createElement("DIV");
          a.setAttribute("class", "select-selected");
          a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
          x[i].appendChild(a);
          /*for each element, create a new DIV that will contain the option list:*/
          b = document.createElement("DIV");
          b.setAttribute("class", "select-items select-hide");
          for (j = 1; j < ll; j++) {
            /*for each option in the original select element,
            create a new DIV that will act as an option item:*/
            c = document.createElement("DIV");
            c.innerHTML = selElmnt.options[j].innerHTML;
            c.addEventListener("click", function(e) {
                /*when an item is clicked, update the original select box,
                and the selected item:*/
                var y, i, k, s, h, sl, yl;
                s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                sl = s.length;
                h = this.parentNode.previousSibling;
                for (i = 0; i < sl; i++) {
                  if (s.options[i].innerHTML == this.innerHTML) {
                    s.selectedIndex = i;
                    h.innerHTML = this.innerHTML;
                    y = this.parentNode.getElementsByClassName("same-as-selected");
                    yl = y.length;
                    for (k = 0; k < yl; k++) {
                      y[k].removeAttribute("class");
                    }
                    this.setAttribute("class", "same-as-selected");
                    break;
                  }
                }
                h.click();
            });
            b.appendChild(c);
          }
          x[i].appendChild(b);
          a.addEventListener("click", function(e) {
              /*when the select box is clicked, close any other select boxes,
              and open/close the current select box:*/
              e.stopPropagation();
              closeAllSelect(this);
              this.nextSibling.classList.toggle("select-hide");
              this.classList.toggle("select-arrow-active");
            });
        }
        function closeAllSelect(elmnt) {
          /*a function that will close all select boxes in the document,
          except the current select box:*/
          var x, y, i, xl, yl, arrNo = [];
          x = document.getElementsByClassName("select-items");
          y = document.getElementsByClassName("select-selected");
          xl = x.length;
          yl = y.length;
          for (i = 0; i < yl; i++) {
            if (elmnt == y[i]) {
              arrNo.push(i)
            } else {
              y[i].classList.remove("select-arrow-active");
            }
          }
          for (i = 0; i < xl; i++) {
            if (arrNo.indexOf(i)) {
              x[i].classList.add("select-hide");
            }
          }
        }
        /*if the user clicks anywhere outside the select box,
        then close all select boxes:*/
        document.addEventListener("click", closeAllSelect);
        </script>

</body>
</html>

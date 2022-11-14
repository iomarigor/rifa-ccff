<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="<?php //echo constant('URL'); 
                                        ?>public/bootstrap/css/bootstrap.min.css"> -->
    <script src="https://kit.fontawesome.com/e7659e32bc.js" crossorigin="anonymous"></script>
    <title>FIIS-UNAS</title>
    <link rel="icon" href="https://fiis.unas.edu.pe/sites/all/themes/business_responsive_theme/favicon.ico" />
    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/default.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/default.css">


</head>

<body style="background: #EFEFEF">

    <div class="container position-relative">
        <img class=" position-absolute" style="right:10px; top:2rem;" src="<?php echo constant('URL'); ?>public/images/logo.png" alt="logo">

        <div class="row justify-content-center align-items-center" style="height:100vh;">

            <div class="col-10 justify-content-center align-items-center">
                <h1 class="fw-bold text-center font-monospace" style="color: #2196f3">BIENVENIDO AL PORTAL TICKET DEL CCFF-FIIS</h1>
                <h5 class="fw-bold mt-4 text-center font-monospace text-secondary">INGRESE EL ID DEL TICKET</h5>
                <!-- <div class="row  mt-4"> -->
                <div class="row  mt-4 justify-content-center align-items-center" action="<?php echo constant('URL'); ?>search/buscador">
                    <div class="col-7 col-sm-6 col-md-5 col-lg-4 col-xl-4 d-flex justify-content-center">
                        <input type="text" id="dni-search" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" name="dni" maxlength="14" placeholder="RCCFF-2022-0">
                    </div>
                    <div class="col-12 mt-2 mt-sm-2 mt-md-0 mt-lg-0 mt-sl-0 col-sm-12 col-md-6 col-lg-6 col-xl-3 d-flex justify-content-center">
                        <button type="button" id="btn-search" onclick="validateDNI()" class="btn btn-info "> <i class="fa-solid fa-magnifying-glass ml-1"></i>BUSCAR TICKET</button>
                    </div>
                    </form>
                    <!-- </div> -->
                </div>

            </div>
            <div class="toast-container" id="toast-container" style="position:absolute; z-index: -1; width: 100%; height: 100vh; display: flex; justify-content: center; align-items: center; top:0px; left: 0px;">
                <div id="liveToast" class="toast border border-danger fade hide" data-delay="2000" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-body bg-light text-center" id="toast-message">
                        Lorem...
                    </div>
                </div>
            </div>

        </div>
        <div class="modal fade" id="dialog-alert" data-backdrop="static" style="position: absolute; z-index: 99999;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h5 class="modal-title " style="color: #ffffff;" id="modalTitle"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body row d-flex justify-content-center">
                        <p class="p-4" id="modalResponse"></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <?php //require 'views/footer.php';
        ?>
        <script>
            const URL_API = '<?php echo constant('URL'); ?>';
        </script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <!-- <script src="<?php //echo constant('URL'); 
                            ?>public/bootstrap/js/bootstrap.min.js" ></script> -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="<?php echo constant('URL'); ?>public/js/main.js"></script>

</body>

</html>
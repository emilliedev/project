<?php
include_once('/xampp/htdocs' . '/project/database/connection.php');
require_once('/xampp/htdocs' . '/project/classes/schools/Module.class.php');

session_start();

$connection = Connection::connection();

try {
    $search = $_GET['searchModule'] ?? '';
    $module = new Module();

    $listModules = $module->listModule($search);
    $countModules = $module->countModules($search);

    $optionOfSearch = array();
    foreach ($listModules as $row) {
        $optionOfSearch[] = array(
            'label' => $row->name,
            'value' => $row->name
        );
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <!-- Base -->
        <title>Módulos | Heelp!</title>
        <link rel="icon" href="../../../../../views/images/favicon/favicon-32x32.png" type="image/icon type">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSS Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <!-- CSS Search Bar -->
        <link rel="stylesheet" href="../../../../style/search-bar.style.css">

        <!-- Script do Sanduíche -->
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

   

    </head>

    <body>

        <!-- Inicio Wrapper -->
        <div class="wrapper">

         

            <!-- Corpo -->
            <div class="corpo">

                <div class="cabecalho">
                    <p class="add-info-text normal-22-black-title-1">Módulos</p>  
                </div>

                <!-- Parte Branca -->
                <div class="conteudo">

                    <!-- Mensagem de sucesso ⬇️ -->
                    <?php if (isset($_SESSION['statusPositive']) && $_SESSION != '') { ?>

                        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                            </symbol>
                        </svg>

                        <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                                <use xlink:href="#check-circle-fill" />
                            </svg>
                            <div>
                                <strong>Tudo certo!</strong>
                                <?php echo $_SESSION['statusPositive']; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    <?php unset($_SESSION['statusPositive']);
                    } ?>

                  

                    <!-- Barra de pesquisa ⬇️ -->
                    <form action="./search-module.page.php" method="GET">
                        <input type="text" name="searchModule" id="searchModule" placeholder="Pesquise por mensagens" autocomplete="off" class="search-bar">
                        <input type="submit" value="🔎" class="search-button">
                    </form>

                    <!-- Mensagem de erro ⬇️ -->
                    <?php if (isset($_SESSION['statusNegative']) && $_SESSION != '') { ?>

                        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </symbol>
                        </svg>

                        <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                                <use xlink:href="#exclamation-triangle-fill" />
                            </svg>
                            <div>
                                <strong>Ops...</strong>
                                <?php echo $_SESSION['statusNegative']; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    <?php unset($_SESSION['statusNegative']);
                    } ?>
                      <!-- Tabs navs -->
                    <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="ex1-tab-1" data-mdb-toggle="tab" href="#ex1-tabs-1" role="tab" aria-controls="ex1-tabs-1" aria-selected="true">Novas</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link " id="ex1-tab-2" data-mdb-toggle="tab" href="#ex1-tabs-2" role="tab" aria-controls="ex1-tabs-2" aria-selected="false">Lidas</a>
                        </li>
                    </ul>
            <!-- Tabs navs -->
            
                <!-- Tabs content -->
                <div class="tab-content" id="ex1-content">
                <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                    <div id="messages-list-new">
                    <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                    <div id="message-list-read">
                    </div>
                </div>
                </div>
                <!-- Tabs content -->
                    <!-- Contador de módulos ⬇️ -->
                    <p class="contador-prof normal-18-black-title-2">
                        <?php echo $countModules ?>
                    </p>

                    <?php if(isset($row) && isset($status)){ ?>
                    <?php $style = $row->status == "Nova" ? 'badge rounded-pill bg-warning text-dark' : 'badge rounded-pill bg-help-primary'; ?>
                
                  <br/> <span class="<?php echo $style; ?>"><?php echo $row->status; ?></span>
                    <?php for ($i = 0; $i < count($listMessages); $i++) {
                         $row = $listMessages[$i] ?>
                        <br/><?php echo 'Contato' ?><br/>
                        <?php echo $row->contact; ?><br/><br/>
                        <?php echo 'Messagem' ?><br/>
                        <?php echo $row->message; ?><br/>
                        <form action="./list-message.page.php" method="POST" enctype="multipart/form-data">
                        <Button>Marcar como lida</Button>
                        </form>
                
                        <?php } ?>
                        
                    </div>

                  <?php } ?>

            <!-- Fim Wrapper -->
        </div>

        <!-- JS Bootstrap ⬇️ -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <!-- JS Modal Excluir ⬇️ -->
        <script src="../../js/delete-module.js"></script>

        <!-- JS Search bar -->
        <script src="../../js/autocomplete.js"></script>

        <!-- JS Search bar ⬇️ -->
        <script>
            const field = document.getElementById('searchModule');
            const ac = new Autocomplete(field, {
                data: <?php echo json_encode($optionOfSearch); ?>,
                maximumItems: 8,
                treshold: 1,
            });
        </script>
    </body>

</html>
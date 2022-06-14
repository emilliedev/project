<?php
include_once('/xampp/htdocs' . '/project/private/validation/validation-student.controller.php');
require_once('/xampp/htdocs' . '/project/classes/questions/Question.class.php');
require_once('/xampp/htdocs' . '/project/classes/answers/Answer.class.php');
require_once('/xampp/htdocs' . '/project/classes/users/StudentMethods.class.php');

try {
    $question = new Question();
    $listQuestions = $question->listQuestion();

    $idUser = $_SESSION['idUser'];

    $student = new StudentMethods();
    $studentId = $student->getStudentByUserID($idUser);
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Base -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../../../views/images/favicon/favicon-16x16.png" type="image/x-icon">
    <title>Feed | Heelp!</title>

    <!-- Estilos -->
    <link rel="stylesheet" href="../../../../views/styles/style.global.css">
    <link rel="stylesheet" href="../../../../views/styles/fonts.style.css">
    <link rel="stylesheet" href="../../../adm/pages/register/register.styles.css">
    <link rel="stylesheet" href="../../../adm/pages/register/registration panel/registration-panel-style.css">
    <link rel="stylesheet" href="../../style/feed.style.css">

    <!-- Include stylesheet -->
    <link href="../../../style/editor-style/editor.style.css" rel="stylesheet">

    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Magnific Popup core CSS file -->
    <link rel="stylesheet" href="../../../../libs/dist/magnific-popup.css">

    <!-- JavaScript -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</head>

<body>
    <!-- Inicio Wrapper -->
    <div class="wrapper">

        <!-- NavBar Lateral - SideBar -->
        <nav class="feed-leftbar">

            <div class="leftbar-top">

                <!-- Logo Heelp! -->
                <a href="#" class="logo-heelp">
                    <img src="../../../../views/images/logo/logo-help.svg" alt="" class="logo-heelp-img">
                    <h4 class="logo-heelp-text normal-22-black-title-1">heelp!</h4>
                </a>
    
                <!-- Conteúdo Navbar -->
                <ul class="feed-ul">
    
                    <!-- Opções da NavBar -->
                    <li class="sidebar-li">
                        <a href="dashboard.page.php" class="sidebar-a-items">
                            <img class="leftbar-icon" src="../../../../views/images/components/filled-dashboard-img.svg" alt="">
                            <p class="normal-18-bold-title-2 leftbar-text-current">Feed</p>
                        </a>
                    </li>
                    
                    <li class="sidebar-li">
                        <a href="#" class="sidebar-a">
                            <img class="leftbar-icon" src="../../../../views/images/components/following-icon.svg" alt="">
                            <p class="leftbar-text normal-18-bold-title-2">Seguindo</p>
                        </a>
                    </li>
                    
                    <li class="sidebar-li">
                        <a href="#" class="sidebar-a">
                            <img class="leftbar-icon" src="../../../../views/images/components/notifications-icon.svg" alt="">
                            <p class="leftbar-text normal-18-bold-title-2">Notificações</p>
                        </a>
                        <hr class="sidebar-linha">
                    </li>
                    
                    <li class="sidebar-li">
                        <p class="leftbar-categoria normal-14-bold-p">Para você</p>
                        <a href="../message/list-message.page.php" class="sidebar-a-items">
                            <img class="leftbar-icon" src="../../../../views/images/components/fale-conosco-img.svg" alt="">
                            <p class="leftbar-text normal-18-bold-title-2">Fale Conosco</p>
                        </a>
                    </li>
    
                    <li class="sidebar-li">
                        <a href="../message/list-message.page.php" class="sidebar-a-items">
                            <img class="leftbar-icon" src="../../../../views/images/components/fale-conosco-img.svg" alt="">
                            <p class="leftbar-text normal-18-bold-title-2">Fale Conosco</p>
                        </a>
                    </li>
    
                    <li class="sidebar-li">
                        <a href="../message/list-message.page.php" class="sidebar-a-items">
                            <img class="leftbar-icon" src="../../../../views/images/components/fale-conosco-img.svg" alt="">
                            <p class="leftbar-text normal-18-bold-title-2">Fale Conosco</p>
                        </a>
                    </li>
                    
                    <li class="sidebar-li">
                        <a href="../question/question.page.php" class="pedir-heelp-button-a normal-14-bold-p">
                            <div class="leftbar-button-div">
                                <p class="sidebar-button-text">Pedir um heelp!</p>
                            </div>
                        </a>
                    </li>
    
                </ul>

            </div>

            <div class="leftbar-bottom">
                <img src="../../../../views/images/components/profile-icon.svg" alt="">
                <p>Cameron Murphy</p>
            </div>

        </nav>
        <div class="corpo-feed">

            
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

            <div class="feed-div">

            <div class="center">

                <div class="pedir-heelp-div">
                    <img src="../../../../views/images/components/pedir-heelp-flipper.svg" class="pedir-heelp-img">
                    <div class="content-pedir-heelp">
                        <p class="pedir-heelp-text normal-22-black-title-1">
                            Precisando de ajuda?
                        </p>
                        <a href="../question/question.page.php" class="pedir-heelp-button-a">
                            <div class="pedir-heelp-button-div">
                                <p class="pedir-heelp-button-p normal-14-bold-p">
                                    Pedir um heelp!
                                </p> 
                            </div>
                        </a>
                    </div>
                </div>

            </div>

            <br>
            <br>
            <br>

            <!-- Lista de perguntas ⬇️ -->
            <?php for ($i = 0; $i < count($listQuestions); $i++) {
                $row = $listQuestions[$i] ?>

                <p>
                    <span class="badge rounded-pill bg-primary"> <?php echo $row->course; ?></span>

                    <?php
                    if ($row->category === "Erro") {
                        $styleError = 'badge rounded-pill bg-danger';
                        $styleQuestion = 'd-none';
                        $styleHelp = 'd-none';
                    }

                    if ($row->category === "Dúvida") {
                        $styleError = 'd-none';
                        $styleQuestion = 'badge rounded-pill bg-info';
                        $styleHelp = 'd-none';
                    }

                    if ($row->category === "Apoio") {
                        $styleError = 'd-none';
                        $styleQuestion = 'd-none';
                        $styleHelp = 'badge rounded-pill bg-success';
                    }
                    ?>
                    <span class="<?php echo $styleError; ?>"> <?php echo $row->category; ?></span>
                    <span class="<?php echo $styleQuestion; ?>"> <?php echo $row->category; ?></span>
                    <span class="<?php echo $styleHelp; ?>"> <?php echo $row->category; ?></span>
                    <span class="badge rounded-pill bg-primary"> <?php echo $row->subject; ?></span>
                </p>

                <p>
                    <a href="<?php echo $row->linkQuestion; ?>" class="d-none" id="linkQuestion-<?php echo $row->id; ?>">Link</a>
                    <span onclick="copyLink(<?php echo $row->id; ?>)" id="spanLink-<?php echo $row->id; ?>">Copiar link</span>
                </p>

                <?php
                $creatorQuestion = $question->getCreatorQuestionById($row->id);
                $creatorQuestionID = $creatorQuestion[0]['student_id'];
                $studentID = $studentId[0]['id'];
                $hasAnswers = $question->hasAnswers($row->id);

                $styleDeleteDisplay = $hasAnswers ? 'd-none' : '';
                $styleDeleteQuestion = $creatorQuestionID == $studentID ? '' : 'd-none';
                ?>
                <p class="<?php echo $styleDeleteQuestion; ?> <?php echo $styleDeleteDisplay;?>">
                    <a href="../question/controller/delete-question.controller.php?id=<?php echo $row->id; ?>" data-bs-toggle="modal" data-bs-target="#confirm-delete" class="delete">
                        Excluir
                    </a>
                </p>

                <div class="question-info">
                    <img src="<?php echo $row->photo; ?>" alt="<?php echo $row->firstName; ?>" style="width: 50px; border-radius: 50px; margin-right: 8px;">
                    <div class="question-info-text">
                        <p class="question-name normal-14-medium-p">
                            <?php echo $row->firstName; ?>
                            <?php echo $row->surname; ?>
                        </p>
                        <p class="question-about normal-12-medium-tiny">
                            <?php echo $row->created; ?> •
                            <?php echo $row->module; ?> •
                            <?php echo $row->school; ?>
                        </p>
                    </div>
                </div>

                <!-- Create the editor container -->
                <div class="ql-snow ql-editor2">
                    <div class="ql-editor2 question-text-div">
                        <p class="question-text-p whitney-16-medium-text">
                            <?php echo $row->question; ?>
                        </p> 
                    </div>
                </div>

                <?php $styleImageQuestion = !empty($row->image) ? '' : 'd-none'; ?>
                <p class="<?php echo $styleImageQuestion; ?>">
                    <a href="<?php echo $row->image; ?>" class="image-link question-img">
                        <img src="<?php echo $row->image; ?>" alt="<?php echo $row->firstName; ?>" style="width: 150px;">
                    </a>
                </p>

                <?php $styleDocumentQuestion = !empty($row->document) ? '' : 'd-none'; ?>
                <p class="<?php echo $styleDocumentQuestion; ?>">
                    <?php echo $row->documentName; ?>
                    <a href="<?php echo $row->document; ?>" download="<?php echo $row->documentName; ?>">
                        <button>download</button>
                    </a>
                </p>

                <div class="question-footer">

                    <div class="question-answers question-footer-div">

                        <p class="question-p normal-14-bold-p">
                            <?php
                            $answer = new Answer();
                            $totalAnswersOfQuestion = $answer->countAnswers($row->id);
                
                            echo $totalAnswersOfQuestion;
                            ?>
                        </p>

                    </div>

                    <a class="question-give-heelp-a pedir-heelp-button-a" href="../detail-question/detail-question.page.php?idQuestion=<?php echo $row->id; ?>">
                        <div class="question-toAnswer question-footer-div">

                                <p class="question-p normal-14-bold-p">Dar um help</p>
                                <img src="../../../../views/images/components/upper-line.svg" class="upper-line">
                                <img src="../../../../views/images/components/star-icon.svg">
                                <p class="question-p yellow-text normal-14-bold-p"> <?php echo $row->xp; ?> xp </p>
                                
                                
                            </div>
                        </a>

                </div>

                <hr>
            <?php } ?>

            </div>

        </div>

    <!-- JS JQuery ⬇️ -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- JS Bootstrap ⬇️ -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <!-- JS Modal Excluir ⬇️ -->
    <script src="../../js/delete-question.js"></script>

    <!-- jQuery 1.7.2+ or Zepto.js 1.0+ -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <!-- Magnific Popup core JS file -->
    <script src="../../../../libs/dist/jquery.magnific-popup.js"></script>
    <script src="../../../../libs/dist/jquery.magnific-popup.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.image-link').magnificPopup({
                type: 'image'
            });
        });
    </script>

    <script>
        function copyLink(id) {
            const link = document.getElementById(`linkQuestion-${id}`);
            const span = document.getElementById(`spanLink-${id}`);

            navigator.clipboard.writeText(link.href);

            span.innerText = "Copiado!";
            setTimeout(() => {
                span.innerText = "Copiar link";
            }, 1150);
        }
    </script>
</body>

</html>
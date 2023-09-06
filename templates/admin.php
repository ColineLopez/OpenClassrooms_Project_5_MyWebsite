<?php $title = "Administration"; ?>
<?php ob_start(); ?>
<div id="articles-banniere">
    <section>
        <h1 class='white-shadow'>
            Administration    
            <br>
            <hr class='big-white'>
            <br>
        </h1>
    </section>
</div>
<div class="corps white">
    <div class='grid-three'>
        <hr style='margin-left:50px'>
        <h2 class='lined green'>Modération des commentaires</h2>
        <hr style='margin-right:50px'>
    </div>
    <div class="center uppercase">
        <?php 
        if(isset($_GET['err']))
            {
                $err = htmlspecialchars($_GET['err']);
                $message = match($err) {
                    'accept' => "<strong class='green'>Le commentaire a été publié.</strong>",
                    'refuse' => "<strong class='orange'>Le commentaire ne sera pas publié.</strong>",
            };
             echo $message;
        }; 
        ?>
    </div>
</div>
<div class='corps news '>
    <div class='grid-four bold uppercase center margin-content'>
        <div class="gridone">Article</div>
        <div class="gridtwo">Date</div>
        <div class="gridthree">Auteur</div>
        <div class="gridfour">Commentaire</div>
        <div class="gridfive">Validation</div>
    </div>
    <?php
    foreach ($comments as $comment) { 
    ?>
    <div class='grid-four center margin-content'>
            <div class="gridone"><button class="link" onclick="window.open('index.php?action=article&postID=<?php echo htmlspecialchars($comment->postID); ?>')"></button></div>
            <div class="bold"><?php echo htmlspecialchars($comment->creationDate); ?></div> 
            <div class="green bold"><?php echo htmlspecialchars($comment->author); ?></div>
            <div><?php echo htmlspecialchars($comment->content); ?></div>
            <div class="gridone">
                <form class="moderation" action="index.php?action=moderateComment" method="post">
                    <input type='hidden' name='commentID' value=<?php echo htmlspecialchars($comment->commentID); ?>>
                    <input type="submit" name="true" value="" class="true transition">
                    <input type="submit" name="false" value="" class="false transition">
                </form>
            </div>
    </div>
    <?php
    }
    ?>      
</div>
<?php $content = ob_get_clean(); ?>
<?php require('templates/layout.php'); ?>
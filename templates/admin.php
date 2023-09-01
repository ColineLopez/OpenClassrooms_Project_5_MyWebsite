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
</div>
<div class='corps news '>
    <div class='grid-four bold uppercase center margin-content'>
        <div class="gridone">Article</div>
        <div class="gridtwo">Date</div>
        <div class="gridthree">Auteur</div>
        <div class="gridfour">Commentaire</div>
        <div class="gridfive-mid">Validation</div>
    </div>
    <?php
    foreach ($comments as $comment) { 
    ?>
    <div class='grid-four center margin-content'>
            <div class="gridone"><button class="link" onclick="window.open('index.php?action=article&postID=<?php echo htmlspecialchars($comment->postID); ?>')"></button></div>
            <div class="bold"><?php echo htmlspecialchars($comment->creationDate); ?></div> 
            <div class="green bold"><?php echo htmlspecialchars($comment->author); ?></div>
            <div><?php echo htmlspecialchars($comment->content); ?></div>
            <div class="gridone"><button class="true" onclick=""></button></div>
            <div class="gridone"><button class="false" onclick=""></button></div>
    </div>
    <?php
    }
    ?>      
</div>
<?php $content = ob_get_clean(); ?>
<?php require('templates/layout.php'); ?>
<?php

require('src/model.php');

$posts = getPosts();

require('templates/articles_template.php');
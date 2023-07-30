<?php

require('src/model.php');

$posts = getPosts();

require('templates/articleslist.php');
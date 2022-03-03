<!-- the head section -->
<head>
<title>Entertainment Watchlist</title>

<link rel="stylesheet" type="text/css" href="./css/mainstyle.css">
<!-- <link rel="stylesheet" type="text/css" href="bootstrap.css"/> -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=neon|outline|emboss|shadow-multiple">


<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;1,900&display=swap');
</style>


</head>

<!-- the body section -->
<body>
<header>
    <h1 class = "font-effect-neon2">Film and TV Watchlist</h1> 
<aside>
<nav id="nav"> 
<form class="form">
    <input type="text" placeholder ="search"/>
</form>
    <ul>
<?php foreach ($categories as $category) : ?>

    <li><a class="active" href=".?category_id=<?php echo $category['categoryID']; ?>">
<?php echo $category['categoryName']; ?>
    </a>
    </li>
<?php endforeach; ?>
</ul>

</nav>     
</aside>  
</header>
<nav>
    <ul>
        <li>Film
        <ul>
            <?php for ($i = 0;$i<5;++$i){
                if ($data['movies'][$i]){ ?>
                    <li><a href="/index/<?=$data['movies'][$i]?>"><?=$data['movies'][$i]?></a></li>
                <?php }
            }?>
        </ul>
        </li>
        <li>Producteur/réalisateur
        <ul>
            <?php for ($i = 0;$i<5;++$i){
                if ($data['directors'][$i]){ ?>
                   <li><a href="/index/<?=$data['directors'][$i]?>"><?=$data['directors'][$i]?></a></li>
                <?php }
            }?>
        </ul>
        </li>
        <li>Acteur
            <ul>
                <?php for ($i = 0;$i<5;++$i){
                    if ($data['actors'][$i]){ ?>
                        <li><a href="/index/<?=$data['actors'][$i]?>"><?=$data['actors'][$i]?></a></li>
                    <?php }
                }?>
            </ul>
        </li>

    </ul>
</nav>
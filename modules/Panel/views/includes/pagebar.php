 <!-- Content Header -->
        <div class="content-header">
            <h1 class="page-title"><?= $pageTitle ?></h1>
            <ol class="breadcrumb">
                <?php
                    if(count($pageNavs) > 0) {
                        foreach($pageNavs as $nav) {
                            echo "<li>" . $nav . "</li>";
                        }
                    }
                ?>
            </ol>
        </div>

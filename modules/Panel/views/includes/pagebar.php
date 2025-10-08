 <!-- Content Header -->
<div class="content-header">
    <div class="content-top">
        <h1 class="page-title"><?= $pageTitle ?></h1>
        <?php if(isset($buttons) && !empty($buttons)) : ?>
            <?php foreach($buttons as $button) : ?>
                <a href="<?= $button["link"] ?? "#" ?>">
                    <button class="<?= $button["class"] ?>"><?= $button["text"] ?></button>
                </a>
            <?php endforeach ?>
        <?php endif ?>
    </div>
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

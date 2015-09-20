<?php
function showFooter(array $js=[])
{
?>
    </main>
    <footer class="footer">
        <div class="container">
            <p class="text-muted">
                <?= SUBTITLE; ?> - 2015 / <?= date('Y'); ?>
                <br /><?= VERSION; ?>
            </p>
        </div>
    </footer>
    <script src="<?= SITE_URL; ?>assets/js/jquery-2.1.4.min.js"></script>
    <script src="<?= SITE_URL; ?>assets/js/bootstrap.min.js"></script>
    <?php
    if ($js) :
        foreach ($js as $script) :
            $src = SITE_URL . 'assets/js/' . $script . '.js';
    ?>
            <script src="<?= $src ?>"></script>
    <?php
        endforeach;
    endif;
    ?>
</body>
</html>
<?php } ?>

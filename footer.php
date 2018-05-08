<!-- Footer -->
<section class="container-fluid footer">
    <div class="container">
        <p>&copy;2018 - START WP.</p>
        <?php wp_footer();?>
    </div>
</section>

<!-- Modal Search -->
<div class="modal fade dropdown-search" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form role="search" method="get" action="">
                    <h3 style="text-align: center;font-style: italic;color: #CCC">BUSCA RÁPIDA</h3>
                    <input type="text" name="s" id="s" class="form-search" placeholder="Buscar por...">
                    <input type="submit" id="searchsubmit">
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
    $(function () {

        //network socials btn
        $('#facebook-btn').hover(function () {
            $('.tal-fac').stop(true, true).fadeIn('slow');
        }, function() {
            $('.tal-fac').stop(true, true).fadeOut('slow');
        });
        $('#twitter-btn').hover(function () {
            $('.tal-tw').stop(true, true).fadeIn('slow');
        }, function() {
            $('.tal-tw').stop(true, true).fadeOut('slow');
        });
        $('#linkedin-btn').hover(function () {
            $('.tal-lin').stop(true, true).fadeIn('slow');
        }, function() {
            $('.tal-lin').stop(true, true).fadeOut('slow');
        });

        //dropdown menu (categories)
        $('.menu-desktop .drop-categories').hover(function() {
            $('.sub-menu').stop(true, true).fadeIn('fast');
        }, function() {
            $('.sub-menu').stop(true, true).fadeOut('fast');
        });

        //busca menu
        $('.drop-search').on('click', function () {
            $('.dropdown-search').modal('show');
        })

    })
</script>

</body>
</html>
<!-- jQuery CDN - Slim version (=without AJAX) -->
    <script type="text/javascript" src="../stylesheet/js/jquery.js"></script>
	<script type="text/javascript" src="../stylesheet/js/popper.js"></script>
	<script type="text/javascript" src="../stylesheet/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>
</body>

</html>
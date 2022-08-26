<script src="<?=BASE_URL.'/asset/jquery-3.6.0.js'?>"></script>
<script src="<?=BASE_URL.'/asset/bootstrap.bundle.min.js'?>"></script>


<!-----js CDN for summernote -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $(document).ready(function() {
        // $('#summernote').summernote();

        $('#summernote').summernote({
        placeholder: 'Type your Description.....',
        tabsize: 2,
        height: 100
    });
        $('.dropdown-toggle').dropdown(); 
    });
</script>
<!-- end ----js CDN for summernote -->


</div>

</body>
</html>
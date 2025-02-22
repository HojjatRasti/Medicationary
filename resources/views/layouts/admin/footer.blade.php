<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    })
</script>
<script>
    // popover enabler for admis list pages
    const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
    const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))

    $(document).ready(function() {
        $('.cat-multi-select').select2();
        $('.select2-selection').css('border-radius' ,'.375rem 0 0 .375rem ');
        $('.select2-selection').css('border' ,'none');
        $('.select2-selection').attr('placeholder', 'دسته‌بندی');

    });

</script>


</body>

</html>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
        $('#title').on('input', function() {
            const slug = this.value
                .toLowerCase()
                .trim()
                .replace(/[^\w\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');
            $('#slug').val(slug);
        });
</script>

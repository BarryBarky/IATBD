@if (session('message'))
    <section class="flash-message">
        {{ session('message') }}
    </section>
    <script>
        setTimeout(() => {
            document.querySelector('.flash-message').style.display = 'none'
        }, 3000)
    </script>
@endif

<script>
    var idleTime = 0;

    $(document).ready(function () {
        //Increment the idle time counter every minute.
        var idleInterval = setInterval(timerIncrement, 60000); // 30s check

        //Zero the idle timer on mouse movement.
        $(this).mousemove(function (e) {
            idleTime = 0;
        });
        $(this).keypress(function (e) {
            idleTime = 0;
        });

        $("input,textarea").focus(function () {
            // console.log("U focus");
            clearInterval(idleInterval);
        });


    });

    function timerIncrement() {
        idleTime++;
        // console.log(idleTime);

        if (idleTime > 3) {
            window.location.reload();
        }
    }
</script>

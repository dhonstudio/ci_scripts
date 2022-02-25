<script>
    function login_google(url_open, success) {
        w = 601
        h = 600
        const dualScreenLeft  = window.screenLeft !== undefined ? window.screenLeft : window.screenX
        const dualScreenTop   = window.screenTop !== undefined ? window.screenTop  : window.screenY

        const width   = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width
        const height  = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height

        const systemZoom  = width / window.screen.availWidth
        const left        = (width - w) / 2 / systemZoom + dualScreenLeft
        const top         = (height - h) / 2 / systemZoom + dualScreenTop
        var win           = window.open(url_open, "windowname1", 
            `scrollbars=yes,
            width=${w / systemZoom}, 
            height=${h / systemZoom}, 
            top=${top}, 
            left=${left}`
        ) 

        var pollTimer     = window.setInterval(function() { 
            try {
                if (win.document.URL.indexOf(success) != -1) {
                    window.clearInterval(pollTimer)
                    var url = win.document.URL
                    win.close()

                    location.reload() 
                }
            } catch(e) {
            }
        }, 500)
    }
</script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div style="width: 500px" id="reader"></div>

    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            // Handle on success condition with the decoded text or result.
            var url = 'http://supervision-web.test/scan';
            var form = $('<form action="' + url + '" method="POST" id="barcode-form">' +
            '<input type="hidden" name="_token" value="{{ csrf_token() }}">' +
            '<input type="text" name="barcode" value="' + decodedText + '" />' +
            '</form>');
            $('body').append(form);
            document.getElementById("barcode-form").display = "none";
            form.submit();
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: 250
            });
        html5QrcodeScanner.render(onScanSuccess);
    </script>
</body>

</html>

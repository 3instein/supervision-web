<x-app-layout>
  @push('addon-style')
    <style>
      #reader__scan_region img {
        /* center image */
        margin: 0 auto;

      }
    </style>
  @endpush

  <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full px-4">
    <div id="reader"></div>
  </div>

  @push('addon-script')
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
      crossorigin="anonymous"></script>
    <script>
      function onScanSuccess(decodedText, decodedResult) {
        // Handle on success condition with the decoded text or result.
        var url = 'http://supervision-web.test/';
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
  @endpush
</x-app-layout>

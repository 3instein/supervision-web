<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <title>Supervision</title>
</head>

<body>
    <div class = "container card mt-3">
            <div class = "p-4">
                 <div class = "text-center">
                    <h4>Receipt</h4>
                 </div>
                 <span class = "mt-4"> Date & Time : </span> <span class = "mt-4">{{ $transaction->created_at }}</span>
                 <p class = "mt-4"> Order No: {{ $transaction->order->id }}</p>
                 <div class = "row">
                    <table class = "table">
                       <thead>
                          <tr>
                             <th>Item Name</th>
                             <th>Quantity</th>
                             <th class = "text-center">Price</th>
                             <th class = "text-center">Total</th>
                          </tr>
                       </thead>
                       <tbody>
                        <tr>
                            <td>Nasi Hainan</td>
                            <td>1</td>
                            <td class = "text-center">Rp. 35.000</td>
                            <td class = "text-center">Rp. 35.000</td>
                         </tr>
                         <tr>
                            <td>Nasi Goreng Jawa</td>
                            <td>2</td>
                            <td class = "text-center">Rp. 15.000</td>
                            <td class = "text-center">Rp. 30.000</td>
                         </tr>
                         <tr>
                            <td>Es Teh Hangat</td>
                            <td>1</td>
                            <td class = "text-center">Rp. 5.000</td>
                            <td class = "text-center">Rp. 5.000</td>
                         </tr>
                         <tr>
                            <td>Es Lemon Tea</td>
                            <td>2</td>
                            <td class = "text-center">Rp. 7.000</td>
                            <td class = "text-center">Rp. 14.000</td>
                         </tr>
                       </tbody>
                       <tr>
                          <td> </td>
                          <td> </td>
                          <td class = "text-right text-dark" >
                               <h5><strong>Sub Total:   </strong></h5>
                               <p><strong>Tax (11%) :  </strong></p>
                          </td>
                          <td class = "text-center text-dark" >
                             <h5> <strong><span id = "subTotal">Rp. 84.000</strong></h5>
                             <h5> <strong><span id = "taxAmount">Rp. 9.420</strong></h5>
                          </td>
                       </tr>
                       <tr>

            <td> </td>
            <td> </td>
            <td class="text-right text-dark">
              <h5><strong> Total: </strong></h5>
            </td>
            <td class="text-center text-danger">
              <h5 id="totalPayment"><strong>Rp. 93.240 </strong></h5>

            </td>
          </tr>
          <tr>

            <td> </td>
            <td> </td>
            <td class="text-center">
              <a href="#" class="btn btn-success">
                <span class="bi bi-printer"></span> Print Receipt
              </a>
            </td>
            <td class="text-center">
              <a href="#" class="btn btn-success">
                <span class="bi bi-back"></span> Back to Menu
              </a>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>

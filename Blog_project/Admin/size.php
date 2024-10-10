<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quantity Selector</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .sizebox {
      margin: 10px 0;
    }

    .input-group {
      display: none;
    }

    .input-group.active {
      display: flex !important;
    }
  </style>
</head>

<body>
  <div class="size">
    <label style="font-weight: bold;"> Size </label>
    <div class="lh-lg" style="gap: 2rem;">
      <div class="d-flex sizebox">
        <div class="col-4 mr-2 sizeinput">
          <input type="checkbox" class="sizecheckbox" id="sizeS" name="size[]" value="S"> &nbsp;&nbsp;
          <label style="font-size: 20px;"> S </label>
        </div>
        <div class="sizeqty col-md-5 " id="qtyS">
          <div class="input-group Input-Size-S">
            <div class="input-group-prepend">
              <button class="btn btn-outline-secondary quantity-btn" id="decrement-S" type="button">-</button>
            </div>
            <input type="text" class="form-control text-center quantity " id="quantity-S" name="quantity[]" value="1">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary quantity-btn" id="increment-S" type="button">+</button>
            </div>
          </div>
        </div>
      </div>
      <div class="d-flex sizebox">
        <div class="col-4 mr-2 sizeinput">
          <input type="checkbox" class="sizecheckbox" id="sizeXS" name="size[]" value="XS"> &nbsp;&nbsp;
          <label style="font-size: 20px;"> XS </label>
        </div>
        <div class="sizeqty col-md-5 " id="qtyXS">
          <div class="input-group Input-Size-XS">
            <div class="input-group-prepend">
              <button class="btn btn-outline-secondary quantity-btn" id="decrement-XS" type="button">-</button>
            </div>
            <input type="text" class="form-control text-center quantity " id="quantity-XS" name="quantity[]" value="1">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary quantity-btn" id="increment-XS" type="button">+</button>
            </div>
          </div>
        </div>
      </div>
      <div class="d-flex sizebox">
        <div class="col-4 mr-2 sizeinput">
          <input type="checkbox" class="sizecheckbox" id="sizeM" name="size[]" value="M"> &nbsp;&nbsp;
          <label style="font-size: 20px;"> M </label>
        </div>
        <div class="sizeqty col-md-5 " id="qtyM">
          <div class="input-group Input-Size-M">
            <div class="input-group-prepend">
              <button class="btn btn-outline-secondary quantity-btn" id="decrement-M" type="button">-</button>
            </div>
            <input type="text" class="form-control text-center quantity " id="quantity-M" name="quantity[]" value="1">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary quantity-btn" id="increment-M" type="button">+</button>
            </div>
          </div>
        </div>
      </div>
      <div class="d-flex sizebox">
        <div class="col-4 mr-2 sizeinput">
          <input type="checkbox" class="sizecheckbox" id="sizeL" name="size[]" value="L"> &nbsp;&nbsp;
          <label style="font-size: 20px;"> L </label>
        </div>
        <div class="sizeqty col-md-5  " id="qtyL">
          <div class="input-group Input-Size-L">
            <div class="input-group-prepend">
              <button class="btn btn-outline-secondary quantity-btn" id="decrement-L" type="button">-</button>
            </div>
            <input type="text" class="form-control quantity text-center" id="quantity-L" name="quantity[]" value="1">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary quantity-btn" id="increment-L" type="button">+</button>
            </div>
          </div>
        </div>
      </div>
      <div class="d-flex sizebox">
        <div class="col-4 mr-2 sizeinput">
          <input type="checkbox" class="sizecheckbox" id="sizeXL" name="size[]" value="XL"> &nbsp;&nbsp;
          <label style="font-size: 20px;"> XL </label>
        </div>
        <div class="sizeqty col-md-5 " id="qtyXL">
          <div class="input-group Input-Size-XL">
            <div class="input-group-prepend">
              <button class="btn btn-outline-secondary quantity-btn" id="decrement-XL" type="button">-</button>
            </div>
            <input type="text" class="form-control quantity text-center" id="quantity-XL" name="quantity[]" value="1">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary quantity-btn" id="increment-XL" type="button">+</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <script>
    $(document).ready(function() {
      const sizes = ['XS', 'S', 'M', 'L', 'XL'];

      // Loop through sizes
      sizes.forEach(size => {
        const checkbox = document.getElementById(`size${size}`);
        const qtyDiv = document.getElementById(`qty${size}`);

        // Increment the quantity
        $(`#increment-${size}`).on('click', function() {
          let qty = parseInt($(`#quantity-${size}`).val());
          $(`#quantity-${size}`).val(qty + 1);

        });

        // Decrement the quantity but don't go below 1
        $(`#decrement-${size}`).on('click', function() {
          let qty = parseInt($(`#quantity-${size}`).val());
          $(`#quantity-${size}`).val(qty - 1);

        });

        for (const key in sizes) {

          let inputgroup = document.getElementsByClassName(`Input-Size-${size}`);

          $('.quantity').on('input', function() {
            qty = $(this).val();
            console.log(qty);

          })

          // Event listener for checkbox
          checkbox.addEventListener('change', () => {
            if (checkbox.checked) {

              for (let i in inputgroup) {
                inputgroup[i].classList.add('d-flex'); // Show quantity input
              }

              $('.input-group').show();
            } else {
              inputgroup[0].classList.remove('d-flex'); // Show quantity input
              inputgroup[0].classList.add('d-none'); // Show quantity input
            }
          });
        }

      });
    });
  </script>
</body>

</html>
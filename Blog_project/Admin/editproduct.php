<?php
include('./includes/header.php');
include('./includes/sidebar.php');
?>

<head>

    <style>
        .card-title {
            cursor: pointer;
        }

        .form-group {
            margin-bottom: 29px;
        }

        #openDialogBtn {
            width: 36px;
            height: 36px;
            border: 1px solid #000;
            border-radius: 50px;
            background-color: #fff;
            display: inline-block;
            margin-left: 10px;
        }

        /* Center the dialog */
        .dialog {
            display: none;
            position: fixed;
            top: 50%;
            left: 72%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Show dialog */
        .dialog.active {
            display: block;
        }

        .change-dialog {
            display: none;
            position: fixed;
            top: 50%;
            left: 72%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .btn {
            border: 1px solid #000;
        }

        .change-dialog.active {
            display: block;
        }

        /* Buttons */
        .dialog-buttons {
            margin-top: 20px;
            text-align: right;
        }

        /* Outer container for the selected color, representing the border */
        .selectedColor {
            width: 36px;
            /* Increased size for the outer border */
            height: 36px;
            border-radius: 50%;
            /* Ensures the outer border is circular */
            border: 1px solid transparent;
            /* Outer border will dynamically take the inner color */
            display: inline-flex;
            /* Centers the inner circle inside */
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            /* margin-bottom: 10px; */
        }

        /* Inner circle representing the selected color */
        .selectedColorInner {
            width: 30px;
            /* Slightly smaller to fit inside the outer container */
            height: 30px;
            border-radius: 50%;
            background-color: #ffffff;
            cursor: pointer;
            /* The actual selected color will overwrite this */
        }

        /* Container for colors and the add button */
        .colorContainer {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 20px;
            margin-left: 20px;
            transition: all 0.3s ease;
            /* Smooth transition for hiding/showing */
        }

        .colorContainer:empty {
            margin: 0;
            padding: 0;
        }

        /* Container to hold the selected colors */
        #selectedColors {
            display: flex;
            /* Ensure the selected colors are aligned horizontally */
            align-items: center;
            gap: 10px;
            /* Optional: adds space between colors */
        }

        .sizebox {
            margin: 10px 0;
        }

        .input-group {
            display: none;
        }

        .input-group.active {
            display: flex !important;
        }

        .size-qty-container {
            display: grid;
            flex-wrap: wrap;
            gap: 10px;
        }

        .size-box,
        .qty-box {
            width: 38px;
            height: 38px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 15px;
            font-weight: 500;
        }

        .size-box {
            background-color: #f8f9fa;
        }

        .qty-box {
            background-color: #e9ecef;
        }
    </style>

</head>

<div class="content-body text-dark">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> <span> <a class="backbtn"> Product </a> </span> / Edit Product </h4>
                    </div>
                    <div class="container " id="element">

                        <form id="editProductData" class="d-grid" style="padding: 25px; box-shadow: 0 2px 3px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); ">
                            <div class="container col-12 table-responsive  d-grid">
                                <?php
                                $pid = $_GET['pid'];
                                $sql = "select * from `productdata` where `id`= '$pid'";
                                $result = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $images = json_decode($row['image'], true);

                                ?>
                                    <div class="d-flex ">
                                        <input type="hidden" name="pid" id="pid" value="<?php echo $pid; ?>">

                                        <div class="col-6 ">

                                            <div class="form-group error">
                                                <label style="font-weight: bold;"> Category </label>
                                                <select class="form-control">
                                                    <option> Select Category </option>
                                                    <?php
                                                    $sql = "select * from `admin_category`";
                                                    $result = mysqli_query($con, $sql);
                                                    while ($categoryrow = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                        <option <?= $categoryrow['category'] == $row['category'] ? 'selected' : '' ?>> <?php echo $categoryrow['category']; ?> </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group error">
                                                <label style="font-weight: bold;"> Sub Category </label>
                                                <select class="form-control">
                                                    <option> Select Sub Category </option>
                                                    <?php
                                                    $subcategorysql = "select *  from `admin_subcategory` ";
                                                    $subcategoryresult = mysqli_query($con, $subcategorysql);
                                                    while ($subcategoryrow = mysqli_fetch_assoc($subcategoryresult)) {
                                                    ?>
                                                        <option <?= $subcategoryrow['subcategory'] == $row['subcategory'] ? 'selected' : '' ?>> <?php echo $subcategoryrow['subcategory']; ?> </option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group error">
                                                <label style="font-weight: bold;">Price</label>
                                                <input type="text" name="price" id="price" class="form-control price" value="<?php echo $row['price']; ?>" placeholder="Enter Price">
                                            </div>
                                            <div class="form-group error">
                                                <label style="font-weight: bold;">line-through-price</label>
                                                <input type="text" name="maxprice" id="mrp" class="form-control mrp" value="<?php echo $row['mrp']; ?>" placeholder="mrp">
                                            </div>
                                            <div class="form-group error">
                                                <label style="font-weight: bold;">Discount</label>
                                                <input type="text" name="discount" id="discount" class="form-control discount" value="<?php echo $row['discount']; ?>" placeholder="8% off">
                                            </div>
                                            <div class="form-group error">
                                                <label style="font-weight: bold;">Offer</label>
                                                <input type="text" name="offer" id="offer" class="form-control offer" value="<?php echo $row['offer']; ?>" placeholder="130 with 2 special offer">
                                            </div>
                                            <div class="d-grid gap-2 form-group error">
                                                <label style="font-weight: bold;"> Delivery </label>
                                                <div class="delivery" class="delivery">
                                                    <?php
                                                    $delivery = $row['delivery'];
                                                    ?>
                                                    <div class="form-check">
                                                        <input type="radio" class="freedelivery" id="freedelivery" name="delivery" value="Free Delivery" <?= $delivery == 'Free Delivery' ? 'active' : '' ?>>
                                                        <label for="freedelivery"> Free Delivery </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="radio" class="paymentcharge" id="paymentcharge" name="delivery" value="Pay To Charge" <?= $delivery == 'Pay To Charge' ? 'active' : '' ?>>
                                                        <label for="paymentcharge"> Payment Charge </label>
                                                    </div>
                                                    <div>
                                                        <input type="text" name="deliverycharge" id="deliverycharge" name="deliverycharge" class="d-none form-control deliverycharge" placeholder="Enter Delivery Charge" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group error">
                                                <label style="font-weight: bold;">Company Name</label>
                                                <input type="text" name="soldby" id="soldby" class="form-control soldby" value="<?php echo $row['soldby']; ?>" placeholder=" Company Name">
                                            </div>
                                            <div class="form-group error">
                                                <label style="font-weight: bold;"> Description </label>
                                                <textarea name="description" id="description" class="form-control description" placeholder=" Description Name"><?php echo $row['description']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-6">

                                            <div class="form-group error">
                                                <label style="font-weight: bold;"> Image </label>
                                                <input type="file" name="uploadfile[]" class="form-control images" id="images" multiple>
                                                <?php if (!empty($images)) {
                                                    foreach ($images as $index => $image) {
                                                ?>
                                                        <input type="hidden" name="image" id="image" value="<?= $image; ?>">
                                                <?php }
                                                } ?>
                                            </div>

                                            <div class="mt-4 d-flex">
                                                <div class="col-4">
                                                    <?php
                                                    $colors = json_decode($row['color'], true);
                                                    $colorChecked = !empty($colors) ? 'checked' : '';
                                                    ?>
                                                    <input type="checkbox" class="addcolor" id="addcolor" value="" <?php echo $colorChecked; ?>> &nbsp;&nbsp;
                                                    <label style="font-size: 20px;"> Add Color </label>
                                                </div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <div class="col-4">
                                                    <button type="button" id="openDialogBtn" <?php echo empty($colors) ? 'style="display:none;"' : ''; ?>> + </button>
                                                </div>
                                            </div>

                                            <!-- Color Picker -->
                                            <div id="color" class="my-3">
                                                <div class="colorContainer">
                                                    <div id="selectedColors">
                                                        <input type="hidden" id="setcolor" class="setcolor" name="setcolor[]">
                                                        <?php
                                                        if (is_array($colors)) {
                                                            foreach ($colors as $index => $color) {
                                                                echo "<div class='selectedColor' id='colorDiv-{$index}' style='border-color: {$color};'>";
                                                                echo "<input type='hidden' id='inputcolor' name='color[]' value='{$color}'>";
                                                                echo "<div class='selectedColorInner' style='background-color: {$color};'></div>";
                                                                echo "</div>";
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>

                                                <!-- Color Picker Dialog -->
                                                <div id="colorPickerDialog" class="dialog">
                                                    <h2>Pick a Color</h2>
                                                    <input type="color" id="colorInput" value="#000000"><br><br>

                                                    <div class="dialog-buttons">
                                                        <button type="button" class="btn" id="cancelBtn"> Cancel </button> &nbsp;
                                                        <button type="button" class="btn" id="okBtn"> OK </button>
                                                    </div>
                                                </div>

                                                <!-- change color  -->
                                                <div id="change-dialog" class="dialog">
                                                    <h2>Change a Color</h2>
                                                    <input type="color" id="colorinput" style="padding: 1px;" value="#000000"><br><br>

                                                    <div class="dialog-buttons">
                                                        <button type="button" class="btn" id="cancel"> Cancel </button> &nbsp;
                                                        <button type="button" class="btn" id="remove"> Remove </button> &nbsp;
                                                        <button type="button" class="btn" id="change"> Change </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="size">
                                                <label style="font-weight: bold;"> Size and Quantity </label>

                                                <div class="mt-3 d-grid lh-lg " style="font-size: 17px; margin-bottom: 12px;">
                                                    <div class="form-check gap-4 d-flex " style="gap: 5rem;">
                                                        <div>
                                                            <input type="radio" class="freesize" id="freesize" name="freesize" value="free size">
                                                            <label for="freesize"> Free Size </label>
                                                        </div>
                                                        <div class="col-md-5 d-none" id="qty">
                                                            <div class="qtybtn Input-qty d-flex">
                                                                <div class="Input-group-prepend">
                                                                    <button type="button" class="btn btn-outline-secondary quantity-btn  " id="decdqty"> - </button>
                                                                </div>
                                                                <input type="text" class="form-control text-center quantity freeqty" id="freeqty" name="freeqty" value="1">
                                                                <div class="Input-group-append">
                                                                    <button type="button" class="btn btn-outline-secondary quantity-btn " id="incqty"> + </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-check gap-4">
                                                        <input type="radio" class="addsize" id="addsize" name="freesize" value="add size">
                                                        <label for="addsize"> Add Size </label>
                                                    </div>
                                                </div>

                                                <div class="lh-lg size-qty d-none" style="gap: 2rem;">
                                                    <div class="d-flex sizebox">
                                                        <div class="col-4 mr-2 sizeinput">
                                                            <input type="checkbox" class="sizecheckbox" id="S" name="size[]" value="S"> &nbsp;&nbsp;
                                                            <label style="font-size: 20px;"> S </label>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex sizebox">
                                                        <div class="col-4 mr-2 sizeinput">
                                                            <input type="checkbox" class="sizecheckbox" id="XS" name="size[]" value="XS"> &nbsp;&nbsp;
                                                            <label style="font-size: 20px;"> XS </label>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex sizebox">
                                                        <div class="col-4 mr-2 sizeinput">
                                                            <input type="checkbox" class="sizecheckbox" id="M" name="size[]" value="M"> &nbsp;&nbsp;
                                                            <label style="font-size: 20px;"> M </label>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex sizebox">
                                                        <div class="col-4 mr-2 sizeinput">
                                                            <input type="checkbox" class="sizecheckbox" id="L" name="size[]" value="L"> &nbsp;&nbsp;
                                                            <label style="font-size: 20px;"> L </label>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex sizebox">
                                                        <div class="col-4 mr-2 sizeinput">
                                                            <input type="checkbox" class="sizecheckbox" id="XL" name="size[]" value="XL"> &nbsp;&nbsp;
                                                            <label style="font-size: 20px;"> XL </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="date ">
                                                <?php if (isset($row['product_date'])) {
                                                    $productdate = $row['product_date'];
                                                    $expiredate = $row['outofstock_date'];
                                                ?>
                                                    <div class="form-group mt-5 error">
                                                        <label for="date" style="font-weight: bold;"> Product Date </label>
                                                        <input type="date" class="form-control" id="productdate" name="productdate" value="<?php echo $productdate; ?>" placeholder="Select Current Date">
                                                    </div>
                                                    <div class="form-group mt-4 error">
                                                        <label for="date" style="font-weight: bold;"> Out Of Stock Date </label>
                                                        <input type="date" class="form-control" id="outofstockdate" name="outofstockdate" value="<?php echo $expiredate; ?>" placeholder="select Out Of Stock Date ">
                                                    </div>
                                                <?php } ?>
                                            </div>

                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="col-2 m-auto " style="padding: 30px 0 20px 0;">
                                    <button class="btn btn-dark editproduct" style=" width: 10rem; height: 40px; border: none;"> Change </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('./includes/footer.php');
?>

<script>
    $(document).ready(function() {

        $('.backbtn').click(function() {
            window.location.href = "<?= BASE_URL ?>admin/company_list.php";
        })

        // get color
        let colorCounter = 0; // Initialize a counter for unique IDs
        let selectedColorDiv = null; // Variable to store the currently selected colorDiv

        $('#openDialogBtn').hide();

        $('.addcolor').click(function() {
            $('#openDialogBtn').toggle();
        });

        if (!$('.addcolor').is(':checked')) {
            $('.colorContainer').hide();
        }
        const openDialogBtn = document.getElementById('openDialogBtn');
        const dialog = document.getElementById('colorPickerDialog');
        const colorInput = document.getElementById('colorInput');
        const selectedColorsContainer = document.getElementById('selectedColors');
        let changedialog = document.getElementById('change-dialog');
        let colorinput = document.getElementById('colorinput');

        // Set a default color
        let defaultColor = '#000000';

        openDialogBtn.addEventListener('click', () => {
            // Open dialog and set default color
            colorInput.value = defaultColor;
            dialog.classList.add('active');
        });

        // Handle "Cancel" button click
        document.getElementById('cancelBtn').addEventListener('click', () => {
            dialog.classList.remove('active');
        });

        // Handle "OK" button click
        document.getElementById('okBtn').addEventListener('click', () => {
            const selectedColor = colorInput.value;

            // set color in colorinput
            // let setcolor = document.getElementById('setcolor');
            // setcolor.value = selectedColor;
            // let color = setcolor.value;

            let color = selectedColor;
            console.log(color);

            // Increment the colorCounter for a unique ID
            colorCounter++;

            // Create a new div for the outer container
            const colorDiv = $('<div></div>');
            colorDiv.addClass('selectedColor');
            colorDiv.attr('id', 'colorDiv-' + colorCounter); // Add unique ID
            colorDiv.css('border-color', selectedColor);

            let input = $('<input>');
            input.attr('id', 'inputcolor');
            input.attr('value', selectedColor);
            input.attr('name', 'color[]');
            input.attr('type', 'hidden');
            console.log(input.attr('value', selectedColor));

            // Create a new div for the inner circle
            const innerCircle = $('<div></div>');
            innerCircle.addClass('selectedColorInner');
            innerCircle.css('background-color', selectedColor);

            // Append the inner circle to the outer container
            colorDiv.append(input, innerCircle);

            // Add the outer container (with inner color) to the selectedColorsContainer
            $(selectedColorsContainer).append(colorDiv);

            // Save the selected color for next time
            defaultColor = selectedColor;

            // Add click event to colorDiv to get the border color and open change dialog
            colorDiv.click(function() {
                selectedColorDiv = $(this); // Save reference to the clicked colorDiv
                const borderColor = selectedColorDiv.css('border-color');
                console.log('Border color:', borderColor);
                colorinput.value = borderColor; // Set color input to current border color
                colorinput.value = defaultColor;
                changedialog.classList.add('active');
            });

            // Close the color picker dialog
            dialog.classList.remove('active');
        });

        // Handle change dialog cancel button click
        document.getElementById('cancel').addEventListener('click', () => {
            changedialog.classList.remove('active');
        });

        // Handle "change" button click
        document.getElementById('change').addEventListener('click', () => {
            if (selectedColorDiv) {
                const newColor = colorinput.value; // Get the new color from the input
                selectedColorDiv.css('border-color', newColor); // Change the border color
                selectedColorDiv.find('.selectedColorInner').css('background-color', newColor); // Change the inner circle color

                changedialog.classList.remove('active'); // Close the dialog
            }
        });

        // Handle "Remove" button click
        document.getElementById('remove').addEventListener('click', () => {
            if (selectedColorDiv) {
                selectedColorDiv.remove(); // Remove the selected color div
                selectedColorDiv = null; // Reset the selectedColorDiv variable
                changedialog.classList.remove('active'); // Close the dialog
            }
        });

        // Function to update button visibility
        function updateButtonVisibility() {
            if ($('.addcolor').is(':checked')) {
                $('#openDialogBtn').show();
            } else {
                $('#openDialogBtn').hide();
            }
        }
        // Initial button visibility
        updateButtonVisibility();

        // Handle checkbox change
        $('.addcolor').change(function() {
            updateButtonVisibility();

            if (!$(this).is(':checked')) {
                $('#selectedColors').empty();
                $('#setcolor').val('');
                $('.colorContainer').hide(); // Hide the container to remove spacing
            } else {
                $('.colorContainer').show(); // Show the container when checked
            }
        });

        // Handle color addition
        $('#okBtn').click(function() {
            // ... your existing color addition code ...

            // Check the checkbox if it's not already checked
            if (!$('.addcolor').is(':checked')) {
                $('.addcolor').prop('checked', true);
            }
            updateButtonVisibility();
        });

        // Function to handle color div click
        function handleColorDivClick(colorDiv) {
            selectedColorDiv = $(colorDiv);
            const borderColor = selectedColorDiv.css('border-color');
            colorinput.value = borderColor;
            changedialog.classList.add('active');
        }

        // Add click event to existing color divs
        $('.selectedColor').click(function() {
            handleColorDivClick(this);
        });

        // ... your existing color picker code ...

        // Handle "Change" button click in change dialog
        document.getElementById('change').addEventListener('click', () => {
            if (selectedColorDiv) {
                const newColor = colorinput.value;
                selectedColorDiv.css('border-color', newColor);
                selectedColorDiv.find('.selectedColorInner').css('background-color', newColor);
                selectedColorDiv.find('input[type="hidden"]').val(newColor);
                changedialog.classList.remove('active');
            }
        });

        // Handle "Remove" button click in change dialog
        document.getElementById('remove').addEventListener('click', () => {
            if (selectedColorDiv) {
                selectedColorDiv.remove();
                selectedColorDiv = null;
                changedialog.classList.remove('active');

                // If all colors are removed, uncheck the checkbox
                if ($('#selectedColors').children().length === 0) {
                    $('.addcolor').prop('checked', false);
                    updateButtonVisibility();
                }
            }
        });

        // Handle "Cancel" button click in change dialog
        document.getElementById('cancel').addEventListener('click', () => {
            changedialog.classList.remove('active');
        });


        // if click on free size then free qty show

        $('.freesize').on('click', function() {
            $('#qty').toggleClass('d-none');
            $('.size-qty').addClass('d-none');
            $('.qtyinput').val('');
        });

        $('#decdqty').on('click', function() {
            let qty = parseInt($('.freeqty').val());
            $('.freeqty').val(qty - 1);
        });

        $('#incqty').on('click', function() {
            let qty = parseInt($('.freeqty').val());
            $('.freeqty').val(qty + 1);
        });


        // if click on add size then free qty hide

        $('.addsize').on('click', function() {
            $('#qty').addClass('d-none');
            $('.size-qty').toggleClass('d-none');
        });


        // get size and quantity
        const sizes = ['XS', 'S', 'M', 'L', 'XL'];

        $(document).on('click', '.sizecheckbox', function() {
            let sizeid = $(this).attr('id');
            console.log(sizeid);

            if ($(this).is(':checked')) {

                $(this).parent().parent().append(`<div class="sizeqty col-md-5 "  id="qty${sizeid}">
                                                    <div class="input-group Input-Size-${sizeid}">
                                                        <div class="input-group-prepend">
                                                            <button class="btn btn-outline-secondary quantity-btn decrement" id="${sizeid}" type="button">-</button>
                                                        </div>
                                                        <input type="text" class="form-control text-center quantity qtyinput" id="quantity-${sizeid}" name="quantity[]" value="1">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-secondary quantity-btn increment" id="${sizeid}" type="button">+</button>
                                                        </div>
                                                    </div>
                                                </div>`);

                console.log($(this).parent().parent());
            } else {
                $(`#qty${sizeid}`).remove();
            }
        })

        $(document).on('click', '.increment', function() {
            let sizeid = $(this).attr('id');

            let qty = parseInt($(`#quantity-${sizeid}`).val());
            $(`#quantity-${sizeid}`).val(qty + 1);
        })

        $(document).on('click', '.decrement', function() {
            let sizeid = $(this).attr('id');
            let qty = parseInt($(`#quantity-${sizeid}`).val());
            $(`#quantity-${sizeid}`).val(qty - 1);
        })


        // get size and quantity
        // const sizes = ['XS', 'S', 'M', 'L', 'XL'];

        // // Loop through sizes
        // sizes.forEach(size => {
        //     const checkbox = document.getElementById(`size${size}`);
        //     const qtyDiv = document.getElementById(`qty${size}`);

        //     // Increment the quantity
        //     $(`#increment-${size}`).on('click', function() {
        //         let qty = parseInt($(`#quantity-${size}`).val());
        //         $(`#quantity-${size}`).val(qty + 1);

        //     });

        //     // Decrement the quantity but don't go below 1
        //     $(`#decrement-${size}`).on('click', function() {
        //         let qty = parseInt($(`#quantity-${size}`).val());
        //         $(`#quantity-${size}`).val(qty - 1);

        //     });

        //     for (const key in sizes) {

        //         let inputgroup = document.getElementsByClassName(`Input-Size-${size}`);

        //         $('.quantity').on('input', function() {
        //             qty = $(this).val();
        //             console.log(qty);

        //         })

        //         // Event listener for checkbox
        //         checkbox.addEventListener('change', () => {
        //             if (checkbox.checked) {

        //                 for (let i in inputgroup) {
        //                     inputgroup[i].classList.add('d-flex'); // Show quantity input
        //                 }

        //                 $('.input-group').show();
        //             } else {
        //                 inputgroup[0].classList.remove('d-flex'); // Show quantity input
        //                 inputgroup[0].classList.add('d-none'); // Show quantity input
        //             }
        //         });
        //     }

        // });

        // // Initial setup
        // $('.sizecheckbox').each(function() {
        //     var sizeId = $(this).attr('id').replace('size', '');
        //     var inputGroup = $('.Input-Size-' + sizeId);

        //     if ($(this).is(':checked')) {
        //         inputGroup.addClass('active');
        //     } else {
        //         inputGroup.removeClass('active');
        //     }
        // });

        // // Handle checkbox changes
        // $('.sizecheckbox').on('change', function() {
        //     var sizeId = $(this).attr('id').replace('size', '');
        //     var inputGroup = $('.Input-Size-' + sizeId);
        //     var quantityInput = $('#quantity-' + sizeId);

        //     if ($(this).is(':checked')) {
        //         inputGroup.addClass('active');
        //         quantityInput.prop('disabled', false);
        //         if (quantityInput.val() === '') {
        //             quantityInput.val('1');
        //         }
        //     } else {
        //         inputGroup.removeClass('active');
        //         quantityInput.prop('disabled', true);
        //         quantityInput.val(''); // Clear the value when unchecked

        //         // Remove the size and quantity from the form data
        //         $(this).prop('checked', false);
        //         quantityInput.removeAttr('name');
        //     }
        // });


        $('.freedelivery').on('click', function() {
            if (!$('.deliverycharge').hasClass('d-none')) {
                $('.deliverycharge').addClass('d-none');
            }
        });

        $('.paymentcharge').on('click', function() {
            $('.deliverycharge').toggleClass('d-none');
        });

        $('#editProductData').validate({
            rules: {
                category: "required",
                productname: "required",
                description: "required",
                soldby: "required",
                delivery: "required",
                price: "required",
                mrp: "required",
                discount: "required",
                offer: "required",
                uploadfile: "required",
                productdate: "required",
                outofstockdate: "required"
            },
            message: {
                category: "required category",
                productname: "required description",
                soldby: "required company name",
                delivery: "required delivery",
                price: "required price",
                mrp: "required ",
                discount: "required discount",
                offer: "require offer",
                uploadfile: "required image",
                productdate: "required product date",
                outofstockdate: "required out of stock date"
            },
            errorPlacement: function(error, element) {
                error.insertAfter($(element).closest(".error")).css("color", "#fd143a");
            },
            submitHandler: function(form, e) {
                e.preventDefault();

                let category = $('#category').val();
                console.log(category);
                let subcategory = $('#subcategory').val();
                console.log(subcategory);
                let description = $('#description').val();
                console.log(description);
                let soldby = $('#soldby').val();
                console.log(soldby);
                let delivery = $('#freedelivery').val();
                console.log(delivery);
                let deliverycharge = $('#deliverycharge').val();
                console.log(deliverycharge);
                let price = $('#price').val();
                console.log(price);

                let maxprice = $('#maxprice').val();
                console.log(maxprice);

                let priceoffer = $('#discount').val();
                console.log(priceoffer);

                let offer = $('#offer').val();
                console.log(offer);

                let mrp = $('.mrp').val();
                console.log(mrp);

                let discount = $('.discount').val();
                console.log(discount);

                let image = document.getElementById('images').files;
                console.log(image);

                let img = $('.img').val();
                console.log(img);

                let size = $('.size').val();
                console.log(size);
                
                let color = $('.color').val();
                console.log(color);

                let input = $("input[type='checkbox']").val();
                console.log(input);

                let productdate = $('#productdate').val();
                console.log(productdate);

                let outofstockdate = $('#outofstockdate').val();
                console.log(outofstockdate);

                let formData = $("#addProductData").serialize();
                console.log(formData);

                let formdata = new FormData(form);
                console.log(formdata);

                var settings = {
                    "url": '<?= BASE_URL ?>controller/Company.php?type=editproduct',
                    "method": "POST",
                    contentType: false,
                    processData: false,
                    "data": formdata
                };

                $.ajax(settings).done(function(response) {
                    response = JSON.parse(response);
                    if (response.error == true) {
                        toastr.error(response.message, 'Error');
                    } else {
                        toastr.success(response.message, 'Success');
                    }
                });

            }
        })
    })
</script>
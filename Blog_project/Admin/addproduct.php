<?php
include('./includes/header.php');
include('./includes/sidebar.php');
?>

<!-- <div class="content-body">
    <div class="container">
        <form id="addProductData">
            <div class="row py-4">
                <div class="col-6 p-4">
                    <div class="p-4" style="background-color: rgb(225, 236, 249);">
                        <div class="form-group error">
                            <label> Product Name </label>
                            <input type="text" class="form-control " placeholder="enter product ">
                        </div>
                        <div class="form-group error">
                            <label> Product Name </label>
                            <input type="text" class="form-control " placeholder="enter product ">
                        </div>
                        <div class="form-group error">
                            <label> Product Name </label>
                            <input type="text" class="form-control " placeholder="enter product ">
                        </div>
                        <div class="form-group error">
                            <label> Product Name </label>
                            <input type="text" class="form-control " placeholder="enter product ">
                        </div>
                    </div>
                </div>
                <div class="col-6 p-4">
                    <div class="p-4" style="background-color: rgb(225, 236, 249);">
                        <div class="row">
                            <div class="col-6 form-group error">
                                <label> Image </label>
                                <input type="file" class="form-control">
                            </div>
                            <div class="col-6 form-group ">
                                <label> Price </label>
                                <input type="text" class="form-control" placeholder="price">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 form-group error">
                                <label> Size </label>
                                <select class="form-control">
                                    <option> Size </option>
                                    <option> XS </option>
                                    <option> S </option>
                                    <option> M </option>
                                    <option> L </option>
                                    <option> XL </option>
                                </select>
                            </div>
                            <div class="col-6 form-group ">
                                <label> Color </label>
                                <input type="color" class="form-control" style="height: 36px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <button class="btn btn-dark m-auto addmore" style="width: 10rem; height: 40px; margin-left: 35rem; border: none;"> Add More </button>
            </div>
        </form>
    </div>
</div> -->


<!-- <form id="addProductData">
    <div class="container table-responsive py-5 d-flex">
        <div class="col-6">
            <div class="form-group error">
                <label style="font-weight: bold;">Product Category</label>
                <input type="text" name="category" class="form-control category" id="category" placeholder="Enter Category">
            </div>
            <div class="form-group error">
                <label style="font-weight: bold;">Price</label>
                <input type="text" name="price" id="price" class="form-control price" placeholder="Enter Price">
            </div>
            <div class="form-group error">
                <label style="font-weight: bold;">line-through-price</label>
                <input type="text" name="maxprice" id="maxprice" class="form-control maxprice" placeholder="max price">
            </div>
            <div class="form-group error">
                <label style="font-weight: bold;">Discount</label>
                <input type="text" name="discount" id="discount" class="form-control discount" placeholder="8% off">
            </div>
            <div class="form-group error">
                <label style="font-weight: bold;">Offer</label>
                <input type="text" name="offer" id="offer" class="form-control offer" placeholder="130 with 2 special offer">
            </div>
            <div class="form-group error">
                <label style="font-weight: bold;"> delivery </label>
                <select id="delivery" name="delivery" class="form-control delivery" required>
                    <option disabled> select delivery </option>
                    <option value="free" name="free"> free delivery </option>
                    <option value="" name=""> </option>
                </select>
            </div>
            <div class="form-group error">
                <label style="font-weight: bold;">Rating</label>
                <input type="text" name="rate" id="rate" class="form-control rate" placeholder="Enter rate">
            </div>
            <div class="form-group error">
                <label style="font-weight: bold;">Company Name</label>
                <input type="text" name="soldby" id="soldby" class="form-control soldby" placeholder="Enter Company Name">
            </div>
        </div>
        <div class="col-6">

            <div class="form-group error">
                <label style="font-weight: bold;"> Image </label>
                <input type="file" name="uploadfile[]" class="form-control images" id="images" multiple>
            </div>

            <div id="" class="form-group ">
                <div class="d-grid " style="margin-top: 3rem;">
                    <label style="font-weight: bold;"> Color </label> &nbsp;&nbsp;&nbsp;
                    <div>
                        <input class="color" id="color" type="color" name="addcolor[]" style="width: 60px; height: 40px; border: 1px solid #fff; margin-right: 3px; " /> &nbsp;&nbsp;

                        <a id="colorpicker" style="margin: 0; padding: 10px 20px 10px 20px; border: 1px solid #1f1f20; border-radius: 10px;"> add </a>
                    </div>
                </div>
                <div id="main" class="maincolor" style="width: 10rem; height:45px; border: 1px solid #fff;  display:none;"></div>
            </div>

            <div class="my-4">
                <div style="margin-top: 3rem;">
                    <label style="font-weight: bold;"> Size </label>
                    <div class="">
                        <div class="mr-2">
                            <input type="checkbox" class="size" id="size" name="size[]" value="S" style=" background-color: #1f1f20;"> &nbsp;&nbsp;
                            <label style="font-size: 20px;"> S </label>
                        </div>
                        <div>
                            <input type="checkbox" class="size" name="size[]" value="M"> &nbsp;&nbsp;
                            <label style="font-size: 20px;"> M </label>
                        </div>
                        <div>
                            <input type="checkbox" class="size" name="size[]" value="L"> &nbsp;&nbsp;
                            <label style="font-size: 20px;"> L </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group error">
                <label for="date" style="font-weight: bold;"> Product Date </label>
                <input type="date" class="form-control" id="productdate" name="productdate" placeholder="Select Current Date">
            </div>
            <div class="form-group error">
                <label for="date" style="font-weight: bold;"> Out Of Stock Date </label>
                <input type="date" class="form-control" id="outofstockdate" name="outofstockdate" placeholder="select Out Of Stock Date ">
            </div>

        </div>
    </div>
    <div class="m-auto mb-6" style="padding-bottom: 5rem;">
        <button class="btn btn-dark addproduct" style="width: 10rem; height: 40px; margin-left: 35rem; border: none;"> Save </button>
    </div>
</form> -->


<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Add Product </h4>
                    </div>
                    <div class="container py-5" id="element">
                        <form id="addProductData">
                            <div class="row ">
                                <div class="col-6 "> 
                                    <div class="p-4" style="background-color: rgb(225, 236, 249);">
                                        <div class="form-group error">
                                            <label> Product Category </label>
                                            <select class="form-control category" id="category" name="category">
                                                <option> select category </option>
                                                <?php
                                                $sql = "select * from `admin_category`";
                                                $result = mysqli_query($con, $sql);
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                    <option value="<?php echo $row['id']; ?>"> <?php echo $row['category']; ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group error">
                                            <label> Description </label>
                                            <textarea class="form-control description" id="description" name="description" stylre="padding-bottom: 10rem;" placeholder="description"> </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 ">
                                    <div class="p-4" style="background-color: rgb(225, 236, 249);">
                                        <div class=" form-group error">
                                            <label> Company Name </label>
                                            <input type="text" class="form-control soldby" id="soldby" name="soldby" placeholder="company name">
                                        </div>
                                        <div class=" form-group error">
                                            <label> Delivery </label>
                                            <select class="form-control delivery" id="delivery" name="delivery">
                                                <option> select delivery </option>
                                                <option> free delivery </option>
                                                <option> delivery charged </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row p-4" style="background-color: rgb(225, 236, 249); margin-top: 3rem;">
                                <div class="col-6 ">
                                    <div class="form-group error">
                                        <label> Product Date </label>
                                        <input type="date" class="form-control productdate" id="productdate" name="productdate">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group error">
                                        <label> Outfo Stock Date </label>
                                        <input type="date" class="form-control outofstockdate" id="outofstockdate" name="outofstockdate" placeholder="outof stock date">
                                    </div>
                                </div>
                            </div>

                            <div id="addtable">
                                <div class="row p-4" id="attr_id" style="margin-top: 3rem; margin-bottom:20rem; background-color: rgb(225, 236, 249); margin-top: 3rem;">

                                    <div class="col-6 ">
                                        <div class="form-group error">
                                            <label> Image </label>
                                            <input type="file" class="form-control image" id="image" name="uploadfile">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group error">
                                            <label> Price </label>
                                            <input type="text" class="form-control price" id="price" name="price" placeholder="price">
                                        </div>
                                    </div>
                                    <div class="col-4 ">
                                        <div class="form-group error">
                                            <label> Offer </label>
                                            <input type="text" class="form-control offer" id="offer" name="offer" placeholder="offer">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group error">
                                            <label> maxprice </label>
                                            <input type="text" class="form-control maxprice" id="maxprice" name="maxprice" placeholder="maxprice">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group error">
                                            <label> Discount </label>
                                            <input type="text" class="form-control discount" id="discount" name="discount" placeholder="discount">
                                        </div>
                                    </div>
                                    <div class="col-4 ">
                                        <div class="form-group ">
                                            <label> Size </label>
                                            <input type="text" class="form-control size" id="size" name="size" placeholder="size">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label> Color </label>
                                            <input type="color" class="form-control p-0 color" id="color" name="color" style="height: 36px;">
                                        </div>
                                    </div>
                                    <div class="col-4 m-auto">
                                        <button type="button" class="btn m-auto addmore " style=" background-color: #000; color: #fff; width: 10rem; height: 40px; border: none;"> <span> Add More </span> </button>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 d-flex justify-content-center">
                                    <button class="btn  submitbtn" style="margin-top: 3rem; background-color: #000; color: #fff; width: 10rem; height: 40px;  border: none;"> Submit </button>
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

        $('.addmore').click(function() {

            let attr_count = 1;

            function addmore_attr() {
                attr_count++;

                let html = ' <div class="row p-4" id="attr_' + attr_count + '" style="margin-top: 3rem; margin-bottom-20rem; background-color: rgb(225, 236, 249); margin-top: 3rem;" > <div class="col-6 "> <div class="form-group error"> <label> Image </label> <input type="file" class="form-control image" id="image" name="uploadfile"> </div> </div> <div class="col-6"> <div class="form-group error"> <label> Price </label> <input type="text" class="form-control price" id="price" name="price" placeholder="price"> </div> </div> <div class="col-4 "> <div class="form-group error"> <label> Offer </label> <input type="text" class="form-control offer" id="offer" name="offer" placeholder="offer"> </div> </div> <div class="col-4"> <div class="form-group error"> <label> maxprice </label> <input type="text" class="form-control maxprice" id="maxprice" name="maxprice" placeholder="maxprice"> </div> </div> <div class="col-4"> <div class="form-group error"> <label> Discount </label> <input type="text" class="form-control discount" id="discount" name="discount" placeholder="discount"> </div> </div> <div class="col-4 "> <div class="form-group "> <label> Size </label> <input type="text" class="form-control size" id="size" name="size" placeholder="size"> </div> </div> <div class="col-4"> <div class="form-group"> <label> Color </label> <input type="color" class="form-control p-0 color" id="color" name="color" style="height: 36px;"> </div> </div> <div class="col-4 m-auto"> <div class="form-group m-auto pt-3"> <button class="btn m-auto remove " id="' + attr_count + '" style="background-color: #000; color: #fff; width: 10rem; height: 40px; border: none;" > Remove </button> </div> </div> </div>';

                jQuery('#addtable').append(html);
            }
            addmore_attr();
            console.log(attr_count);

            $('.remove').click(function() {
                let attr_count = $(this).attr('id');
                console.log($(this).attr('id'));

                jQuery('#attr_' + attr_count).remove();
            })
        })


        $('#colorpicker').click(function() {
            let color = $('#color').val();
            // console.log($('.color').val());
            $('#main').show();
            $('#main').append(`<input class="color" type="color" name="addcolor[]" value="${color}" style=" width: 40px; height: 40px; border: 1px solid #fff; margin-right: 3px;" />`);
        })

        // $('.addmore').click(function(e){
        //     e.preventDefault();
        //     console.log('add data');

        //     let img = document.getElementById('image').files;
        //     let price = $('.price').val();
        //     let offer = $('.offer').val();
        //     let maxprice = $('.maxprice').val();
        //     let discount = $('.discount').val();
        //     let size = $('.size').val();
        //     let color = $('.color').val();

        //     console.log(img);
        //     console.log(price);
        //     console.log(offer);
        //     console.log(maxprice);
        //     console.log(discount);
        //     console.log(size);
        //     console.log(color);
        // })

        $("#addProductData").validate({

            rules: {
                category: "required",
                description: "required",
                soldby: "required",
                delivery: "required",
                price: "required",
                maxprice: "required",
                discount: "required",
                offer: "required",
                uploadfile: "required",
                productdate: "required",
                outofstockdate: "required"
            },
            message: {
                category: "required category",
                description: "required description",
                soldby: "required company name",
                delivery: "required delivery",
                price: "required price",
                maxprice: "required ",
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
                let description = $('#description').val();
                let soldby = $('#soldby').val();
                let delivery = $('#delivery').val();
                let productdate = $('#productdate').val();
                let outofstockdate = $('#outofstockdate').val();
                let img = document.getElementById('image').files;
                let price = $('.price').val();
                let offer = $('.offer').val();
                let maxprice = $('.maxprice').val();
                let discount = $('.discount').val();
                let size = $('.size').val();
                let color = $('.color').val();

                console.log(category);
                console.log(description);
                console.log(soldby);
                console.log(delivery);
                console.log(productdate);
                console.log(outofstockdate);
                console.log(img);
                console.log(price);
                console.log(offer);
                console.log(maxprice);
                console.log(discount);
                console.log(size);
                console.log(color);

                let formData = $("#addProductData").serialize();
                console.log(form1Data);

                // let nestedFormData = $("#addtable input").serialize();
                // console.log(nestedFormData)

                let formdata = new FormData(form);

                console.log(formdata);

                var settings = {
                    "url": '<?= BASE_URL ?>controller/Company.php?type=addproduct',
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
                        // $("#edit_name").val(response.data.name);
                        // $("#edit_id").val(response.data.id);
                        // $("#editCompany").modal('show');
                    }
                });

            }
        });
    });
</script>
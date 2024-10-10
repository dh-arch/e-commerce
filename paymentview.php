<?php
include 'connection.php';
include 'header.php';

$uid = $_SESSION['user_id'];  // print_r($uid);
?>

<div style=" margin: 10px 0px 10px 0px;">
    <h3 class="lg:text-2xl md:text-xl sm:text-lg text-center my-12">Payment Record</h3>
    <table class="table">
        <thead>
            <tr>
                <th class='py-3 px-6'>id</th>
                <th class='py-3 px-6'>name</th>
                <th class='py-3 px-6'>email</th>
                <th class='py-3 px-6'>mobileno</th>
                <th class='py-3 px-6'>address</th>
                <th class='py-3 px-6'>price</th>
                <th class='py-3 px-6'>status</th>
                <th class='py-3 px-6'>transaction-id</th>
                <th class='py-3 px-6'>paymode</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "select * from `payment` where uid='$uid'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr class="border-b">
                    <td class='py-3 px-6 text-sm text-gray-700'><?php echo $row['id']; ?></td>
                    <td class='py-3 px-6 text-sm text-gray-700'><?php echo $row['name']; ?></td>
                    <td class='py-3 px-6 text-sm text-gray-700'><?php echo $row['email']; ?></td>
                    <td class='py-3 px-6 text-sm text-gray-700'><?php echo $row['mobileno']; ?></td>
                    <td class='py-3 px-6 text-sm text-gray-700'><?php echo $row['address']; ?></td>
                    <td class='py-3 px-6 text-sm text-gray-700'><?php echo $row['price']; ?></td>
                    <td class='py-3 px-6 text-sm text-gray-700 '><span style="border-radius: 20px; padding: 5px 10px; background-color: greenyellow; opacity: 10px;"><?php echo $row['status'] ?></span></td>
                    <td class='py-3 px-6 text-sm text-gray-700'><?php echo $row['transaction-id']; ?></td>
                    <td class='py-3 px-6 text-sm text-gray-700'><?php echo $row['paymode']; ?></td>
                    <!-- <td class='py-3 px-6 text-sm text-gray-700'><?php echo $row['added_date']; ?></td> -->
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

    <?php
    include 'footer.php';
    ?>
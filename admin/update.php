<?php
@include 'conn.php';
$select = mysqli_query($conn, "SELECT * FROM package ORDER BY p_id DESC");
?>

<div class="package-display">
    <table class="package-display-table">
        <thead>
            <tr>
                <th>Package Image</th>
                <th>Package Name</th>
                <th>Package Description</th>
                <th>Places in Package</th>
                <th>Hotel</th>
                <th>Package Price</th>
                <th>Package Discount</th>
                <th>Package Rating</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($select)) { ?>
                <tr>
                    <td><img src="uploaded_images/<?php echo $row['p_image']; ?>" height="100" alt=""></td>
                    <td><?php echo $row['p_name']; ?></td>
                    <td><?php echo $row['p_description']; ?></td>
                    <td><?php echo $row['p_places']; ?></td>
                    <td><?php echo $row['p_hotel']; ?></td>
                    <td><?php echo $row['p_price']; ?></td>
                    <td><?php echo $row['p_discount']; ?></td>
                    <td><?php echo $row['p_rating']; ?></td> <!-- Display numerical rating -->
                    <td>
                        <a href="dashboard.php?page=admin_update&edit=<?php echo $row['p_id']; ?>" class="inputBtn"><i class="fas fa-edit"></i>EDIT</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


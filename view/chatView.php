<table class="table table-hover" style="margin-top: 50px;">
    <thead>
        <tr>
            <th scope="col-2" hidden>DATE</th>
            <th scope="col-2" hidden>PSEUDO</th>
            <th scope="col-8" hidden>MESSAGE</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($display as $row) { ?>
            <tr class="table-light">

                <td class="col-2"><?php echo $row["date"] ?></th>
                <td class="col-2"><?php echo ($row["pseudo"]) ?></td>
                <td class="col-8"><?php echo ($row["content"]) ?></td>

                <td class="col-2"> <a href="index.php?id=<?php echo $row["id"] . '&pseudo=' . $row["pseudo"] . '&content=' . $row["content"] ?>" role="button"><i class="fas fa-pen fa-xs" style="color:black;"></i></a></td>
                <td class="col-2"> <a href="index.php?del=<?php echo $row["id"] ?>" role="button"><i class="fas fa-trash" style="color:black;"></i></a></td>

            </tr>
        <?php } ?>
    </tbody>
</table>
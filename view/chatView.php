<table class="table table-hover">
<thead>
        <tr>
            <th scope="col" hidden>DATE</th>
            <th scope="col" hidden>PSEUDO</th>
            <th scope="col" hidden>MESSAGE</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tab as $row) { ?>
            <tr class="table-light">
                <td><?php echo $row["date"]?></th>
                <td><?php echo $row["pseudo"] ?></td>
                <td><?php echo $row["content"] ?></td>

            </tr>
        <?php } ?>
    </tbody>
</table>
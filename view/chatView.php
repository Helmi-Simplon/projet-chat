<table class="table table-hover">
<thead>
        <tr>
            <th scope="col-2" hidden>DATE</th>
            <th scope="col-2" hidden>PSEUDO</th>
            <th scope="col-8" hidden>MESSAGE</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tab as $row) { ?>
            <tr class="table-light">
                <td class="col-2"><?php echo htmlspecialchars($row["date"])?></th>
                <td class="col-2"><?php echo htmlspecialchars($row["pseudo"]) ?></td>
                <td class="col-8"><?php echo htmlspecialchars($row["content"]) ?></td>
                <td class="col-2"><a  href="/index?id=<?php echo htmlspecialchars($row["id"]).'&pseudo='.htmlspecialchars($row["pseudo"])?>"  style="color: white;"> <i class="fas fa-pen fa-xs" ></i></a> </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
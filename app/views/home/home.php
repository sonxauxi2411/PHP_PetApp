<div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Weight</th>
                <th scope="col">Length</th>
                <th scope="col">Type</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row) : ?>
                <tr>
                    <td><?php echo $row['pet_id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><?php echo $row['weight']; ?> kg</td>
                    <td><?php echo $row['length']; ?> cm</td>
                    <td><?php echo $row['type']; ?> </td>
                    <td class='d-flex' style='gap:10px;'>
                        <form method='get' action=<?php echo 'sua-pet/' . $row['pet_id'] ?>>
                            <button type='submit' class="btn btn-warning">Edit</button>
                        </form>

                        <form method='get' action=<?php echo 'xoa-pet/' . $row['id'] ?>>
                            <button type='submit' class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>